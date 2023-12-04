<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Fees\Fees;

use App\Models\Comment\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;





class FeesController extends Controller

{
	public function coparts(){

        $data['results']=Fees::where('type','copart')->get();
    	return view('fees.copart.index',compact('data'));

    } 

    public function copart($lang,$id=-1){

        $data['page_title'] = "Add Copart";

    	$data['results']=Fees::get();

    	 if ($id != -1) {

            $data['page_title'] = "Update Copart";

            $data['results'] = Fees::where('id', $id)->first();

        }

    	return view('fees.copart.save',compact('data'));

    }

    public function savecopart(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Fees::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Fees::create($data);

        }

        $message=set_message($affected_rows,'Coparts',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/coparts');

    }

    public function deletecopart($lang,$id)
    {
        $affected_rows = Fees::find($id)->delete();

        $message=   set_message($affected_rows,'Copart','Deleted');

        Session::put('message', $message);

        return redirect()->back();
    }
    public function iaais(){

        $data['results']=Fees::where('type','iaai')->get();
    	return view('fees.iaai.index',compact('data'));

    } 

    public function iaai($lang,$id=-1){

        $data['page_title'] = "Add IAAI";

    	$data['results']=Fees::get();

    	 if ($id != -1) {

            $data['page_title'] = "Update IAAI";

            $data['results'] = Fees::where('id', $id)->first();

        }

    	return view('fees.iaai.save',compact('data'));

    }

    public function saveiaai(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Fees::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Fees::create($data);

        }

        $message=set_message($affected_rows,'IAAI',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/iaais');

    }

    public function deleteiaai($lang,$id)
    {
        $affected_rows = Fees::find($id)->delete();

        $message=   set_message($affected_rows,'Copart','Deleted');

        Session::put('message', $message);

        return redirect()->back();
    }
}


?>