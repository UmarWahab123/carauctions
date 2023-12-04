<?php

namespace App\Http\Controllers\Groundshipping;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Groundshipping\Groundshipping;

use App\Models\Comment\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;





class GroundshippingController extends Controller

{
	public function ground_shipping(){

        $data['results']= Groundshipping::get();
    	return view('groundshipping.index',compact('data'));

    } 

    public function addground_shipping($lang,$id=-1){

        $data['page_title'] = "Add Groundshipping";

    	$data['results']= Groundshipping::get();

    	 if ($id != -1) {

            $data['page_title'] = "Update Groundshipping";

            $data['results'] = Groundshipping::where('id', $id)->first();

        }

    	return view('groundshipping.save',compact('data'));

    }

    public function savegroundshipping(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Groundshipping::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Groundshipping::create($data);

        }

        $message=set_message($affected_rows,'Groundshipping',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/ground_shipping');

    }

    public function deletegroundshipping($lang,$id)
    {
        $affected_rows = Groundshipping::find($id)->delete();

        $message=   set_message($affected_rows,'Groundshipping','Deleted');

        Session::put('message', $message);

        return redirect()->back();
    }
    
}


?>