<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Settings;
use App\Models\Setting\ContactUs;
use App\Models\Auction\Auction;
use App\Models\Lot\Lot;
use App\Models\Bookmark\Bookmark;
use App\Models\Model\Models;
use App\Models\Model\Make;
use App\Models\User;
use App\Models\Comment\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Countries\Countries;
use App\Models\Countries\State;
use App\Models\Countries\City;
use Carbon\Carbon;
use App\Models\Lot\FileUpload;


class FilterController extends Controller
{
   public function searchbar(Request $request){

    $data=$request->all();

    // dd($data);
       Session::put('data', $data);
       // dd(env('PER_PAGE'));
      $data['per_page']=env('PER_PAGE');
      $data['offset']=1;
        $data['post']= $data;
      $data['make']=Make::get();
      
      $data['auction']=Auction::get();
      $country_id=$data['auction']->pluck('location');
      $state_id=$data['auction']->pluck('state');
      $data['state']=State::whereIn('country_id',$country_id)->get();
      $data['city']=City::whereIn('state_id',$state_id)->get();

      $query=Lot::where('vin', 'LIKE', '%' .$data['search']. '%')->orWhere('lot_no', 'LIKE', '%' .$data['search']. '%')
      ->join('model','lot.model_id','=','model.id')
      ->orWhere('model.name','LIKE', '%' .$data['search']. '%')
      ->join('make','model.make_id','make.id')
      ->orWhere('make.name','LIKE', '%' .$data['search']. '%')
      ->select('lot.id','lot.lot_title','lot.brand_logo','lot.feature_image','lot.lot_no','lot.vin','lot.primary_damage','lot.secondary_damage','lot.mileage','lot.buy_now','lot.secondary_damage','lot.auction_id')
      ->with('lot');
        $id=0;
          if(Auth::check()){
            $id=Auth::user()->id;
          }  
       $data['search']= $query->take($data['per_page'])->get();
        foreach($data['search'] as $row){
            $row->bookmark=Bookmark::where('lot_id',$row->id)->where('user_id',$id)->count();
        }
       $data['total']=$query->count();
      // dd( $data['search']);
         // $data['models']=Models::get();
    $data['models']=[];
       $data['auction']=Auction::get();
    $country_id=$data['auction']->pluck('location');
    $state_id=$data['auction']->pluck('state');
    $data['state']=State::whereIn('country_id',$country_id)->get();
    $data['city']=City::whereIn('state_id',$state_id)->get();
    // dd($data['search']);
    return view("frontend.search.index",compact("data"));
   }
   public function filter(Request $request){
    $data=$request->all();
    // dd($data);
    $data['offset']=1;
    $data['per_page']=env('PER_PAGE');
    $data['post']= $data;
    $data['make']=Make::get();
    $data['models']=Models::where('make_id',isset($data['brand']) ? $data['brand'] : [])->get();
   
    $data['auction']=Auction::get();
    $country_id=$data['auction']->pluck('location');
    $state_id=$data['auction']->pluck('state');
    $data['state']=State::whereIn('country_id',$country_id)->get();
    $data['city']=City::whereIn('state_id',$state_id)->get();
   
         $data['year']='1950';
          $data['year_to']='2099';
          if($request->year){
          $data['year']=$request->year;
          } 
          if($request->year_to){
          $data['year_to']=$request->year_to;
          }

         $query=Lot::with('lot')
         ->join('auctions','lot.auction_id','auctions.id')
          ->select('lot.*','auctions.start_date')
          ->whereYear('trading_date','>=',$data['year'])
          ->whereYear('trading_date','<=',$data['year_to']);

       if(isset($data['brand']) &&  !empty($data['brand']) && $data['brand'] !="all-make"){
        // dd($data['brand']);
              $query=$query->where('make_id',$data['brand']);
          }
           if(isset($data['model']) &&  !empty($data['model']) && $data['model'] !="all-model"){
              $query=$query->where('model_id',$data['model']);
          }

    $data['search']=$query->take($data['per_page'])->get();
    // dd($query->toSql());
    $data['total']=$query->count();
    return view("frontend.search.index",compact("data"));
   }

  public function lotsearch(){
    $data['per_page']=env('PER_PAGE');
    $data['offset']=1;

    $data['make']=Make::get();
    // $data['models']=Models::get();
    $data['models']=[];
    $data['auction']=Auction::get();
    $data['search']= Lot::with('lot')->take($data['per_page'])->get();
    
    // dd($data);
    $data['total']=Lot::count();
    $country_id=$data['auction']->pluck('location');
    $state_id=$data['auction']->pluck('state');
    $data['state']=State::whereIn('country_id',$country_id)->get();
    $data['city']=City::whereIn('state_id',$state_id)->get();
    $brand=['search'=>'','brand'=>'','model'=>'','year'=>''];
    $section=array('search'=>'','data'=>$brand);
    Session::put('data', $section);
    return view("frontend.search.index",compact("data"));

   }

	public function savebookmark(Request $request){
		$data=$request->all();
         if($data['bookmark']==0){
         	$data['bookmark']=1;
         	$response=Bookmark::create($data);
         }else{
         	$data['bookmark']=0;
           $response=Bookmark::where('user_id',$data['user_id'])->where('lot_id',$data['lot_id'])->delete();
         }
        $response=array('response'=>$response);
        return json_encode($response);

	}

