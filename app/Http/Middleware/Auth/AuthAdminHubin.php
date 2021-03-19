<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->roles === 2) {
            return $next($request);
        } else {
            return redirect()->back()->with('error_page_hubin', 'Anda tidak bisa mengakses halaman ini !!!');
        }
    }
}
