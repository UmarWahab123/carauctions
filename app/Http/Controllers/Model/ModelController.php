<?php

namespace App\Http\Controllers\Model;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Invoice\Invoice;

use App\Models\Invoice\InvoiceItem;

use App\Models\Lot\Lot;

use App\Models\Bid\Bid;

use App\Models\Model\Models;

use App\Models\Model\Make;

use App\Models\Lot\FileUpload;

use App\Models\Training\Like;

use App\Models\Comment\Comment;

use App\Models\Training\TrainingResource;



use Illuminate\Support\Facades\Session;



class ModelController extends Controller

{

   public function models(){

    $data['results']=Models::get();

    return view('model.index',compact('data'));

   }



   public function model($lang,$id=-1){

     $data['page_title']="Add Model";

      $data['make']=Make::get();



	   	if($id!=-1){

	   	$data['page_title']="Update Model";

	   	$data['results']=Models::where('id',$id)->first();

	   	}

	   	return view('model.save',compact('data'));



   }



   public function savemodel(Request $request){

   	$id=$request->id;

   	$data=$request->all();

   	$action = "Added";

   	if($id){

   		$action = "Updated";

   		$affected_rows=Models::find($id)->update($data);

   	}else{

   		$affected_rows=Models::create($data);   	

   	}

   	   $message=   set_message($affected_rows,'Model',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/models');

   }



    public function deletemodel($lang,$id){



        $affected_rows = Models::find($id)->delete();

        $message=   set_message($affected_rows,'Model','Deleted');

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/models');

   }







   public function makes(){

    $data['results']=Make::get();

    return view('make.index',compact('data'));

   }



   public function make($lang,$id=-1){

     $data['page_title']="Add Make";

	   	if($id!=-1){

	   	$data['page_title']="Update Make";

	   	$data['results']=Make::where('id',$id)->first();

	   	}

	   	return view('make.save',compact('data'));



   }



   public function savemake(Request $request){

   	$id=$request->id;

   	$data=$request->all();

   	$action = "Added";

   	if($id){

   		$action = "Updated";

   		$affected_rows=Make::find($id)->update($data);

   	}else{

   		$affected_rows=Make::create($data);   	

   	}

   	   $message=   set_message($affected_rows,'make',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/makes');

   }



   public function deletemake($lang,$id){



        $affected_rows = Make::find($id)->delete();

        $message=   set_message($affected_rows,'Make','Deleted');

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/makes');

   }



}



?>