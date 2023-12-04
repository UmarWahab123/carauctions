@extends('frontend.layout.header')



@section('content')

 <link href="{{asset('/frontend/css/dropzone.css')}}" rel="stylesheet" type="text/css">


<section class="section-main section-cabinet pb-70">
	<div class="">
		<div class="row">
			<div class="col-md-5 col-lg-3">
				<div class="section-sidebar">

					@include('frontend.dashboard.sidebar')

				</div>
			</div>

			<div class="col-md-7 col-lg-9">
				 <div class="m-content">



        <div class="m-portlet__body">

            <ul class="nav nav-pills" role="tablist">



                <li class="nav-item">

                    <a class="nav-link active show" id="account-pill-general" data-toggle="pill" href="#basic_info" aria-expanded="true">

                    <i data-feather='save'></i>

                    <span class="font-weight-bold">@lang('dealer.basic_info')</span>

                    </a>

                </li>

                @if (isset($data['results']->id))

                 

              

                <li class="nav-item">

                    <a class="nav-link " id="account-pill-general" data-toggle="pill" href="#photos" aria-expanded="true">

                    <i data-feather='file-text'></i>

                    <span class="font-weight-bold">@lang('dealer.photo')</span>

                    </a>

                </li>

                @endif

            </ul>
            <br>

            <div class="card">

            <div class="card-body">

            <div class="tab-content">

            <div class="tab-pane active show" id="basic_info" role="tabpanel">

             <section id="basic-input">

            <div class="card">

            <div class="card-body">

                <form action="{{url(app()->getLocale().'/savedealer')}}" class="" id="form_submit" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

                     <div class="row" >

                        <div class="col-4">

                            <label class="btn btn-dark-blue  mr-75 mb-0" for="change-picture">

                            <span class="d-none d-sm-block"><i class="mr-50 fa fa-pencil"></i></span>

                            <input class="form-control" type="file" id="change-picture" hidden accept="image/png, image/jpeg, image/jpg" name="feature_image" />

                            <span class="d-block d-sm-none">

                                <i class="mr-0" data-feather="edit"></i>

                            </span>

                        </label>

                        <div class="media mb-2">

                            <img src="{{isset($data['results']->feature_image)?url('/'):'https://image.shutterstock.com/image-vector/image-not-found-grayscale-photo-260nw-1737334631.jpg'}}{{(isset($data['results']->feature_image) ? $data['results']->feature_image : '')}}" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="200" width="200" />

                            <div class="media-body mt-50">

                                <div class="col-12 d-flex mt-1 px-0">

                                    <button class="btn btn-outline-secondary d-block d-sm-none">

                                        <i class="mr-0" data-feather="trash-2"></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                        <label for="exampleFormControlTextarea1">@lang('dealer.featured_image')</label>

                    </div>  

                    <div class="col-4">

                        <label class="btn btn-dark-blue  mr-75 mb-0" for="brand-logo">

                            <span class="d-none d-sm-block"><i class="mr-50 fa fa-pencil"></i></span>

                            <input class="form-control" type="file" id="brand-logo" hidden accept="image/png, image/jpeg, image/jpg" name="brand_logo" />

                            <span class="d-block d-sm-none">

                                <i class="mr-0" data-feather="edit"></i>

                            </span>

                        </label>

                        <div class="media mb-2">

                            <img src="{{isset($data['results']->feature_image)?url('/'):'https://image.shutterstock.com/image-vector/image-not-found-grayscale-photo-260nw-1737334631.jpg'}}{{(isset($data['results']->brand_logo) ? $data['results']->brand_logo :'')}}" alt="users avatar" class="brand-logo users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="200" width="200" />

                            <div class="media-body mt-50">


                                <div class="col-12 d-flex mt-1 px-0">


                                    <button class="btn btn-outline-secondary d-block d-sm-none">

                                        <i class="mr-0" data-feather="trash-2"></i>

                                    </button>

                                </div>

                            </div>


                        </div>

                       <label for="exampleFormControlTextarea1">@lang('dealer.brand_logo')</label>

                    </div>  

                    </div>

                    <div class="row mt-2">


                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.auction')</label>

                                <select name="auction_id" class="form-control" data-option-id="{{(isset($data['results']->auction_id) ? $data['results']->auction_id : '')}}">

                                    <option value="">Select</option>

                                    @foreach($data['auctions'] as $key=>$value)

                                    <option value="{{$value->id}}">{{$value->title}}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('dealer.lot_title') </label>

                            <input  class="form-control" name="lot_title" type="text" value="{{(isset($data['results']->lot_title) ? $data['results']->lot_title : '')}}">

                            </div>

                        </div> 

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('dealer.color') </label>

                            <input  class="form-control" name="color" type="text" value="{{(isset($data['results']->color) ? $data['results']->color : '')}}">

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.body_style')</label>

                                <select class="form-control" name="body_style" data-option-id="{{(isset($data['results']->body_style) ? $data['results']->body_style : '')}}">

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

                    </div>

                     <div class="row">

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.drive')</label>

                                <input type="text" class="form-control" name="drive" value="{{(isset($data['results']->drive) ? $data['results']->drive : '')}}"/>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.engine_type') </label>

                                <select class="form-control" name="engine_type" data-option-id="{{(isset($data['results']->engine_type) ? $data['results']->engine_type : '')}}">

                                    <option value="">Select</option>

                                    <option>Petrol</option>

                                    <option>Diesel</option>
                                    <option>Electric</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.retail_value')</label>

                               <input type="text" class="form-control "  name="est_retail_value" value="{{(isset($data['results']->est_retail_value) ? $data['results']->est_retail_value : '')}}" />

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.fuel')</label>

                                 <select class="form-control" name="fuel" data-option-id="{{(isset($data['results']->fuel) ? $data['results']->fuel : '')}}">

                                    <option value="">Select</option>

                                    <option>Petrol</option>
                                    <option>Diesel</option>
                                    <option>Electric</option>
                                    

                                 </select>



                            </div>

                        </div>

                       

                    </div>

                    <div class="row">

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.highlight')</label>

                                <input type="text" class="form-control" name="highlights" value="{{(isset($data['results']->highlights) ? $data['results']->highlights : '')}}"/>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                        <div class="form-group">

                            <label>@lang('dealer.key') </label>

                            <input  class="form-control" name="key" type="text" value="{{(isset($data['results']->key) ? $data['results']->key : '')}}">

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.lot_number')</label>

                               <input type="text" class="form-control "  name="lot_no" value="{{(isset($data['results']->lot_no) ? $data['results']->lot_no : '')}}" />

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.odometer')</label>

                               <input type="text" class="form-control" name="odometer" value="{{(isset($data['results']->odometer) ? $data['results']->odometer : '')}}"/>

                            </div>

                        </div>

                       

                    </div>

                    <div class="row">

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.primary_damage')</label>

                                <input type="text" class="form-control" name="primary_damage" value="{{(isset($data['results']->primary_damage) ? $data['results']->primary_damage : '')}}"/>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.secondary_damage') </label>

                                <input  class="form-control" name="secondary_damage" type="text" value="{{(isset($data['results']->secondary_damage) ? $data['results']->secondary_damage : '')}}">

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.damage') </label>

                                <select class="form-control" name="damage" data-option-id="{{(isset($data['results']->damage) ? $data['results']->damage : '')}}">

                                    <option value="">Select</option>

                                    @foreach (lot_damage() as $lot_damage)

                                       <option>{{$lot_damage}}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label> @lang('dealer.title_code') </label>

                               <input type="text" class="form-control "  name="title_code" value="{{(isset($data['results']->title_code) ? $data['results']->title_code : '')}}" />

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.transmission')</label>

                               <input type="text" class="form-control" name="transmission" value="{{(isset($data['results']->transmission) ? $data['results']->transmission : '')}}"/>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.mileage')</label>

                               <input type="text" class="form-control" name="Mileage" value="{{(isset($data['results']->mileage) ? $data['results']->mileage : '')}}"/>

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.repair_cost')</label>

                               <input type="text" class="form-control" name="repair_cost" value="{{(isset($data['results']->repair_cost) ? $data['results']->repair_cost : '')}}"/>

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.document_type')</label>

                               <select class="form-control" name="document_type" data-option-id="{{(isset($data['results']->document_type) ? $data['results']->document_type : '')}}">

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

                                <label>@lang('dealer.starting_price')</label>

                               <input type="text" class="form-control" placeholder="Starting Price" name="starting_price" value="{{(isset($data['results']->starting_price) ? $data['results']->starting_price : '')}}"/>

                            </div>

                        </div>

                       

                    </div>

                    <div class="row">

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.vechile_type')</label>

                                <select class="form-control" name="vehicle_type" data-option-id="{{(isset($data['results']->vehicle_type) ? $data['results']->vehicle_type : '')}}">

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

                            <label>@lang('dealer.vin') </label>

                            <input  class="form-control" name="vin" type="text" value="{{(isset($data['results']->vin) ? $data['results']->vin : '')}}">

                            </div>

                        </div>

                         <div class="col-md-3 col-12 d-none">

                           <div class="form-group">

                                <label>@lang('dealer.status')</label>

                                <select class="form-control" name="status" data-option-id="{{(isset($data['results']->id) ? $data['results']->status : '')}}">

                                    <option value="">Select</option>

                                    <option>Approved</option>

                                    <option>UnApproved</option>

                                    <option>Canceled</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.brand')</label>

                                <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{(isset($data['results']->brand) ? $data['results']->brand : '')}}"/>

                            </div>

                        </div> 

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.year')</label>

                                <select class="form-control" name="year" data-option-id="{{(isset($data['results']->id) ? $data['results']->year : '')}}">

                                    <option value="">Select</option>

                                   @foreach(range(date('Y')-50, date('Y')) as $y)

                                    <option>{{$y}}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.cyclinder')</label>

                               <input type="text" class="form-control" name="cylinder" value="{{(isset($data['results']->cylinder) ? $data['results']->cylinder : '')}}"/>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.maker_name')</label>

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

                                <label>@lang('dealer.model')</label>

                               

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

                                <label>@lang('dealer.buy_now_price')</label>

                               <input type="text" class="form-control" name="buy_now" value="{{(isset($data['results']->buy_now) ? $data['results']->buy_now : '')}}"/>

                            </div>

                        </div>

                        <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label>@lang('dealer.trading_date')</label>

                               <input type="date" class="form-control" id="start-date" name="trading_date" value="{{(isset($data['results']->trading_date) ? $data['results']->trading_date : '')}}"/>

                            </div>

                        </div>

                         <div class="col-md-3 col-12">

                            <div class="form-group">

                                <label> @lang('dealer.note')</label>

                               <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="notes" name="notes">{{(isset($data['results']->notes) ? $data['results']->notes : '')}}</textarea>

                            </div>

                        </div> 

                        



                    </div>

             <div class="col-md-8 col-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">@lang('dealer.description')</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description">{{(isset($data['results']->description) ? $data['results']->description : '')}}</textarea>
                </div>
                    </div>
                  <div class="col-md-8 col-12">
                    <div action="{{url('admin/upload_file?url=-public-uploads-lot') }}" class="dropzone" id="imagesupload">
                        <div class="fallback">
                        </div>
                        @if(!empty($data['dealer_images']))
                        @foreach($data['dealer_images'] as $key=>$dealerimage)
                            <img src="{{url('/')}}/{{$dealerimage->images}}" style="height: 100px; width: 100px;">
                        @endforeach
                        @endif
                     </div>

                 </div>
              <!--     <div class="col-md-4">

                <img class="img-fluid mt-3" src="{{isset($data['results']->auction_banner)?url('/').''. $data['results']->auction_banner:'' }}">  
            </div> -->
          <input class="form-control" type="hidden" name="lotimage" value="{{(isset($data['results']->lotimage) ? $data['results']->lotimage : '')}}">
               {{-- <input class="form-control" type="hidden" name="auction_banner" value="{{(isset($data['results']->auction_banner) ? $data['results']->auction_banner : '')}}"> --}}

               <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                <input class="form-control" name="dealer_id" type="hidden" value="{{(isset(Auth::user()->id) ? Auth::user()->id : '')}}">

               <button type="submit" class="btn btn-dark-blue mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('dealer.save_change')</button>

                <a class="btn btn-outline-secondary" href="{{url(app()->getLocale().'/view_dealer')}}">@lang('dealer.go_to_list')</a>


            </form>



            </div>

            </div>



            </section>

                </div>

                <div class="tab-pane" id="photos" role="tabpanel">

                  

                   <div class="row mt-2">

                      <div class="class-lg-4">

                          <button class="btn btn-dark-blue  mb-1 mb-sm-0 mr-0 mr-sm-1 add_photo" data-id='-1'>@lang('dealer.add_photo')</button>

                      </div>  

                   </div>

                   <div class=" mt-2 dealer_image">

                      @php

                         echo  isset($data['dealerimages'])?$data['dealerimages']:"";

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

        <h5 class="modal-title" id="exampleModalLabel">@lang('dealer.lot_image')</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      </div>



    </div>

  </div>

