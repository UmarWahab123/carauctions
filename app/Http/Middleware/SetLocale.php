<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle2(Request $request, Closure $next)
    {
         $test=Session::get('applocale');
         // $request->segment(1)
         // dd($request->segment(1));
          if($test==null){
            $test='en';
         }
         app()->setLocale($test);
          // dd($request->segment(1));
          Session::put('locale', $test);
        return $next($request);
    }
     public function handle($request, Closure $next)
    {
        // echo $request->segment(1);
            app()->setLocale($request->segment(1));
          // dd($request->segment(1));
          Session::put('locale', $request->segment(1));
        return $next($request);
    }
}
