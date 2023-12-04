<?php

namespace App\Http\Controllers\Faqs;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Setting\ContactUs;

use App\Models\Auction\Auction;

use App\Models\Lot\Lot;

use App\Models\Faqs\Faqs;

use App\Models\User;

use App\Models\Comment\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;





class FaqsController extends Controller

{

    public function faqs(){

    	$data['results']=Faqs::get();

    	return view('faqs.index',compact('data'));

    } 



    public function faq($lang,$id=-1){

        $data['page_title'] = "Add Faq";

       

    	$data['results']=Faqs::get();

    	 if ($id != -1) {

            $data['page_title'] = "Update Faq";

            $data['results'] = Faqs::where('id', $id)->first();

        }

    	return view('faqs.save',compact('data'));

    }



    public function savefaq(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Faqs::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Faqs::create($data);

        }

        $message=set_message($affected_rows,'FAQ',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/faqs');

    }
 public function deletefaqs($lang,$id)
    {
        $affected_rows = Faqs::find($id)->delete();
        $message = set_message($affected_rows,'FAQ','Deleted');
        Session::put('message', $message);
        return redirect()->back();
    }
  

}

?>