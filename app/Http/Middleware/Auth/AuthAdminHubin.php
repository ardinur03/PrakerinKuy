<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;

class AuthAdminHubin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(sesssion('roles') === 2) {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('/');
        }

        return $next($request);
    }
}
