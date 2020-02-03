<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index(){
        $data = Message::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        $first = Message::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        return view('message',[
            'data'=>$data,
            'id'=>is_null($first)?0:$first->id
        ]);
    }
    public function send(Request $request){
        $request->validate([
            'message'=>'required|string'
        ]);
        DB::transaction(function () use ($request){
            $message = new Message();
            $message->user_id = auth()->user()->id;
            $message->from = auth()->user()->username;
            $message->content = $request->message;
            $message->save();
        });
        return redirect()->back();
    }

    public function reply(Request $request){

    }

    public function delete(Request $request){
        $data = Message::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        foreach ($data as $ini){
            $message = Message::find($ini->id);
            $message->delete();
        }
        return redirect()->back();
    }

    public function getMessage($id){
        return getNewMessage($id);
    }
    public function getMessageTotal(){
        return getMessageCount();
    }
}
