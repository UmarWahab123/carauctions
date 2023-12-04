<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Setting\ContactUs;

use App\Models\Auction\Auction;

use App\Models\Lot\Lot;

use App\Models\Deposit\Deposit;

use App\Models\User;

use App\Models\Comment\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;





class DepositController extends Controller

{

   public function deposit(){



   	return view('frontend.deposits.index');

   }

   public function savedeposit(Request $request){

     $id=$request->id;

    $data=$request->all();

    $data['status']="Pending";

    $data['transaction_no']=uniqid();

    // dd($data);

     

     $affected_rows=Deposit::create($data);



     return redirect(app()->getLocale().'/paymentdetail/'.$affected_rows->id);

   

   }

   public function paymentdetail($lang,$id,$type=''){

    $data['deposit']=Deposit::where('id',$id)->first();

    $data['type']=$type;

    return view('frontend.payment.paymentdetail',compact('data'));

   }

   public function senddeposit(Request $request){

    $id=$request->id;

    $data=$request->all();

    $data2['send']=1;

    // dd($data2);



    $data['deposit']=Deposit::find($id)->update($data2);

    return view('frontend.payment.paymentsuccess');

   }



}

?>