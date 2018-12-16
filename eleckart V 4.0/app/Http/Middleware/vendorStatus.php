<?php

namespace App\Http\Middleware;

use Closure;
use App\vendor;
use Illuminate\Support\Facades\Auth;

class vendorStatus
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
       // dd(vendor::where('approval','=','ban')->where('approval','=','pending')->where('id','=',Auth::user()->id)->pluck('approval')->first());

        $check = vendor::where('approval','=','approve')->where('id','=',Auth::user()->id)->pluck('approval')->first();
        if($check){
            return $next($request);

        }else{

           // return view('alerts.customer_alert');
           // echo 'bal amar ';
            $approval = vendor::where('id','=',Auth::user()->id)->pluck('approval')->first();
          //  dd($approval);

            if($approval == "ban"){
                $email = vendor::where('approval','=','ban')->where('id','=',Auth::user()->id)->pluck('email')->first();

                return redirect()->to('/alert/{'.$email.'}');

            }else if($approval == "pending"){
                $email = vendor::where('approval','=','pending')->where('id','=',Auth::user()->id)->pluck('email')->first();

//                return redirect()->to('/alert/{'.$email.'}');
                return redirect()->to('/pending alert/{'.$email.'}');

            }


        }
    }
}
