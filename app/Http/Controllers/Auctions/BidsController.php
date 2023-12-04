<?php

namespace App\Http\Controllers\Auctions;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Auction\Auction;

use App\Models\Bid\Bid;

use App\Models\Buynow\Buynow;

use App\Models\Lot\FileUpload;

use App\Models\Training\Like;

use App\Models\Comment\Comment;

use App\Models\Training\TrainingResource;

use Carbon\Carbon;

use Illuminate\Support\Facades\Session;



class BidsController extends Controller

{

	public function bids(){

		$data['results']=Bid::with('user','auction','lotname')->get();

         // dd($data);

		return view('bids.index',compact("data"));

	}



	public function approvebid($lang,$id){
       $data['status']="Approved" ;
      if($id){

            $action = "Updated";

            $modal = Bid::find($id);

            // dd($modal);

            $affected_rows = $modal->update($data);

      }



      return redirect()->back();    

  

	}

  public function approvebuynow($lang,$id){
       $data['status']="Approved" ;



      if($id){

            $action = "Updated";

            $modal = Buynow::find($id);

            // dd($modal);

            $affected_rows = $modal->update($data);

      }



      return redirect()->back();    

  

  }

 public function rejectrequest($lang,$id){

    $data['status']="Cancelled" ;

      if($id){

            $action = "Updated";

            $modal = Buynow::find($id);

            // dd($modal);

            $affected_rows = $modal->update($data);

      }



      return redirect()->back();    

  

  }



	 public function bidstatus(Request $request){

        $id = $request->id;

        $data = $request->all();

        $affected_rows = Bid::find($id)->update($data);

        $response=array('status'=>1,'msg'=>'Data Updated');

        $response=json_encode($response);

        return $response;

    } 



    public function buynowstatus(Request $request){

        $id = $request->id;

        $data = $request->all();

        $affected_rows = Buynow::find($id)->update($data);

        $response=array('status'=>1,'msg'=>'Data Updated');

        $response=json_encode($response);

        return $response;

    }



    public function purchased(){

      // dd('test');

    $data['results']=Bid::where('status','Approved')->with('user','auction','lotname')->get();

    // dd($data);

      return view('purchase.index',compact('data'));

    }



    public function purchasedhistory($id){

      $data['results']=Bid::where('user_id',$id)->where('status','Approved')->with('user','auction','lotname')->get();

    $response=view('users.purchasedhistory',compact('data'))->render();

    // dd($response);



    $response=array('response'=>$response);

    return json_encode($response);

    }





    public function buynow(){

      $data['results']=Buynow::with('user','lotname')->get();

         // dd($data);

      return view('buynow.index',compact("data"));



    }


    public function todayBids(){
     $data['page_title'] = "Notifications";
     return view("bids.todaybids",compact('data'));
    }

    public function filter_bids(Request $request)

    {
       $range=$this->daterange($request);
        $startdate=$range->startdate;
        // dd($startdate);
        $enddate=$range->enddate;

        $data['results']=Bid::whereDate('created_at','>=',$startdate)->whereDate('created_at','<=',$enddate)->get();

        $response= view('bids.filterbids',compact('data'))->render();
        $response=array('response'=>$response);
        return json_encode($response);
    }

    public function daterange($request){
        $startdate="1975-11-11";
        $enddate="2099-11-11";
        if($request->startdate){
            $startdate=db_format_date($request->startdate);
        }
        if($request->enddate){
            $enddate=db_format_date($request->enddate);
        }
        return (object) array('startdate'=>$startdate,'enddate'=>$enddate);
    }


}



?>