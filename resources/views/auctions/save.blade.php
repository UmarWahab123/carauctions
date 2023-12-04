@extends('layout.header')

@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/app-calendar.css')}}">

      <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/calendars/fullcalendar.min.css')}}">


@endsection

@section('content')

@section('breadcrumb')

<h2 class="content-header-title float-left mb-0">

       {{$data['page_title']}}

      </h2>

<div class="breadcrumb-wrapper">

<ol class="breadcrumb">

<li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/auctions')}}/">

   @lang('auction.auction')

    </a>

</li>

    <li class="breadcrumb-item"><a href="#">

       {{$data['page_title']}}

    </a>

</li>

</ol>

</div>

@endsection

<div class="content-body">

<section id="basic-input">

<div class="card">

<div class="card-body">



<form action="{{ url(app()->getLocale().'/admin/saveauction') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-4 col-12">

            <div class="form-group">

                <label>@lang('auction.title') </label>

                <input  class="form-control" name="title" type="text" value="{{(isset($data['results']->id) ? $data['results']->title : '')}}">

                </div>

            </div>

            

            <div class="col-md-2 col-12">

                <div class="form-group">

                    <label>@lang('auction.status')</label>

                    <select class="form-control" name="status" data-option-id="{{(isset($data['results']->id) ? $data['results']->status : '')}}">

                        <option value="">Select</option>

                        <option>Active</option>

                        <option>Inactive</option>

                    </select>

                </div>

            </div>

             <div class="col-md-2 col-12">

                <div class="form-group">

                    <label>@lang('auction.start_date')</label>

                   <input type="text" class="form-control " id="start-date" name="start_date" value="{{(isset($data['results']->start_date) ? $data['results']->start_date : '')}}" />

                </div>

            </div>

             <div class="col-md-2 col-12">

                <div class="form-group">

                    <label>@lang('auction.end_date')</label>

                   <input type="text" class="form-control" id="end-date" name="end_date"  value="{{(isset($data['results']->end_date) ? $data['results']->end_date : '')}}"/>

                </div>

            </div>

            <div class="col-md-2 col-12">

                <div class="form-group">

                    <label>@lang('auction.brand')</label>

                   <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{(isset($data['results']->brand) ? $data['results']->brand : '')}}"/>

                </div>

            </div>

            <div class="col-md-4 col-12">

                <div class="form-group">

                    <label>@lang('auction.country')</label>

                    <select class="form-control location" name="location" data-option-id="{{(isset($data['results']->location) ? $data['results']->location : '')}}">

                        <option value="">Select</option>

                        @foreach ($data['countries'] as $country)

                        <option value="{{$country->id}}">{{$country->name}}</option>

                        @endforeach



                    </select>

                </div>

            </div>

            <div class="col-md-4 col-12">

                <div class="form-group">

                    <label>@lang('auction.state')</label>

                    <select class="form-control state" name="state" id="state" data-option-id="{{(isset($data['results']->state) ? $data['results']->state : '')}}">

                        <option value="">Select</option>

                          @if (isset($data['results']->state))

                        @foreach ($data['state'] as $state)

                        <option value="{{$state->id}}">{{$state->name}}</option>

                        @endforeach

                           @endif



                    </select>

                </div>

            </div>

            <div class="col-md-4 col-12">

                <div class="form-group">

                    <label>@lang('auction.city')</label>

                    <select class="form-control" name="city" id="city" data-option-id="{{(isset($data['results']->city) ? $data['results']->city : '')}}">

                        <option value="">Select</option>

                        @if (isset($data['results']->city))

                        @foreach ($data['city'] as $city)

                        <option value="{{$city->id}}">{{$city->name}}</option>

                        @endforeach

                        @endif



                    </select>

                </div>

            </div>

             <div class="col-md-4 col-12">

                <div class="form-group">

                    <label>@lang('auction.saleman')</label>

                  

                   <select class="form-control" name="saleman" data-option-id="{{(isset($data['results']->saleman) ? $data['results']->saleman : '')}}">

                        <option value="">Select</option>

                        <option>INSURANCE COMPANY</option>

                        <option>DEALER</option>

                        <option>UNKNOWN</option>

                    </select>

                </div>

            </div>

             <div class="col-md-4 col-12 d-none">

                <div class="form-group">

                    <label>@lang('auction.document_type')</label>

                   <input type="text" class="form-control "  name="document_type" placeholder="Document Type" value="{{(isset($data['results']->document_type) ? $data['results']->document_type : '')}}"/>

                </div>

            </div>

           

        </div>

    <div class="row">

        <div class="col-md-4">

            <div class="form-group" >

                <label>

                   @lang('auction.auction_banner')

                </label>

                <div  action="{{url('/admin/upload_file?url=-public-uploads-auction-banner') }}" class="dropzone" id="dropzoneupload">

                    <div class="dz-message">@lang('auction.drop_file')</div>

                </div>

            </div>

            </div>

              <div class="col-md-4">

         <img class="img-fluid mt-3" src="{{isset($data['results']->auction_banner)?url('/').''. $data['results']->auction_banner:'' }}">  </div>



    </div>

   <input class="form-control" type="hidden" name="auction_banner" value="{{(isset($data['results']->auction_banner) ? $data['results']->auction_banner : '')}}">

  

   <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('auction.save_change')</button>

    <a class="btn btn-outline-secondary" href="{{url(app()->getLocale().'/admin/auctions')}}">@lang('auction.go_to_list')</a>




</form>



</div>

</div>



</section>

</div>

@endsection





    @section('js')

        <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/calendar/fullcalendar.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/extensions/moment.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

        <script src="{{asset('/app-assets/js/scripts/pages/app-calendar-events.js')}}"></script>

       <script src="{{asset('/app-assets/js/scripts/pages/app-calendar.js')}}"></script>

    





    <script type="text/javascript">

        $('.tariningR').addClass('sidebar-group-active');

       

        $('.view_auction').addClass('active');

        

            DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpge',1.,'auction_banner');

        

    $('#form_submit').validate({

    rules: {

    'title': {

    required: true

    },

    'description': {

    required: true

    },

    }

    });



    $(document).ready(function(){

        var start_date="{{(isset($data['results']->start_date) ? $data['results']->start_date : '')}}";

        var end_date="{{(isset($data['results']->end_date) ? $data['results']->end_date : '')}}";

      $('input[name=start_date]').val(start_date);

      $('input[name=end_date]').val(end_date);

     $(document).on("change",'select[name=location]',function(){

     // alert('tes');

     var id=$(this).val(); 

      $.ajax({

                type: "get",

                url: "{{url(app()->getLocale().'/admin/getstates') }}/"+id,

                success: function(data) {

                  console.log(data);

                   $('#state').html('');

                  $('#state').append(data);

                }

            });    

       });

     

        setTimeout(function()
        { $('.state').trigger('change') }, 2000);

         $('select[data-option-id]').each(function () {

            $(this).val($(this).data('option-id'));

        });

     $(document).on("change",'select[name=state]',function(){

     // alert('tes');

     var id=$(this).val(); 

      $.ajax({

                type: "get",

                url: "{{url(app()->getLocale().'/admin/getcities') }}/"+id,

                success: function(data) {

                  console.log(data);

                   $('#city').html('');

                  $('#city').append(data);

                }

            });    

       });



    });




    </script>

    @endsection

