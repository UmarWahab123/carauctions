<?php

namespace App\Http\Controllers\Oceanshipping;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Groundshipping\Groundshipping;

use App\Models\Oceanshipping\Oceanshipping;

use App\Models\Comment\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;





class OceanshippingController extends Controller

{
	public function ocean_shipping(){

        $data['results']= Oceanshipping::get();
    	return view('oceanshipping.index',compact('data'));

    } 

    public function addocean_shipping($lang,$id=-1){

        $data['page_title'] = "Add Oceanshipping";

        $data['results']= Oceanshipping::get();

    	$data['ground_shipping']= Groundshipping::get();

    	 if ($id != -1) {

            $data['page_title'] = "Update Oceanshipping";

            $data['results'] = Oceanshipping::where('id', $id)->first();

        }

    	return view('oceanshipping.save',compact('data'));

    }

    public function saveoceanshipping(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Oceanshipping::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Oceanshipping::create($data);

        }

        $message=set_message($affected_rows,'Oceanshipping',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/ocean_shipping');

    }

    public function deleteoceanshipping($lang,$id)
    {
        $affected_rows = Oceanshipping::find($id)->delete();

        $message=   set_message($affected_rows,'Oceanshipping','Deleted');

        Session::put('message', $message);

        return redirect()->back();
    }
    
}


?>