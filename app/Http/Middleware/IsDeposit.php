<?php

namespace App\Http\Middleware;

use App\Transaction;
use Closure;

class IsDeposit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $dollar = Transaction::where('user_id',auth()->user()->id)->where('type','deposit')->where('status','success')->get()->sum('amount_usd');
        $hlob = Transaction::where('user_id',auth()->user()->id)->where('type','deposit')->where('status','success')->get()->sum('amount_hlob');
        if($dollar >= 10 || $hlob >= 1000 || auth()->user()->role == 1){
            return $next($request);
        } else {
            return redirect('wallet')->withErrors('Please deposit 10 USD or 1000 HLOB');
        }
    }
}
