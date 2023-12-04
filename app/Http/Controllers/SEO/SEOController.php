<?php

namespace App\Http\Controllers\SEO;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\SEO\SEO;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;


class SEOController extends Controller

{
	public function view_seo(){

        $data['page_title'] = "View SEO";
        $data['results']=SEO::get();
    	return view('seo.index',compact('data'));

    } 

    public function add_seo($lang,$id=-1){

        $data['page_title'] = "SEO";

    	$data['results']=SEO::get();

    	 if ($id != -1) {

            $data['page_title'] = "SEO";

            $data['results'] = SEO::where('id', $id)->first();

        }

    	return view('seo.save',compact('data'));

    }

    public function saveseo(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = SEO::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  SEO::create($data);

        }

        $message=set_message($affected_rows,'SEO',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/add_seo/'.$id);

    }

    public function deleteseo($lang,$id)
    {
        $affected_rows = SEO::find($id)->delete();

        $message=   set_message($affected_rows,'SEO','Deleted');

        Session::put('message', $message);

        return redirect()->back();
    }
   
    
}


?>