<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Setting\ContactUs;

use App\Models\Auction\Auction;

use App\Models\Countries\Countries;

use App\Models\Countries\State;

use App\Models\Countries\City;

use App\Models\Lot\Lot;

use App\Models\Bid\Bid;

use App\Models\User;

use App\Models\Comment\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

use PDF;

use App\Models\Deposit\Deposit;

use Hash;



class SettingsController extends Controller

{

   public function usersettings($lang,$id){

      
      // dd($_GET['type']);
      $type=$_GET['type'];
      //dd($type);
      $data['results']=User::where('id',$id)->first();

      $data['countries']=Countries::get();



      $data['state']=State::where('country_id',$data['results']->country)->get();

      $data['town']=City::where('state_id',$data['results']->region)->get();

      $data['deliverystate']=State::where('country_id',$data['results']->delivery_country)->get();

      $data['deliverytown']=City::where('state_id',$data['results']->delivery_region)->get();

    

      if($type=='Address'){

        // dd($type);

        return view('frontend.profile.address',compact('data'));

      } 

      if($type=='Settings'){

        

        // dd($type);

        return view('frontend.profile.settings',compact('data'));

      }

      if($type=='Account'){

        // dd($type);

        return view('frontend.profile.account',compact('data'));

      }

   }



   public function updateprofile(Request $request){

      $id=$request->id;

      $data=$request->all();

      // dd($data);

    

       if(isset($data['first_name'])){

         $data['name']=$data['first_name'].' '.$data['last_name'];

       }

       if($id){

        $affected_rows=User::find($id)->update($data);

        }

        return redirect()->back();   



   }



   public function updatepassword(Request $request){

     $id=$request->id;

      $data=$request->all();

      // dd($data);

      if(!\Hash::check($request->current_password,Auth::user()->password)) {

          $response=array('status'=>0,'response'=>'Incorrect Current password');

            return json_encode($response);

        }



      if(isset($data['password'])){

       unset($data['current_password']);

       unset($data['confrim_password']);

       $data['password']=bcrypt($request->password);

      }

       if($id){

        $affected_rows=User::find($id)->update($data);

        }

        $response=array('status'=>1,'response'=>$affected_rows);

        return json_encode($response); 



   }



   public function getstates($id){

            $states= State::where('country_id',$id)->get();

            $options='';

            foreach($states as $state){

              $options.='<option value='.$state->id.'>'.$state->name.'</option>';

            }

           // dd($options);

        return $options;

   } 

   public function getcities($id){

            $cities= City::where('state_id',$id)->get();

            // dd($states);

            $options='';

            foreach($cities as $city){

              $options.='<option value='.$city->id.'>'.$city->name.'</option>';

            }

           // dd($options);

        return $options;

   }



   public function generatepdf($lang,$id){

    // dd($id);

    $data['deposit']=Deposit::where('id',$id)->first();

        // return view('frontend.payment.paymentpdf',compact('data'));

        $pdf = PDF::loadView('frontend.payment.paymentpdf',compact('data'));

        // dd($pdf);

        return $pdf->download('GlobalmotorInvoice.pdf');

   }





     public function switchLang($lang)

    {

      // dd($lang);

      app()->setLocale($lang);

        // if (array_key_exists($lang, Config::get('languages'))) {

        //     Session::put('applocale', $lang);

        // }

       Session::put('applocale',$lang);

        return redirect()->back();

    }    

    

    public function test($lang)

    {

      // dd($lang);

      app()->setLocale($lang);

        // if (array_key_exists($lang, Config::get('languages'))) {

        //     Session::put('applocale', $lang);

        // }

       Session::put('applocale',$lang);

        return redirect()->back();

    }

}

?>