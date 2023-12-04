@extends('layout.header')

@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    

@endsection

@section('content')

@section('breadcrumb')

<h2 class="content-header-title float-left mb-0">

       {{$data['page_title']}}

      </h2>

<div class="breadcrumb-wrapper">

<ol class="breadcrumb">

<li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/auctions')}}/">

   @lang('lot.auctions')

    </a>

</li>

    <li class="breadcrumb-item"><a href="#">

       {{$data['page_title']}}

    </a>

</li>

</ol>

</div>

@endsection

  <div class="m-content">



        <div class="m-portlet__body">

            <ul class="nav nav-pills" role="tablist">



                <li class="nav-item">

                    <a class="nav-link active show" id="account-pill-general" data-toggle="pill" href="#basic_info" aria-expanded="true">

                    <i data-feather='save'></i>

                    <span class="font-weight-bold">@lang('lot.basic_info')</span>

                    </a>

                </li>

                @if (isset($data['results']->id))

                 

              

                <li class="nav-item">

                    <a class="nav-link " id="account-pill-general" data-toggle="pill" href="#photos" aria-expanded="true">

                    <i data-feather='file-text'></i>

                    <span class="font-weight-bold">@lang('lot.photos')</span>

                    </a>

                </li>

                @endif

            </ul>

            <div class="card">

            <div class="card-body">

            <div class="tab-content">

                <div class="tab-pane active show" id="basic_info" role="tabpanel">

             <section id="basic-input">

            <div class="card">

            <div class="card-body">



            <form action="{{ url(app()->getLocale().'/admin/savelot') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

                     <div class="row" >

                        <div class="col-4">


                            <label class="btn btn-primary mr-75 mb-0" for="change-picture">

                            <span class="d-none d-sm-block"><i data-feather="edit-2" class="mr-50"></i></span>

                            <input class="form-control" type="file" id="change-picture" hidden accept="image/png, image/jpeg, image/jpg" name="feature_image" />

                            <span class="d-block d-sm-none">

                                <i class="mr-0" data-feather="edit"></i>

                            </span>

                        </label>

                        <div class="media mb-2">

                            <img src="{{(isset($data['results']->feature_image) ? url($data['results']->feature_image) : 'https://www.zonergy.com.pk/wp-content/themes/consultix/images/no-image-found-360x250.png')}}" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="200" width="200" />

                            <div class="media-body mt-50">



                                <div class="col-12 d-flex mt-1 px-0">



                                    <button class="btn btn-outline-secondary d-block d-sm-none">

                                        <i class="mr-0" data-feather="trash-2"></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                       <label for="exampleFormControlTextarea1">@lang('lot.featured_image')</label>

                    </div>  

                    <div class="col-4">

                            <label class="btn btn-primary mr-75 mb-0" for="brand-logo">

                            <span class="d-none d-sm-block"><i data-feather="edit-2" class="mr-50"></i></span>

                            <input class="form-control" type="file" id="brand-logo" hidden accept="image/png, image/jpeg, image/jpg" name="brand_logo" />

                            <span class="d-block d-sm-none">

                                <i class="mr-0" data-feather="edit"></i>

                            </span>

                        </label>

                        <div class="media mb-2">

                            <img src="{{(isset($data['results']->brand_logo) ? url($data['results']->brand_logo) : 'https://www.zonergy.com.pk/wp-content/themes/consultix/images/no-image-found-360x250.png')}}" alt="users avatar" class="brand-logo users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="200" width="200" />

                            <div class="media-body mt-50">



                                <div class="col-12 d-flex mt-1 px-0">



                                    <button class="btn btn-outline-secondary d-block d-sm-none">

                                        <i class="mr-0" data-feather="trash-2"></i>

                                    </button>

                                </div>

                            </div>



                        </div>

                       <label for="exampleFormControlTextarea1">@lang('lot.brand_logo')</label>



                    </div>  

                   </div>

                    <div class="row mt-2">

                        <div class="col-md-3 col-12">

                           <div class="form-group">

                                <label>@lang('lot.status')</label>

                                <select class="form-control" name="status" data-option-id="{{(isset($data['results']->id) ? $data['results']->status : '')}}" required>

                                    <option value="">Select</option>

                                    <option>Approved</option>

                                    <option>UnApproved</option>

                                    <option>Canceled</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Show on Home</label>
                                <select class="form-control" name="home_now" data-option-id="{{(isset($data['results']->home_now) ? $data['results']->home_now : '')}}">
                                    <option value="">Select Home</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Transmission Type</label>
                                <select class="form-control" name="transmission" data-option-id="{{(isset($data['results']->transmission) ? $data['results']->transmission : '')}}">
                                    <option value="">Select</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                     <option value="Continuously variable">Continuously variable</option>
                                    <option value="Semi-automatic and dual-clutch">Semi-automatic and dual-clutch</option>
                                    <option value="N/A">N/A</option>

                                </select>
                            </div>
                        </div>
                           <div class="col-md-3">
                            <div class="form-group">
                                <label>Drive line Type</label>
                                <select class="form-control" name="drivelineType" data-option-id="{{(isset($data['results']->drivelineType) ? $data['results']->drivelineType : '')}}">
                                    <option value="">Select</option>
                                    <option value="FWD">FWD</option>
                                    <option value="RWD">RWD</option>
                                     <option value="4WD">4WD</option>
                                    <option value="AWD">AWD</option>
                                    <option value="N/A">N/A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.auction')</label>

                                <select name="auction_id" class="form-control" data-option-id="{{(isset($data['results']->auction_id) ? $data['results']->auction_id : '')}}" required>

                                        <option value="">Select</option>

                                        @foreach($data['auctions'] as $key=>$value)

                                        <option value="{{$value->id}}">{{$value->title}}</option>

                                        @endforeach

                                    </select>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('lot.lot_title')</label>

                            <input  class="form-control" name="lot_title" type="text" value="{{(isset($data['results']->lot_title) ? $data['results']->lot_title : '')}}" required>

                            </div>

                        </div> 

                         <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('lot.color') </label>

                            <input  class="form-control" name="color" type="text" value="{{(isset($data['results']->color) ? $data['results']->color : '')}}" required>

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.body_style')</label>

                                <select class="form-control" name="body_style" data-option-id="{{(isset($data['results']->body_style) ? $data['results']->body_style : '')}}" required>

                                    <option value="">Select</option>

                                    <option>Bus</option>

                                    <option>Cab chassis</option>

                                    <option>Cargo van</option>

                                    <option>Chassis</option>

                                    <option>Convertible</option>

                                    <option>Coupe</option>

                                    <option>Crew pickup</option>

                                    <option>Cutaway</option>

                                    <option>Extended cab pickup</option>

                                    <option>Extended cargo van</option>

                                    <option>Hatchback</option>

                                    <option>Incomplete chassis</option>

                                    <option>Liftback</option>

                                    <option>Mega pickup</option>

                                    <option>Pickup</option>

                                    <option>Roadster</option>

                                    <option>SUV</option>

                                    <option>Sedan</option>

                                    <option>Sports van</option>

                                    <option>Station wagon</option>

                                    <option>Van</option>

                                    <option>Van camper</option>

                                    <option>Van passenger</option>

                                    <option>Сoupe</option>

                                </select>

                            </div>

                        </div>


                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>Seller</label>

                                <input type="text" class="form-control" name="seller" value="{{(isset($data['results']->seller) ? $data['results']->seller : '')}}"/ required>

                            </div>

                        </div>
                                <div class="col-md-3">
                            <div class="form-group">
                                <label>Insurance</label>
                                <select class="form-control" name="insurance" data-option-id="{{(isset($data['results']->insurance) ? $data['results']->insurance : '')}}">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>Vehicle Condition</label>

                                <input type="text" class="form-control" name="vehicleCondition" value="{{(isset($data['results']->vehicleCondition) ? $data['results']->vehicleCondition : '')}}"/ required>

                            </div>

                        </div>
                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('lot.engine_type')</label>

                            <select class="form-control" name="engine_type" data-option-id="{{(isset($data['results']->engine_type) ? $data['results']->engine_type : '')}}" required>
                                    <option value="">Select</option>
                                    <option>0.7</option>
                                    <option>0.9</option>
                                    <option>1</option>
                                    <option>1.2</option>
                                    <option>1.3</option>
                                    <option>1.4</option>
                                    <option>1.5</option>
                                    <option>1.6</option>
                                    <option>1.7</option>
                                    <option>1.8</option>
                                    <option>1.9</option>
                                    <option>2</option>
                                    <option>2.1</option>
                                    <option>2.2</option>
                                    <option>2.3</option>
                                    <option>2.4</option>
                                    <option>2.6</option>
                                    <option>2.7</option>
                                    <option>2.8</option>
                                    <option>2.9</option>
                                    <option>3</option>
                                    <option>3.1</option>
                                    <option>3.2</option>
                                    <option>3.3</option>
                                    <option>3.4</option>
                                    <option>3.5</option>
                                    <option>3.6</option>
                                    <option>3.7</option>
                                    <option>3.8</option>
                            </select>
                        </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.retail_value')</label>

                               <input type="text" class="form-control "  name="est_retail_value" value="{{(isset($data['results']->est_retail_value) ? $data['results']->est_retail_value : '')}}" required />

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.fuel')</label>

                                 <select class="form-control" name="fuel" data-option-id="{{(isset($data['results']->fuel) ? $data['results']->fuel : '')}}" required>

                                    <option value="">Select</option>

                                    <option>Petrol</option>

                                    <option>Diesel</option>

                                    <option>Gas</option>

                                    <option>N/A</option>




                                 </select>



                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.highlight')</label>

                                <input type="text" class="form-control" name="highlights" value="{{(isset($data['results']->highlights) ? $data['results']->highlights : '')}}" required />

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('lot.key') </label>
                            
                                 <select class="form-control" name="key" data-option-id="{{(isset($data['results']->key) ? $data['results']->key : '')}}" required>

                                    <option value="">Select</option>

                                    <option value="1">Yes</option>

                                    <option value="0">No</option>

                                 </select>

                            </div>

                        </div>
                        
                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>Location Name</label>

                               <input type="text" class="form-control "  name="locationName" value="{{(isset($data['results']->locationName) ? $data['results']->locationName : '')}}" required/>

                            </div>

                        </div>
                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.lot_number')</label>

                               <input type="text" class="form-control "  name="lot_no" value="{{(isset($data['results']->lot_no) ? $data['results']->lot_no : '')}}" required/>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.odometer')</label>

                               <input type="text" class="form-control" name="odometer" value="{{(isset($data['results']->odometer) ? $data['results']->odometer : '')}}" required />

                            </div>

                        </div>

                        

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.primary_damage')</label>

                                <input type="text" class="form-control" name="primary_damage" value="{{(isset($data['results']->primary_damage) ? $data['results']->primary_damage : '')}}" required />

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('lot.secondary_damage')</label>

                            <input  class="form-control" name="secondary_damage" type="text" value="{{(isset($data['results']->secondary_damage) ? $data['results']->secondary_damage : '')}}" required>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('lot.damage') </label>

                             <select class="form-control" name="damage" data-option-id="{{(isset($data['results']->damage) ? $data['results']->damage : '')}}" required>

                                    <option value="">Select</option>

                                    @foreach (lot_damage() as $lot_damage)

                                       <option>{{$lot_damage}}</option>

                                    @endforeach

                                 </select>



                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.title_code')</label>

                               <input type="text" class="form-control "  name="title_code" value="{{(isset($data['results']->title_code) ? $data['results']->title_code : '')}}" required/>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.mileage')</label>

                               <input type="text" class="form-control" name="Mileage" value="{{(isset($data['results']->mileage) ? $data['results']->mileage : '')}}" required />

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.repair_cost')</label>

                               <input type="text" class="form-control" name="repair_cost" value="{{(isset($data['results']->repair_cost) ? $data['results']->repair_cost : '')}}"/>

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.document_type')</label>

                               <select class="form-control" name="document_type" data-option-id="{{(isset($data['results']->document_type) ? $data['results']->document_type : '')}}" required>

                                    <option value="">Select</option>

                                    <option>Clean title</option>

                                    <option>Non repairable</option>

                                    <option>Salvage title</option>

                                    <option>Other</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.starting_price')</label>

                               <input type="text" class="form-control" placeholder="Starting Price" name="starting_price" value="{{(isset($data['results']->starting_price) ? $data['results']->starting_price : '')}}" required />

                            </div>

                        </div>

                       

                    </div>

                    <div class="row">

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.vechile_type')</label>

                                <select class="form-control" name="vehicle_type" data-option-id="{{(isset($data['results']->vehicle_type) ? $data['results']->vehicle_type : '')}}" required>

                                    <option value="">Select</option>

                                    <option>Automobile</option>

                                    <option>ATV</option>

                                    <option>Boat</option>

                                    <option>Bus, minibus</option>

                                    <option>Industrial equipment</option>

                                    <option>Jet ski</option>

                                    <option>Motorcycle</option>

                                    <option>Recreational vehicle</option>

                                    <option>Snowmobile</option>

                                    <option>Trailer</option>

                                    <option>Truck</option>

                                    <option>Other</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('lot.vin') </label>

                            <input  class="form-control" name="vin" type="text" value="{{(isset($data['results']->vin) ? $data['results']->vin : '')}}" required>

                            </div>

                        </div>

                       
                        <div class="col-md-3 col-12">

                        <div class="form-group">

                                <label>@lang('lot.brand')</label>

                               <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{(isset($data['results']->brand) ? $data['results']->brand : '')}}" required />

                            </div>

                        </div> 

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                                <label>@lang('lot.year')</label>

                           
                                <select class="form-control" name="year" data-option-id="{{(isset($data['results']->id) ? $data['results']->year : '')}}" required>

                                    <option value="">Select</option>

                                   @foreach(range(date('Y')-50, date('Y')) as $y)

                                    <option>{{$y}}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                          <div class="col-md-3 col-12">

                            <div class="form-group">
                                <label>@lang('lot.cyclinder')</label>
                                <select class="form-control" name="cylinder" data-option-id="{{(isset($data['results']->cylinder) ? $data['results']->cylinder : '')}}" required>
                                    <option value="">Select</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>8</option>
                                    <option>10</option>
                                    <option>12</option>
                            </select>
                            </div>
                        </div>
                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.maker_name')</label>

                                <select name="make_id" class="form-control" data-option-id="{{(isset($data['results']->make_id) ? $data['results']->make_id : '')}}">

                                     <option value="">Select</option>

                                      @foreach($data['make'] as $key=>$value)

                                       <option value="{{$value->id}}">{{$value->name}}</option>

                                      @endforeach

                                 </select>

                            </div>

                        </div>



                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.model')</label>

                               

                                <select name="model_id" class="form-control" id="model" data-option-id="{{(isset($data['results']->model_id) ? $data['results']->model_id : '')}}">

                                     <option value="">Select</option>

                                     @if (isset($data['results']->model_id))

                                      @foreach($data['model'] as $key=>$value)

                                       <option value="{{$value->id}}">{{$value->name}}</option>

                                      @endforeach

                                     @endif



                                 </select>

                            </div>

                        </div>

                        

                          <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.buy_now_price')</label>

                               <input type="text" class="form-control" name="buy_now" value="{{(isset($data['results']->buy_now) ? $data['results']->buy_now : '')}}"/>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('lot.trading_date')</label>

                               <input type="date" class="form-control" id="start-date" name="trading_date" value="{{(isset($data['results']->trading_date) ? $data['results']->trading_date : '')}}" required />

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label> @lang('lot.note')</label>

                               <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="notes" name="notes">{{(isset($data['results']->notes) ? $data['results']->notes : '')}}</textarea>

                            </div>

                        </div> 

                        



                    </div>

                <div class="col-md-8 col-12">

                        <div class="form-group">

                            <label for="exampleFormControlTextarea1">@lang('lot.description')</label>

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description">{{(isset($data['results']->description) ? $data['results']->description : '')}}</textarea>

                        </div>

                </div>

                <div class="col-md-12">
                      <div  action="{{url('/admin/upload_file?url=-public-uploads-lot') }}" class="dropzone" id="dropzoneuploadmulti">

                    <div class="dz-message">@lang('auction.drop_file')</div>

                </div>
                </div>
                
                <div class="col-md-4">

                <img class="img-fluid mt-3" src="{{isset($data['results']->auction_banner)?url('/').''. $data['results']->auction_banner:'' }}">  
            </div>

               
                <input class="form-control" type="hidden" name="lotimage" value="{{(isset($data['results']->lotimage) ? $data['results']->lotimage : '')}}">
               {{-- <input class="form-control" type="hidden" name="auction_banner" value="{{(isset($data['results']->auction_banner) ? $data['results']->auction_banner : '')}}"> --}}

              

               <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('lot.save_change')</button>

                <a class="btn btn-outline-secondary" href="{{url(app()->getLocale().'/admin/lots')}}">@lang('lot.go_to_list')</a>



            @if(isset($data['results']->id ))

                <a class="btn btn-outline-secondary" href="{{url(app()->getLocale().'/admin/lotdetail')}}/{{$data["results"]->id}}">@lang('lot.go_to_detail')</a>

                    @endif

            </form>



            </div>

            </div>



            </section>

                </div>

                <div class="tab-pane" id="photos" role="tabpanel">

                  

                   <div class="row mt-2">

                      <div class="class-lg-4">

                          <button class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 add_photo" data-id='-1'>@lang('lot.add_photo')</button>

                      </div>  

                   </div>

                   <div class=" mt-2 lot_image">

                      @php

                         echo  isset($data['lotimages'])?$data['lotimages']:"";

                     @endphp

                 </div>

               

                </div>

           

            </div>

            </div>

            </div>



        </div>

    </div>

