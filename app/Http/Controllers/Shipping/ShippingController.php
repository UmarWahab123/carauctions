<?php

namespace App\Http\Controllers\Shipping;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Shipping\Shippingfee;

use App\Models\Comment\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;





class ShippingController extends Controller

{
	public function view_shippment(){

        $data['results']=Shippingfee::get();
    	return view('shipping.index',compact('data'));

    } 

    public function add_shipping($lang,$id=-1){

        $data['page_title'] = "Add Shipping";

    	$data['results']=Shippingfee::get();

    	 if ($id != -1) {

            $data['page_title'] = "Update Shipping";

            $data['results'] = Shippingfee::where('id', $id)->first();

        }

    	return view('shipping.save',compact('data'));

    }

    public function saveshipping(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Shippingfee::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Shippingfee::create($data);

        }

        $message=set_message($affected_rows,'Shipping',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/view_shippment');

    }

    public function deleteshipping($lang,$id)
    {
        $affected_rows = Shippingfee::find($id)->delete();

        $message=   set_message($affected_rows,'Shipping','Deleted');

        Session::put('message', $message);

        return redirect()->back();
    }

    
}


?>