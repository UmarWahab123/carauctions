<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use Redirect;
use Route;
use Request;
class Controller extends BaseController
{
   
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                $user = Auth::user();
               // dd($user->role->role_title);
                if($user->role->role_title != "Admin" && $user->role->role_title != "Super User" && $user->role->role_title!="Rostered Employee" && $user->role->role_title!="SuperUser"){
                    $access_list=array();
                    if($user->role->role_access){
                        $access_list = json_decode($user->role->role_access);
                    }
                    // dd($access_list);
//                    $currentMethod =Route::getFacadeRoot()->current()->uri();
                    $currentMethod =Route::getCurrentRoute()->getActionMethod();
//                    $access_list=implode(',', $access_list );
                    if((strpos($currentMethod,'save') !== false ) && $request->id > 0){
//                        dd('d');
                        $currentMethod='u'.$currentMethod;
                    }
//                     dd($access_list);
//                     dd($currentMethod);
//                    if($currentMethod!="profile" && (strpos($access_list,$currentMethod) == false )){
//                    if($currentMethod!="profile"){
//                        foreach ($access_list as $row){
//                            if($currentMethod!=$row)
//                            dd($row);
//                        }
//                        Redirect::to('unautorized')->send();
//                    }
                   // dd(Request::url());
                    if(empty($access_list)){
                        $access_list=[];
                    }
                    if($currentMethod!="upload_file" && $currentMethod!="remove_img" && !in_array($currentMethod,$access_list) && (strpos(Request::url(),'admin') !== false ) && $currentMethod!="getmodel" && $currentMethod!="getstates" && $currentMethod!="getcities" && $currentMethod!="approvebid" && $currentMethod!="bidstatus" && $currentMethod!="approvebuynow" && $currentMethod!="rejectrequest")
                    {
                         Redirect::to('unautorized')->send();
                    }
                }
            }
            return $next($request);

        });
    }
}