<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">@lang('lot.modal_title')</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      </div>



    </div>

  </div>

</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">



    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">@lang('lot.confirm_delete')</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">@lang('lot.cross')</span>

                </button>

            </div>

            <div class="modal-body">

                @lang('lot.delete_this')

            </div>

            <div class="modal-footer">
   
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> @lang('lot.close')</button>

                <a href='' class="btn btn-danger btn-ok test">@lang('lot.delete')</a>

            </div>
    
        </div>

    </div>

</div>



@endsection

@section('js')

        <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

        <script src="{{asset('/app-assets/js/scripts/forms/form-select2.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>


    <script type="text/javascript">
DropzoneMultiplefunc('dropzoneuploadmulti','.png,.jpg,.jpge',22.,'lotimage');

          $(document).ready(function () {

        $(document).on('click','.add_photo',function(){
           
            $('#view_modal').find('.modal-body').html('<p>Loading...</p>');

            $('#view_modal').modal('show');

            var lot_id=$('input[name="id"').val();

            var id=$(this).attr('data-id');
            var token = $('input[name=_token]').val();

            // alert(id);

            var formdata={'id':id,'lot_id':lot_id,'_token':token};

            // var formdata = $(this).serialize();

             

              $.ajax(

                {

                    type: 'get',
                    headers: "{'X-CSRF-TOKEN': token}",

                    url: "{{url(app()->getLocale().'/admin/lot_photo_modal/')}}",

                    dataType:"json",

                    data:formdata,

                    success: function (data) {

                        // console.log(data.response);

                        $('#view_modal').find('.modal-body').html(data.response);

                          DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1,'images');

                      }



            });

          });  

           // DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1,'images');

           $(document).on('click','.save_photo',function(){

            

               var formdata=$('#form_submit1').serialize();

               // console.log(formdata);

               // exit();

              $.ajax(

                {

                    type: 'post',

                    url: "{{url(app()->getLocale().'/admin/savelotphoto/')}}",

                    data:formdata,

                    dataType:'json',

                    success: function (data) {

                        // console.log(data.response);

                         $('.lot_image').html(data.response);

                         $('#view_modal').modal('hide');

                      }



            });

          }); 

             $(document).on('click','.removeimg', function() {

            var path = $(this).attr('data-path');

            // alert(path);

             var id = $(this).attr('data-id');

             var lot_id = $(this).attr('data-lot_id');

            $.ajax({

                type: "post",

                url: "{{url('admin/removelotimg') }}",

                data: {

                    path: path,

                    id:id,

                    lot_id:lot_id



                },

                dataType:'json',

                success: function(data) {



                  $('.lot_image').html(data.response);  

                }

            });

        });

                $(document).on('change','select[name=make_id]', function() {

             var id = $(this).val();

            $.ajax({

                type: "get",

                url: "{{url(app()->getLocale().'/admin/getmodel') }}/"+id,

                success: function(data) {

                  console.log(data);

                   $('#model').html('');

                  $('#model').append(data);

                }

            });

        });

    var start_date="{{(isset($data['results']->trading_date) ? $data['results']->trading_date : '')}}";
    
      $('input[name=trading_date]').val(start_date);

          }); 



        $('.tariningR').addClass('sidebar-group-active');

        $('.lot').addClass('active');

            // DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpge',1.,'auction_banner');
            

    $('#form_submit').validate({

    rules: {

    'title': {

    required: true

    },

    }

    });

     var changePicture = $('#change-picture'),

        userAvatar = $('.user-avatar'),

        languageSelect = $('#users-language-select2'),

        form = $('.form-validate'),

        birthdayPickr = $('.birthdate-picker');



    // Change user profile picture

    if (changePicture.length) {

        $(changePicture).on('change', function(e) {

            var reader = new FileReader(),

                files = e.target.files;

            reader.onload = function() {

                if (userAvatar.length) {

                    userAvatar.attr('src', reader.result);

                }

            };

            reader.readAsDataURL(files[0]);

        });

    }



     var changePicture1 = $('#brand-logo'),

        userAvatar1 = $('.brand-logo'),

        languageSelect = $('#users-language-select2'),

        form = $('.form-validate'),

        birthdayPickr = $('.birthdate-picker');

       

    // Change user profile picture

    if (changePicture1.length) {

        $(changePicture1).on('change', function(e) {

            var reader = new FileReader(),

                files = e.target.files;

            reader.onload = function() {

                if (userAvatar1.length) {

                    userAvatar1.attr('src', reader.result);

                }

            };

            reader.readAsDataURL(files[0]);

        });

    }


    </script>

    @endsection
    


