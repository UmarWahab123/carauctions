<?php
namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Test\Settings;
use App\Models\Test\Detach;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
class SettingsController extends Controller
{
    public  function detach($id=-1){
        $data['page_title'] = "Add Detach";
        if($id!=-1){
            $data['page_title'] = "Update Detach";
            $data['results']=Detach::where('id', $id)->first();
            check_empty($data['results'],'detaches');
        }
        return view('admin.detaches.save',compact('data'));
    }

    public function savesettings(Request $request){
        $id=$request->id;
        $data=$request->all();
        $action="Added";
        if($id){
            $action="Updated";
            $affected_rows = Settings::find($id)->update($data);
        }
        else{
            $affected_rows =  Settings::create($data);
        }
        Session::put('message', set_message($affected_rows,'Logic',$action));
        return redirect()->back();
    }
    public  function detaches(){
        $data['page_title'] = "Detaches";
        $data['results'] =  Detach::get();
        return view('admin.detaches.view',compact('data'));
    }
    public function deletedetach($id){
        $affected_rows = Detach::find($id)->delete();
        Session::put('message', set_message($affected_rows,'Detach','deleted'));
        return redirect()->back();
    }
}
