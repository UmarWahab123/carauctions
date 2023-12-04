<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        $role=$request->user()->role->role_title;
        // if($role!="Admin" && $role!="Manager"){
        //     $errormessage="Only Admin can access this page";
        //    return response()->view('errors.403',compact('errormessage'));
        // }

        return $next($request);
    }
}
