<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
    class RetailerAuth
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
        if(Auth::guard('retailers')->check()){
            return $next($request);
        }else{
            return redirect('/retailer/login');
        }


    }
}
