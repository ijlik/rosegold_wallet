<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function setting(){
        return view('setting');
    }

    public function password(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|same:password',
            'password_confirmation' => 'required|same:password'
        ]);
        $current_password = auth()->user()->password;
        if(Hash::check($request['current_password'], $current_password))
        {
            $obj_user = auth()->user();
            $obj_user->password = Hash::make($request['password']);;
            $obj_user->save();
            return view('setting',[
                'ok' => true
            ]);
        } else {
            return redirect()->back()->withErrors('Wrong current password');
        }
    }

    public function pin(Request $request){
        $request->validate([
            'pinn1'=>'required|string',
            'pinn2'=>'required|string'
        ]);

        if($request->pinn1 != $request->pinn2){
            return redirect()->back()->withErrors('Pin is not same');
        }
        DB::transaction(function () use ($request){
           $user = auth()->user();
           $user->pin = $request->pinn1;
           $user->save();
        });
        return redirect()->back();
    }
}
