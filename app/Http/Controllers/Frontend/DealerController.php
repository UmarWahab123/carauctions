<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Setting\ContactUs;

use App\Models\Auction\Auction;
use App\Models\DealerPhoto\DealerPhoto;
use App\Models\Model\Models;
use App\Models\Bid\Bid;
use App\Models\Model\Make;

use App\Models\Lot\Lot;
use App\Models\Lot\FileUpload;

use App\Models\Dealer\Dealer;

use App\Models\User;

use App\Models\Comment\Comment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;


class DealerController extends Controller

{

   public function view_dealer(){


    $data['page_title'] = "Lots";
    $data['results']=Lot::where('dealer_id',Auth::user()->id)->get();
   	return view('frontend.dealer.index',compact('data'));

   }

    public function dealer($lang,$id=-1){

      $data['page_title'] = "Add Lot";

      $data['auctions']=Auction::get();
      $data['model'] = Models::get();

      $data['make'] = Make::get();

       if ($id != -1) {


            $data['page_title'] = "Update Lot";

            $data['results'] = Lot::where('id', $id)->first();
            $data['dealer_images']=FileUpload::where('lot_id',$id)->get();

            $data['dealerimages']=view('frontend.dealer.dealer_image', compact('data'))->render();


        }


      return view('frontend.dealer.save',compact('data'));

    }

   public function savedealer(Request $request){

        $id = $request->id;

        $data = $request->all();

        $data['trading_date'] = db_format_date($request->trading_date);
        $action = "Added";

        if ($request->hasfile('feature_image')) {

            $file = $request->file('feature_image');

            $extension = $file->getClientOriginalExtension();



            $filename = time() . "." . $extension;

            $file->move('public/uploads/dealer/', $filename);

            $data['feature_image'] = '/public/uploads/dealer/' . $filename;

            $request->feature_image = $data['feature_image'];

        }



         if ($request->hasfile('brand_logo')) {

            $file = $request->file('brand_logo');

            $extension = $file->getClientOriginalExtension();

            $filename = rand() . "." . $extension;

            $file->move('public/uploads/dealer/', $filename);

            $data['brand_logo'] = '/public/uploads/dealer/' . $filename;

            $request->brand_logo = $data['brand_logo'];

        }

        $lotimages = $request->lotimage;
        unset($data['lotimage']);
        // dd($data);
        if ($id) {

            $action = "Updated";

            $modal = Lot::find($id);

            $affected_rows = $modal->update($data);
            // return redirect(app()->getLocale().'/view_dealer')->with('message','Lot Updated Successfully');

        } else {

            $affected_rows = Lot::create($data);
            $id=$affected_rows->id;
           
        }
        // dd($lotimages);
        if(!empty($lotimages)){
            $lotimages = json_decode($lotimages);
            foreach ($lotimages as $key => $value) {
              
              $data = array('lot_id'=>$id,'images'=>$value);

              FileUpload::create($data);
            }
          }

            return redirect(app()->getLocale().'/view_dealer')->with('message','Lot data saved Successfully');

        // $message=set_message($affected_rows,'Dealer',$action);


        // Session::put('message', $message);

     // return redirect(app()->getLocale().'/view_dealer')->with('message','Lot Added Successfully');

   

   }

  public function deletedealer($lang,$id)
    {
    	// dd($id);
        $affected_rows = Lot::find($id)->delete();

        // $message= set_message($affected_rows,'Dealer','Deleted');

        // Session::put('message', $message);

        return redirect()->back()->with('message','Dealer Deleted Successfully');
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

    public function lot_photo_modal(Request $request)

    {  
        $id=$request->id;

        $data=$request->all();

        // dd($data);

        $data['dealer_id']=$request->dealer_id;

        $data['results']=FileUpload::get();



         if ($id != -1) {

            $data['page_title'] = "Update User";

            $data['results'] = FileUpload::where('id', $id)->first();

        }


       $content=view('frontend.dealer.content_modal',compact('data'))->render();

       // dd($content);

       $response=array('response'=>$content);

       return json_encode($response);

    }

    public function dealer_deatil($lang,$id){

        $data['results']=Lot::where('id',$id)->first();
        $data['lotimages']= FileUpload::where('lot_id',$id)->get();

        return view('frontend.dealer.detail.lotdetail',compact("data"));



    }
   public function uploadfile(Request $request)
    {
  // print_r('expression');exit();
        $path=$_GET['url'];
        $path = str_replace('-', '/', $path);
  // print_r($path);exit();

        if ( !empty( $_FILES ) ) {
            $date = new \DateTime();

            $current_dir=str_replace('uploads','',getcwd());
            $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
            $name=str_replace(' ', '', $_FILES['file']['name']);
            $uploadPath = $current_dir.$path. DIRECTORY_SEPARATOR .$date->getTimestamp().'-'. $name;
           // print_r($uploadPath); exit;
            move_uploaded_file( $tempPath, $uploadPath );

            $answer = array( 'answer' => 'File transfer completed' );
            $json = json_encode( $answer );
            $newFileName = $date->getTimestamp().'-'. $name;
//    echo $json;
            echo $newFileName;
        } else {
            echo 'No files';
        }
    }
    public function savedealerphoto(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if($request->hasfile('images'))

        {

          $file = $request->file('images');
          $extension = $file->getClientOriginalExtension();
          $filename = time().".".$extension;

          $data['images'] = $file->move('public/uploads/dealer/',$filename);
          $request->images = $data['images'];


        }
        if ($id) {

            $action = "Updated";

            $modal = FileUpload::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  FileUpload::create($data);

        }

         $data['dealer_images'] = FileUpload::where('lot_id',$data['lot_id'])->get();

         $data['dealerimages']=view('frontend.dealer.dealer_image', compact('data'))->render();
         $response=array('response'=>$data['dealerimages']);

         return json_encode($response);

        

    }

    public  function removelotimg(Request $request)

    {
        // dd($request);

        $path = $request->path;

        $id = $request->id;

        $lot_id = $request->lot_id;

        $dir_path = getcwd() . '/' . $path;

        unlink($dir_path);


        $affected_rows = FileUpload::find($id)->delete();

         $data['dealer_images']= FileUpload::where('lot_id',$lot_id)->get();

         $data['dealerimages']= view('frontend.dealer.dealer_image', compact('data'))->render();

         $response=array('response'=> $data['dealerimages']);

         return json_encode($response);

    }


}

?>