</div>



			</div>
		</div>
	</div>
	
</section>



@endsection


 @section('js')

        <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

        <script src="{{asset('/app-assets/js/scripts/forms/form-select2.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

      <script src="{{asset('/frontend/js/dropzone.js')}}"></script>
      <script src="{{asset('/frontend/js/dropzonescript.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
         $('.your_lots').addClass('activetab');

            $('select[data-option-id]').each(function () {

                $(this).val($(this).data('option-id'));

            });

            $(document).on('click','.add_photo',function(){

                $('#view_modal').find('.modal-body').html('<p>Loading...</p>');
                

                $('#view_modal').modal('show');

                var lot_id=$('input[name="id"').val();

                var id=$(this).attr('data-id');

                var images = $('input[name=images]').val();

                var title = $('input[name=title]').val();

                formdata={'id':id,'lot_id':lot_id,'images':images,'title':title};

             

                $.ajax(

                {

                    type: 'get',

                    url: "{{url(app()->getLocale().'/lot_photo_modal/')}}",

                    dataType:"json",

                    data:formdata,

                    success: function (data) {

                        $('#view_modal').find('.modal-body').html(data.response);
                        // DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1,'images');

                    }

                });

            });  


            $(document).on('click','.save_photo',function(){
                // $("#photo_save"). prop('disabled', true)

                var token = $('input[name=_token]').val();

                var dealer_id = $('input[name=dealer_id').val();

                var title = $('input[name=title]').val();

                var form_data = new FormData(document.getElementById("form_submit1"));


                $.ajax(

                {

                    type: "post",
                    headers: "{'X-CSRF-TOKEN': _token}",
                    url: "{{url(app()->getLocale().'/savedealerphoto/')}}",
                    method:"POST",
                    data:form_data,
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function (data) {

                        // console.log(data.response);

                         $('.dealer_image').html(data.response);

                         $('#view_modal').modal('hide');

                    }

                });

            });

            $(document).on('click','.removeimg', function() {

                var token = $('input[name=_token]').val();
                var path = $(this).attr('data-path');

                var title = $('input[name=title]').val();

                var id = $(this).attr('data-id');

                var lot_id = $(this).attr('data-lotid');
                // alert(lot_id);
                // return false;
                var form_data = {'_token':token,'path':path,'id':id,'lot_id':lot_id,'title':title};

                $.ajax({

                    type: "post",
                    headers: "{'X-CSRF-TOKEN': _token}",
                    url: "{{url(app()->getLocale().'/removelotimg') }}",

                    data: form_data,

                    dataType:'json',

                    success: function(data) {

                      $('.dealer_image').html(data.response);  

                    }

                });

            });

            $(document).on('change','select[name=make_id]', function() {

                var id = $(this).val();

                $.ajax({

                    type: "get",

                    url: "{{url(app()->getLocale().'/getmodel')}}/"+id,

                    success: function(data) {

                      console.log(data);

                       $('#model').html('');

                      $('#model').append(data);

                    }

                });

             });

        }); 



        $('.tariningR').addClass('sidebar-group-active');

        $('.lot').addClass('active');


        $('#form_submit').validate({

            rules: {

                'lot_title': {

                required: true

                }, 
                'auction_id': {

                required: true

                },

                'color': {

                required: true

                },
                'auction_id': {

                required: true

                }, 
                'drive': {

                required: true

                },
                'engine_type': {

                required: true

                },
                'est_retail_value': {

                required: true

                },
                'fuel': {

                required: true

                },
                'highlights': {

                required: true

                },
                'key': {

                required: true

                }, 
                'odometer': {

                required: true

                },
                'primary_damage': {

                required: true

                },
                'secondary_damage': {

                required: true

                },
                'damage': {

                required: true

                },
                'transmission': {

                required: true

                },
                'Mileage': {

                required: true

                },
               
                'document_type': {

                required: true

                },
                'starting_price': {

                required: true

                },
                'vehicle_type': {

                required: true

                }, 
                'vin': {

                required: true

                },
                // 'status': {

                // required: true

                // },
                'brand': {

                required: true

                }, 
                'year': {

                required: true

                }, 
                
            
                'title_code': {

                required: true

                },'body_style': {

                required: true

                },'lot_no': {

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



