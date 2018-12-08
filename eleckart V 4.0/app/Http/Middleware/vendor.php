<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;

class vendor
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
        if(Auth::check() && Auth::User()->hasrole()=="vendor"){
            return $next($request);

            // return view('vendor');

           // return redirect()->route('vendor.dashboard');
        }
        else{
            return redirect()->route('login');
        }
       // return $next($request);
    }
}
