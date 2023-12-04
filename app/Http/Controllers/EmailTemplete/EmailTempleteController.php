<?php

namespace App\Http\Controllers\EmailTemplete;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\EmailTemplete\Templete;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;


class EmailTempleteController extends Controller

{
	public function templete(){

        $data['page_title'] = "View Email Template";
        $data['results']=Templete::get();
    	return view('emailtemplete.index',compact('data'));

    } 

    public function templetes($lang,$id=-1){

        $data['page_title'] = "Add Email Template";
    	if($id != -1){
            $data['page_title'] = "Update Email Templete";
            $data['results'] = Templete::where('id', $id)->first();
        }
    	return view('emailtemplete.save',compact('data'));
    }

    public function savetemplete(Request $request)

    {

        $id = $request->id;

        $data = $request->all();
        $content=$request->content; 
        $data['content']=json_encode($content);
        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Templete::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Templete::create($data);

        }

        $message=set_message($affected_rows,'Email Template',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/templete');

    }

    public function deletetemplete($lang,$id)
    {
        $affected_rows = Templete::find($id)->delete();

        $message =   set_message($affected_rows,'Email Template','Deleted');

        Session::put('message', $message);

        return redirect()->back();
    }
   
    
}


?>