<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Setting\Settings;

use App\Models\Invoice\Invoice;

use App\Models\Invoice\InvoiceItem;

use App\Models\Lot\Lot;

use App\Models\Bid\Bid;

use App\Models\Lot\FileUpload;

use App\Models\Training\Like;

use App\Models\Comment\Comment;

use App\Models\Training\TrainingResource;



use Illuminate\Support\Facades\Session;



class InvoiceController extends Controller

{

	  public function invoices(){

	  	$data['page_title'] = "Add invoice";

		$data['results']=Invoice::get();

	   // dd(uniqid());

        return view('invoice.index', compact('data'));

	  } 



	  public function makeinvoice($id){

	  	$data['page_title'] = "Add invoice";

		$data['bid']=Bid::where('id',$id)->first();

       

        return view('invoice.save', compact('data'));

	  }



	  public function invoice($id){

	  	$data['page_title'] = "Add invoice";

		$data['bid']=Bid::where('id',$id)->first();

         $data['results'] = Invoice::where('id', $id)->first();

         $data['item'] = InvoiceItem::where('invoice_id', $id)->get();

        // dd($data);

        return view('invoice.save', compact('data'));

	  }





	  public function saveinvoice(Request $request){

        $id = $request->id;

        $data = $request->all();

        $item  = [];

        $olditem=[];

        $removed_entries=[];

        // dd($data);

        // $item=$data['item'];

           if(isset($data['item'])){

           	 $item = $data['item'];

           	unset($data['item']);

           }



        if (isset($data['olditem'])) {

            $olditem = $data['olditem'];

            unset($data['olditem']);



        }

        if (isset($data['removed_entries'])) {

            $removed_entries = $data['removed_entries'];

            unset($data['removed_entries']);



        }

           $data['invoice_no']=uniqid();

        

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Invoice::find($id);

            $affected_rows = $modal->update($data);

             foreach ($olditem as $key => $value) {

                $value['invoice_id'] = $modal->id;

                 //dd($value['land_id']);     

                InvoiceItem::where('id', $value['id'])->update($value) ;

            }

            foreach ($item as $key => $value) {

             $value['invoice_id'] = $id;     

                InvoiceItem::create($value);

            }



        } else {

            $affected_rows =  Invoice::create($data);

            foreach( $item as $key=>$value){

              $value['invoice_id']=$affected_rows->id;

                InvoiceItem::create($value);

            }

        }

         if(!empty($removed_entries)){

          InvoiceItem::where('id',$removed_entries)->delete();

          }

        $message=   set_message($affected_rows,'Auction',$action);

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/invoices');

	  }



	  public function deleteinvoice($id){

        $affected_rows = Invoice::find($id)->delete();

        $message=   set_message($affected_rows,'Invoice','Deleted');

        Session::put('message', $message);

        return Redirect(app()->getLocale().'/admin/invoices');

	  }



	  public function invoicedetail($id){

	  	 $data['results'] = Invoice::where('id', $id)->first();

         $data['item'] = InvoiceItem::where('invoice_id', $id)->get();

         // dd($data['results'] );

         return view('invoice.detail',compact('data'));

	  }



      public function printinvoicedetail($id){

         $data['results'] = Invoice::where('id', $id)->first();

         $data['item'] = InvoiceItem::where('invoice_id', $id)->get();

         // dd($data['results'] );

         return view('invoice.detail',compact('data'));

      }

}

?>