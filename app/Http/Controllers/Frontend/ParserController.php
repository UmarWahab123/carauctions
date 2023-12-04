<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Settings;
use App\Models\Lot\Lot;
use App\Models\Lot\FileUpload;
use App\Models\Model\Make;
use App\Models\Model\Models;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class ParserController extends Controller
{
   public function copylotdata(){
   $url = 'https://carsfromwest.com/api/auction/lots?auctions=copart%2Ciaai&type=AM&yearMin=2022&yearMax=2022&onlyActive=true&page=4';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $data = curl_exec($curl);
    curl_close($curl);
    $lot_data = json_decode($data);
    // dd($lot_data->data);
    foreach ($lot_data->data as $key => $value) {
       // dd($value->attributes);
     
      $lot_no = Lot::where('lot_no',$value->attributes->auctionLotId)->first();
      //dd($lot_no);
      if(empty($lot_no))
      {
         $make_id=null;
         $model_id=null;
        $make=isset($value->attributes->lotData->make) ? $value->attributes->lotData->make : '-1';
        $model=isset($value->attributes->lotData->model) ? $value->attributes->lotData->model : '-1';
        $make=Make::where('name',$make)->first();
        if(!empty($make)){
          $make_id=$make->id;
          $modeldata=Models::where('name',$model)->where('make_id',$make_id)->first();
          if(!empty($modeldata)){
            $model_id=$modeldata->id;
          }else{
              $data=array('name'=>$model,'make_id'=>$make_id);
              $model=Models::Create($data);
              $model_id=$model->id;
          }

        }else{
          if(isset($value->attributes->lotData->make)){
             $data=array('name'=>$value->attributes->lotData->make);
              $make=Make::Create($data);
              $make_id=$make->id;
              $data=array('name'=>$model,'make_id'=>$make_id);
              $model=Models::Create($data);
              $model_id=$model->id;
          }
        }


        $lot_images = $value->attributes->lotData->images;
        $lotData = $value->attributes->lotData;
        $feature_image = $lot_images[0]->i;
        $sale=$lotData->sale;
        $saleDocument=$sale->saleDocument;
        $seller=$sale->seller;
        $branch=$sale->branch;
        $lotinfo=$lotData->info;
         $odometer="N/A";
        if(isset($lotinfo->odometer->unit)){
           $odometer="";
           $mileage="";
            $odometer=$lotinfo->odometer->value;
         $mileage=$lotinfo->odometer->value.' '.$lotinfo->odometer->unit;
        if($lotinfo->odometer->status==1){
           $mileage.='(actual)';
          }else{
              $mileage.='(not actual)';
          }
        }

        if(isset($lotinfo->fuelType) && $lotinfo->fuelType==1){
          $fuelType='Gas';
        }
         else if(isset($lotinfo->fuelType) && $lotinfo->fuelType==2){
          $fuelType='Petrol';
        }else{
          $fuelType='N/A';
        }

         if(isset($lotinfo->transmissionType) && $lotinfo->transmissionType==1){
          $transmissionType='Manual';
        }
         else if(isset($lotinfo->transmissionType) && $lotinfo->transmissionType==2){
          $transmissionType='Automatic';
        }
         else if(isset($lotinfo->transmissionType) && $lotinfo->transmissionType==3){
          $transmissionType='Continuously variable';
        }
         else if(isset($lotinfo->transmissionType) && $lotinfo->transmissionType==4){
          $transmissionType='Semi-automatic and dual-clutch';
        }
        else{
          $transmissionType='N/A';
        }

         if(isset($lotinfo->drivelineType) && $lotinfo->drivelineType==1){
          $drivelineType='FWD';
        }
         else if(isset($lotinfo->drivelineType) && $lotinfo->drivelineType==2){
          $drivelineType='RWD';
        }
         else if(isset($lotinfo->drivelineType) && $lotinfo->drivelineType==3){
          $drivelineType='4WD';
        }
         else if(isset($lotinfo->drivelineType) && $lotinfo->drivelineType==4){
          $drivelineType='AWD';
        }
        else{
          $drivelineType='N/A';
        }

        if(isset($saleDocument->group) && $saleDocument->group==1){
          $saleDocument='Clean title';
        }
         else if(isset($saleDocument->group) && $saleDocument->group==2){
          $saleDocument='Salvage title';
        }
         else if(isset($saleDocument->group) && $saleDocument->group==3){
          $saleDocument='Non repairable';
        }
         else if(isset($saleDocument->group) && $saleDocument->group==4){
          $saleDocument='Other';
        }
        else{
          $saleDocument='N/A';
        }

      $lot_array = array(
        'lot_title'=>$lotData->make.' '.$lotData->model,
        'feature_image'=>$feature_image,
        'lot_no'=>isset($value->attributes->auctionLotId)? $value->attributes->auctionLotId:'',
        'trading_date'=>isset($value->attributes->auctionDate) ? $value->attributes->auctionDate:'' ,
        'vin'=>isset($value->attributes->lotData->vin)? $value->attributes->lotData->vin:'',
        'insurance'=>isset($seller->insurance) ? $seller->insurance : '',
        'seller'=>isset($seller->displayName) ? $seller->displayName:'',
        'brand'=>strtoupper($value->attributes->auction),
        'auction_id'=>$value->attributes->auction=='iaai' ? 2 : 4,
        'status'=>'Approved',
        'make_id'=>$make_id,
        'model_id'=>$model_id,
        'repair_cost'=>isset($sale->repairCost) ? $sale->repairCost :'' ,
          'starting_price'=>isset($sale->currentBid) ? $sale->currentBid :'' ,
        'est_retail_value'=>isset($sale->retailPrice) ? $sale->retailPrice :'',
        'buy_now'=>isset($sale->buyNowPrice) ? $sale->buyNowPrice :'',
        'document_type'=>$saleDocument,
        'primary_damage'=>isset($lotinfo->primaryDamage) ? $lotinfo->primaryDamage :'',
        'secondary_damage'=>isset($lotinfo->secondaryDamage) ? $lotinfo->secondaryDamage :'N/A',
        'country'=>isset($branch->country) ? $branch->country :'',
        'state'=>isset($branch->state) ? $branch->state :'',
        'city'=>isset($branch->city) ? $branch->city :'',
        'zip'=>isset($branch->zip) ? $branch->zip :'',
        'locationName'=>isset($branch->locationName) ? $branch->locationName :'',
        'odometer'=> $odometer,
        'mileage'=> $mileage,
        'fuel'=>$fuelType,
        'transmission'=>$transmissionType,
        'drivelineType'=>$drivelineType,
        'cylinder'=>isset($lotinfo->engine->cylinders) ? $lotinfo->engine->cylinders :'',
        'body_style'=>isset($lotinfo->bodyStyle) ? $lotinfo->bodyStyle :'',
        'color'=>isset($lotinfo->color) ? $lotinfo->color :'' ,
        'key'=>isset($lotinfo->keys) ? $lotinfo->keys :'',
        'engine_type'=>isset($lotinfo->engine->capacity) ? isset($lotinfo->engine->type) ? $lotinfo->engine->type : ''.$lotinfo->engine->capacity :'',
        'vehicleCondition'=>isset($lotinfo->vehicleCondition) ? $lotinfo->vehicleCondition :'',
        'brand_logo'=>$value->attributes->auction=='iaai' ? '/public/uploads/lot/1078137875.jpg' :'/public/uploads/lot/1081035701.jpg'
      );
      // dd($lot_array);
      $affected_rows =  Lot::create($lot_array);
      $id=$affected_rows->id;
      foreach ($lot_images as $key => $value) {
        $parser =1;
        $data = array('lot_id'=>$id,'images'=>$value->i,'parser'=>1,'thumbnail'=>$value->t);
        FileUpload::create($data);
      }
    }
      }
      dd('Import Completed');
    return redirect()->back();
   }
}
?>