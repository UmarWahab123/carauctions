<?php

namespace App\Http\Controllers\Auctions;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Auction\Auction;

use App\Models\Lot\Lot;

use App\Models\Bid\Bid;

use App\Models\Model\Models;

use App\Models\Model\Make;

use App\Models\Lot\FileUpload;

use App\Models\Training\Like;

use App\Models\Comment\Comment;

use App\Models\Training\TrainingResource;

use App\Models\Countries\Countries;

use App\Models\Countries\State;

use App\Models\Countries\City;

use Illuminate\Support\Facades\Session;



class AuctionsController extends Controller

{

   public function auctions()

      {

          $data['page_title'] = "Auctions";

        $data['results'] =  Auction::get();

          return view('auctions.index',compact('data'));

      }   

   public  function auction($lang,$id=-1)

    {

        $data['page_title'] = "Add Auction";

        $data['results'] = Auction::where('id', $id)->first();

        $data['countries']=Countries::get();
         

               if ($id != -1) {

            $data['page_title'] = "Update User";

            $data['results'] = Auction::where('id', $id)->first();
             $data['state']=State::where('country_id',$data['results']->location)->get();

             $data['city']=City::where('state_id',$data['results']->city)->get();

            $data['results']->start_date=date('Y-m-d h:i');

            $data['results']->end_date=date('Y-m-d h:i');

            // dd($data);

        }

        return view('auctions.save', compact('data'));

    } 



     public function saveauction(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        // dd($data);

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Auction::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Auction::create($data);

        }

        $message=   set_message($affected_rows,'Auction',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/auctions');

    }



    public function deleteauction($lang,$id){

         $affected_rows = Auction::find($id)->delete();

        $message=   set_message($affected_rows,'Auction','Deleted');

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/auctions');

    }



    public function auctiondetail($lang,$id){

        // dd('test');

        $data['results']=Auction::where('id',$id)->first();

        $data['lot']=Lot::where('auction_id',$id)->get();

        // dd( $data);

        return view('auctions.detail.index',compact("data"));

    }



  

  //Lots Fuctions below



  public function lots(){

     $data['page_title'] = "Lots";

        $data['results'] =  Lot::get();

          return view('lot.index',compact('data'));



  } 



  public function lot($lang, $id = -1){

        $data['page_title'] = "Add Lot";

        $data['auctions'] = Auction::get();

        $data['model'] = Models::get();

        $data['make'] = Make::get();

        // dd($data);

        if ($id != -1) {

            $data['page_title'] = "Update Lot";

            $data['results'] = Lot::where('id', $id)->first();

            $data['lot_images']=FileUpload::where('lot_id', $id)->get();

             $data['lotimages']=view('lot.lot_images', compact('data'))->render();

            

        }

        return view('lot.save', compact('data'));

  } 



  public function savelot(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        // dd($data);

         if ($request->hasfile('feature_image')) {

            $file = $request->file('feature_image');

            $extension = $file->getClientOriginalExtension();



            $filename = time() . "." . $extension;

            $file->move('public/uploads/lot/', $filename);

            $data['feature_image'] = '/public/uploads/lot/' . $filename;



            $request->feature_image = $data['feature_image'];

        }



         if ($request->hasfile('brand_logo')) {

            $file = $request->file('brand_logo');

            $extension = $file->getClientOriginalExtension();



            $filename = rand() . "." . $extension;

            $file->move('public/uploads/lot/', $filename);

            $data['brand_logo'] = '/public/uploads/lot/' . $filename;



            $request->brand_logo = $data['brand_logo'];

        }

        // dd($data);

        $lotimages = $request->lotimage;
        
        unset($data['lotimage']);

        if ($id) {

            $action = "Updated";

            $modal = Lot::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Lot::create($data);
           
            $id=$affected_rows->id;
        }
       if(!empty($lotimages)){
            $lotimages = json_decode($lotimages);
            foreach ($lotimages as $key => $value) {
              
              $data = array('lot_id'=>$id,'images'=>$value);

              FileUpload::create($data);
            }
          }
        $message=   set_message($affected_rows,'Lot',$action);

        Session::put('message', $message);
        
        return Redirect(app()->getLocale().'/admin/lot/'.$id);

    }

