<?php

namespace App\Http\Middleware;

use Closure;
use App\customer;
use App\order;
use Illuminate\Support\Facades\Auth;


class customerStatus
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
        $check = customer::where('approval','=','online')->where('id','=',Auth::user()->id)->pluck('approval')->first();
        $check_order = order::where('id','=',Auth::user()->id)->get();
        if($check && $check_order){
            return $next($request);

        }

        else{

            // return view('alerts.customer_alert');
            // echo 'bal amar ';
            $email = customer::where('approval','=','offline')->where('id','=',Auth::user()->id)->pluck('email')->first();

            return redirect()->to('/alert/{'.$email.'}');

        }
    }
}
