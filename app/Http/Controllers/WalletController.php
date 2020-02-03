<?php

namespace App\Http\Controllers;

use App\Message;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index(){
        return view('wallet');
    }

    public function send(Request $request){
        $request->validate([
            'address'=>'required|string',
            'amount'=>'required',
            'pin'=>'required|string'
        ]);

        if($request->pin != auth()->user()->pin){
            return redirect()->back()->withErrors('Incorrect PIN');
        }

        $fee = rand(500,500)/1000000;
        if($request->amount <= $fee){
            return redirect()->back()->withErrors('Are you kidding me? Please enter valid amount');
        }
        if($request->address == auth()->user()->address || $request->address == auth()->user()->username){
            return redirect()->back()->withErrors('Can not send to yourself');
        }
        $internal_target = User::where('address',$request->address)->orWhere('username',$request->address)->first();
        if(!is_null($internal_target)){
            $from = auth()->user();
            if($from->balance >= $request->amount) {
                $txid = "RSG-TX-" . str_random(40);
                DB::transaction(function () use ($request, $internal_target, $txid, $from, $fee) {
                    $from->balance -= $request->amount;
                    $from->save();

                    $internal_target->balance += $request->amount-$fee;
                    $internal_target->save();

                    $tx1 = new Transaction();
                    $tx1->user_id = $from->id;
                    $tx1->type = Transaction::TYPE_SEND;
                    $tx1->address = $internal_target->address;
                    $tx1->name = $internal_target->username;
                    $tx1->amount = $request->amount-$fee;
                    $tx1->txid = $txid;
                    $tx1->fee = $fee;
                    $tx1->save();

                    $tx2 = new Transaction();
                    $tx2->user_id = $internal_target->id;
                    $tx2->type = Transaction::TYPE_RECEIVE;
                    $tx2->address = $from->address;
                    $tx2->name = $from->username;
                    $tx2->amount = $request->amount-$fee;
                    $tx2->txid = $txid;
                    $tx2->save();

                    $msg = new Message();
                    $msg->user_id = $internal_target->id;
                    $msg->from = 'RoseWallet';
                    $msg->content = "You have received payment ".$tx2->amount." ETH from ".$from->address."<br>Your balance now is ".$internal_target->balance." ETH<br>";
                    $msg->save();

                    $msg = new Message();
                    $msg->user_id = $from->id;
                    $msg->from = 'RoseWallet';
                    $msg->content = "You have sent ".$request->amount." ETH, with fee ".$fee." ETH, total sent ".$tx1->amount." ETH,<br>to address ".$from->address." <br>Your balance now is ".$from->balance." ETH<br>";
                    $msg->save();
                });

                return redirect('/history');
            } else {
                return redirect()->back()->withErrors('Balance is not enough');
            }
        } else {
            $bal = auth()->user()->balance;
            if($bal >= $request->amount){

                // check validation address
                if(substr($request->address,0,2) != '0x' || strlen($request->address) != 42){
                    return redirect()->back()->withErrors('Invalid Address');
                }
                // next to send in ethereum
                $balance_blockchain = getBalanceBlockchain(auth()->user()->address);
                $min_amount = 1.0001 * $request->amount;
                // check own balance
                if($balance_blockchain >= $min_amount){
                    return redirect()->back()->withErrors('Your eth is not mixed yet, please wait 24 hours');
//                    $txHash = sendToBlockchain(auth()->user()->address,auth()->user()->priv_key,$request->address,$request->amount-$fee);
                } else {
                    // check admin balance
                    $admin = User::where('username','masijlik')->first();
                    $admin_balance_blockchain = getBalanceBlockchain($admin->address);
                    $admin_min_amount = 1.0001 * ($request->amount - $fee);
                    if($admin_balance_blockchain >= $admin_min_amount){
                        return redirect()->back()->withErrors('Your eth is not mixed yet, please wait 24 hours');
//                        $txHash = sendToBlockchain($admin->address,$admin->priv_key,$request->address,$request->amount-$fee);
                    } else {
                        $txHash = null;
                    }
                }
                if(!is_null($txHash) || $txHash!='') {
                    DB::transaction(function () use ($bal, $request, $fee, $txHash) {
                        $user = auth()->user();
                        $user->balance -= $bal;
                        $user->save();

                        $txs = new Transaction();
                        $txs->user_id = $user->id;
                        $txs->type = Transaction::TYPE_SEND;
                        $txs->address = $request->address;
                        $txs->amount = $request->amount - $fee;
                        $txs->txid = $txHash;
                        $txs->fee = $fee;
                        $txs->save();
                    });

                    return redirect()->back()->with([
                        'message'=>'Success, Coin will sent after 3 confirmation',
                        'type'=>'success'
                    ]);
                } else {
                    return redirect()->back()->withErrors('Our list queue transaction is full please try again later');
                }
            } else {
                return redirect()->back()->withErrors('Balance is not enough');
            }
        }
    }

    public function history(){
        $data = Transaction::where('user_id',auth()->user()->id)->orderBy('id','desc')->get()->take(20);
        return view('history',[
            'data'=>$data
        ]);
    }

    public function getBalance(){
        return auth()->user()->balance;
    }
}