	public function bookmarks(){
		 $data['bookmark']=Bookmark::where('user_id',Auth::user()->id)->with('lot')->get();
        $id=0;
          if(Auth::check()){
            $id=Auth::user()->id;
          } 
        foreach($data['bookmark'] as $key=>$row){
            $row->bookmark=Bookmark::where('lot_id',$row->lot_id)->where('user_id',$id)->count();
        }
        // dd($data);
		return view('frontend.bookmarks.index', compact('data'));
	}

   public function getbrandmodels($lang,$id){
            // dd($id);
            $models= Models::where('make_id',$id)->get();
            // dd($states);
            $options='';
            foreach($models as $model){
              $options.='<option value='.$model->id.'>'.$model->name.'</option>';
            }
           // dd($options);
        return $options;
   } 
   public function getmultiplemodel(Request $request){
          $data=$request->all();
           
            $models= Models::whereIn('make_id',isset($data['id']) ? $data['id'] : [])->get();
            // dd($models);

            $options='';
            foreach($models as $model){
              $options.='<option value='.$model->id.'>'.$model->name.'</option>';
            }
           // dd($options);
        return $options;
   }  

   public function multiplefilter(Request $request){


          $data=$request->all();
           $data['offset']=1;
          Session::put('sidebarfilter',$data);
          Session::forget('data');
          $page=$request->page;
          if($page > 0){
            $page=$page-1;
          }
          $offset=$page*env('PER_PAGE');

          // dd($offset);
         
           $data['year']='1950';
          $data['year_to']='2099';
          $data['date_from']='1920-1-1';
          $data['date_to']='2099-12-12';

          if($request->year){
          $data['year']=$request->year;
          } 
          if($request->year_to){
          $data['year_to']=$request->year_to;
          }
            if($request->date_from){
          $data['date_from']=$request->date_from;
          } 
          if($request->date_to){
          $data['date_to']=$request->date_to;
          }

          $data['mileage_min']='0';
          $data['mileage_max']='10000000';
          if($request->mileage_min){
            $data['mileage_min']=$request->mileage_min;
          }
          if($request->mileage_max){
          $data['mileage_max']=$request->mileage_max;
          }
          if($data['sort']=="Select"){$data['sort']='lot.created_at|asc';}
          $sort=explode("|", $data['sort']);
          $data['sort']=$sort[0];
          $data['sort_order']=$sort[1];


          // dd($sort[0]);
            
          $query=Lot::with('lot')
          ->join('auctions','lot.auction_id','auctions.id')
          ->select('lot.*','auctions.start_date')
          ->whereYear('trading_date','>=',$data['year'])
          ->whereYear('trading_date','<=',$data['year_to'])
          ->whereBetween('odometer', [$data['mileage_min'], $data['mileage_max']])
          ->where('lot.trading_date','>=',$data['date_from'])
          ->where('lot.trading_date','<=',$data['date_to']);
          // ->whereIn('auctions.state',$data['location'])
          // ->whereIn('auctions.city',$data['area']);
           if(isset($data['brand']) &&  !empty($data['brand'])){
              $data['search']=$query->whereIn('lot.brand',$data['brand']);
          }
           if(isset($data['make']) &&  !empty($data['make'])){
              $data['search']=$query->whereIn('make_id',$data['make']);
          }
           if(isset($data['model']) &&  !empty($data['model'])){
              $data['search']=$query->whereIn('model_id',$data['model']);
          }
            if(isset($data['damage']) &&  !empty($data['damage'])){
              $data['search']=$query->whereIn('primary_damage',$data['damage']);
          }

          if(isset($data['buynowcheck']) &&  !empty($data['buynowcheck'])){
              $data['search']=$query->whereNotNull('buy_now');
          }
          if(isset($data['engine']) &&  !empty($data['engine'])){
          $data['search']=$query->whereIn('engine_type',$data['engine']);
          }

          if(isset($data['fuel_type']) &&  !empty($data['fuel_type'])){
          $data['search']=$query->whereIn('fuel',$data['fuel_type']);
          }
          if(isset($data['transmission']) &&  !empty($data['transmission'])){
          $data['search']=$query->whereIn('transmission',$data['transmission']);
          }
          if(isset($data['document_type']) &&  !empty($data['document_type']) ){
          $data['search']=$query->whereIn('lot.document_type',$data['document_type']);
          }
           if(isset($data['body_type']) &&  !empty($data['body_type']) ){
          $data['search']=$query->whereIn('lot.body_style',$data['body_type']);
          }

           if(isset($data['excludeacution']) &&  !empty($data['excludeacution'])){
              $data['search']=$query->where('auctions.end_date','>=',date('Y-m-d'));
          }

          if(isset($data['excludetrading'])  &&  !empty($data['excludetrading'])){
              $data['search']=$query->whereNull('trading_date');
          }
           
           $data['per_page']=env('PER_PAGE');
           $data['search']=$query->offset($offset)->take($data['per_page'])->orderBy($data['sort'],$data['sort_order'])->get();
           // dd($data['search']);
           // dd($query->toSql());
         
    // dd($data);
           $data['total']=$query->count();
           $response= view("frontend.search.main_section",compact('data'))->render();
           $link= view("frontend.search.links",compact('data'))->render();
          $response=array('response'=>$response,"link"=>$link,'offset'=>$offset,'status'=>count($data['search']));
        return json_encode($response);
   } 




}
?>