      public function deletelot($lang,$id){

         $affected_rows = Lot::find($id)->delete();

        $message  = set_message($affected_rows,'Auction','Deleted');

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/lots');

    }
    public function lot_photo_modal(Request $request)
    {  

        $id=$request->id;

        $data=$request->all();

        // dd($data);

        $data['lot_id']=$request->lot_id;

        $data['results']=FileUpload::get();



         if ($id != -1) {

            $data['page_title'] = "Update lot";

            $data['results'] = FileUpload::where('id', $id)->first();

        }

        // dd($data);

       $content=view('lot.content_modal',compact('data'))->render();

       // dd($content);

       $response=array('response'=>$content);

       return json_encode($response);

    }



    public function savelotphoto(Request $request)

    {

        $id = $request->id;

        $data = $request->all();
        // dd($data);

        $action = "Added";

        // dd($data['lot_id']);

        // $data['images']= $this->set_multi_uploads($data['old_image'],$data['images']);

        // unset($data['old_image']);

        if ($id) {

            $action = "Updated";

            $modal = FileUpload::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  FileUpload::create($data);

        }

         $data['lot_images']=FileUpload::where('lot_id',$data['lot_id'])->get();

         $data['lotimages']=view('lot.lot_images', compact('data'))->render();

         // dd(   $data['lot_images']);



         $response=array('response'=> $data['lotimages']);

         return json_encode($response);

        

    }

     public function set_multi_uploads($old,$new){
         $old_uploads=array();
        $new_uploads=array();

        if(json_decode($old)){
            $old_uploads=json_decode($old);
        }

        if(json_decode($new)){
            $new_uploads=json_decode($new);
        }
        
        $uploads=json_encode(array_merge($old_uploads,$new_uploads));
        $final_uploads=array();

        foreach (json_decode($uploads) as $row){
            if(file_exists($row)){
                $final_uploads[]=$row;
            }
        }
        return json_encode($final_uploads);
    }


    public  function removelotimg(Request $request)

    {

        $path = $request->path;

        $id = $request->id;

        $lot_id = $request->lot_id;

        // dd()



        $dir_path = getcwd() . '/' . $path;

        unlink($dir_path);



        $affected_rows = FileUpload::find($id)->delete();

         $data['lot_images']=FileUpload::where('lot_id',$lot_id)->get();

         $data['lotimages']=view('lot.lot_images', compact('data'))->render();

         // dd(   $data['lot_images']);



         $response=array('response'=> $data['lotimages']);

         return json_encode($response);

    }





    public function lotdetail($lang,$id){



        // dd('test');

        $data['results']=Lot::where('id',$id)->first();

        $data['bid']=Bid::where('lot_id',$id)->with('user','lotname','auction')->get();

        // dd( $data['bid']);

        return view('lot.detail.index',compact("data"));



    }



     public function getstates($lang,$id){

            $states= State::where('country_id',$id)->get();

            // dd($states);

            $options='';

            foreach($states as $state){

              $options.='<option value='.$state->id.'>'.$state->name.'</option>';

            }

           // dd($options);

        return $options;

   } 

   public function getcities($lang,$id){

            $cities= City::where('state_id',$id)->get();

            // dd($states);

            $options='';

            foreach($cities as $city){

              $options.='<option value='.$city->id.'>'.$city->name.'</option>';

            }

           // dd($options);

        return $options;

   }



     public function getmodel($lang,$id){

            $models= Models::where('make_id',$id)->get();

            $options='';

            foreach($models as $model){

              $options.='<option value='.$model->id.'>'.$model->name.'</option>';

            }

           // dd($options);

        return $options;

   } 


     







}

?>

