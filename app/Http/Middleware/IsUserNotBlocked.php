<?php

namespace App\Http\Middleware;

use Closure;

class IsUserNotBlocked
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
        if (auth()->user()->status != 0) {
            return $next($request);
        }

        auth()->logout();

        return redirect()->route('login')->withErrors('User Blocked');
    }
}
