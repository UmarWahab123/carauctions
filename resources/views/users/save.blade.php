@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
@endsection
@section('breadcrumb')
 <form action="{{ url(app()->getLocale().'/admin/saveuser') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}
    <h2 class="content-header-title float-left mb-0">@lang('users.user_managment')</h2>

    <div class="breadcrumb-wrapper">         

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/home')}}">@lang('users.users')</a>
            </li>
            <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
            </li>
        </ol>

    </div>
@endsection
@section('content')
        @if(Session::has('email_error'))
           <div class="alert alert-danger p-2" >
                  {{ Session::get('email_error') }}
                   @php
                        Session::forget('email_error');
                  @endphp
            </div>

         @endif
        <div class="row mb-2">
            <div class="col-md-8">
        <ul class="nav nav-pills mt-2 mb-xl-n50" role="tablist">
            <li class="nav-item">
                <a class="nav-link show active" id="account-pill-general" data-toggle="pill" href="#home" aria-expanded="true">
                <span class="font-weight-bold">@lang('users.account_info')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="account-pill-general" data-toggle="pill" href="#social" aria-expanded="true">
                <span class="font-weight-bold">@lang('users.address')</span>
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" id="account-pill-general" data-toggle="pill" href="#settings" aria-expanded="true">
                <span class="font-weight-bold">@lang('users.settings')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="account-pill-general" data-toggle="pill" href="#document" aria-expanded="true">
                <span class="font-weight-bold">@lang('users.document')</span>
                </a>
            </li>
        </ul>
      </div>

      <div class="col-md-12 mt-2 text-right">
        
        @if($data['page_title']=="Update User")
          <a href="{{url(app()->getLocale().'/admin/userprofile/'.(isset($data['results']->id) ? $data['results']->id : ''))}}" class="btn btn-primary ">@lang('users.user_detail')</a>
               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('users.save_change')</button>
        <a href="{{url(app()->getLocale().'/admin/users')}}" class="btn btn-outline-secondary">@lang('users.back')</a>
        @else
        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('users.save_change')</button>
        <a href="{{url(app()->getLocale().'/admin/users')}}" class="btn btn-outline-secondary">@lang('users.back')</a>
        @endif
      
      
       
      </div>

    </div>

<div class="content-body">
    <section id="basic-input">
        <div class="card">
<div class="card-body">
    <div class="col-md-12">
       
    <div class="tab-content">
      <div id="home" class="tab-pane fade active in show">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.role')</label>
                        <select name="role_id" class="form-control" data-option-id="{{(isset($data['results']->role_id) ? $data['results']->role_id : '')}}">
                            <option value="">Select</option>
                            @foreach($data['roles'] as $key=>$value)
                            <option value="{{$value->id}}">{{$value->role_title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.first_name')</label>
                        <input type="text" name="first_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->first_name) ? $data['results']->first_name : '')}}">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.last_name')</label>
                        <input type="text" name="last_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->id) ? $data['results']->last_name : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.email')</label>
                        <input type="text" name="email" class="form-control m-input m-input--square" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}">
                    </div>
                </div>
                </div>
            <div class="row">
               <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.phone_number')</label>
                        <input type="text" name="phone" class="form-control m-input m-input--square" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.phone_number_optional')</label>
                        <input type="text" name="phone2" class="form-control m-input m-input--square" value="{{(isset($data['results']->phone2) ? $data['results']->phone2 : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.status')</label>
                        <select name="status" class="form-control" data-option-id="{{(isset($data['results']->status) ? $data['results']->status : '')}}">
                            <option value="">Select</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                </div>
                </div>
           
             <div class="row">
            <div class="col-md-4">
            <div class="form-group" >
                <label>
                    @lang('users.upload_picture')
                </label>
                <div  action="{{url('/admin/upload_file?url=-public-uploads-users-dp') }}" class="dropzone" id="dropzoneupload">
                    <div class="dz-message">@lang('users.drop_file').</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
         <img class="img-fluid mt-3" src="{{isset($data['results']->dp)?url('/').''. $data['results']->dp:'' }}">  </div>
        <input class="form-control" name="dp" type="hidden" value="{{(isset($data['results']->dp) ? $data['results']->dp : '')}}">
        <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
       </div>
     </div>
      <div id="social" class="tab-pane fade">
      <div class="row">
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.address')</label>
                        <input type="text" name="address" class="form-control m-input m-input--square" value="{{(isset($data['results']->address) ? $data['results']->address : '')}}">
                    </div>
                </div>
               
                 <div class="col-md-3">
                     <div class="form-group m-form__group">
                        <label>@lang('users.country')</label>
                        <select name="country" class="form-control location" id="location" data-option-id="{{isset($data['results']->country)?$data['results']->country:''}}">
                            <option value="">Select</option>
                            @foreach ($data['countries'] as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
               
                 <div class="col-md-3">
                     <div class="form-group m-form__group">
                        <label>@lang('users.region')</label>
                        <select  name="region" class="form-control state" id="state" data-option-id="{{isset($data['results']->region)?$data['results']->region:''}}">
                            <option value="">Select</option>

                            @if (isset($data['results']->state))

                            @foreach ($data['state'] as $state)

                            <option value="{{$state->id}}" {{$data['results']->region==$state->id?'Selected':''}}>{{$state->name}}</option>

                            @endforeach

                               @endif
                        </select>
                       
                    </div>
                </div>
                <div class="col-md-3 col-12">

                <div class="form-group">

                    <label>@lang('auction.city')</label>

                    <select class="form-control city" name="city" id="city" data-option-id="{{(isset($data['results']->city) ? $data['results']->city : '')}}">

                        <option value="">Select</option>

                        @if (isset($data['results']->city))

                        @foreach ($data['city'] as $city)

                        <option value="{{$city->id}}" {{$data['results']->city==$city->id?'Selected':''}}>{{$city->name}}</option>

                        @endforeach

                        @endif



                    </select>

                </div>

            </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.index')</label>
                        <input type="text" name="index" class="form-control m-input m-input--square" value="{{(isset($data['results']->index) ? $data['results']->index : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.town')</label>
                        <input type="text" name="town" class="form-control m-input m-input--square" value="{{(isset($data['results']->town) ? $data['results']->town : '')}}">
                    </div>
                </div>
        </div> 
        <div class="row mt-2">
            <div class="col-md-12">
                <h3>@lang('users.delivery_address_optional')</h3>
            </div>
        </div>
        <div class="row mt-2">
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.address')</label>
                        <input type="text" name="delivery_address" class="form-control m-input m-input--square" value="{{(isset($data['results']->delivery_address) ? $data['results']->delivery_address : '')}}">
                    </div>
                </div>
               
                <div class="col-md-3">
                     <div class="form-group m-form__group">
                        <label>@lang('users.country')</label>
                
                        <select name="delivery_country" class="form-control delivery_country" data-option-id="{{isset($data['results']->delivery_country)?$data['results']->delivery_country:''}}">
                            <option value="">Select</option>
                            @foreach ($data['countries'] as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                       
                        

                    </div>
                </div>
               
                 <div class="col-md-3">
                     <div class="form-group m-form__group">
                        <label>@lang('users.region')</label>
                        <select  name="delivery_region" class="form-control deliverstate" id="deliverstate" data-option-id="{{isset($data['results']->delivery_region)?$data['results']->delivery_region:''}}">
                            <option value="">Select</option>

                            @if (isset($data['results']->state))

                            @foreach ($data['deliverstate'] as $state)

                            <option value="{{$state->id}}">{{$state->name}}</option>

                            @endforeach

                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-12">

                <div class="form-group">

                    <label>@lang('auction.city')</label>

                    <select class="form-control deliver_city" name="deliver_city" id="delivercity" data-option-id="{{(isset($data['results']->deliver_city) ? $data['results']->deliver_city : '')}}">

                        <option value="">Select</option>

                        @if (isset($data['results']->city))

                        @foreach ($data['delivercity'] as $city)

                        <option value="{{$city->id}}">{{$city->name}}</option>

                        @endforeach

                        @endif



                    </select>

                </div>

            </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.index')</label>
                        <input type="text" name="delivery_index" class="form-control m-input m-input--square" value="{{(isset($data['results']->delivery_index) ? $data['results']->delivery_index : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.town')</label>
                        <input type="text" name="delivery_town" class="form-control m-input m-input--square" value="{{(isset($data['results']->delivery_town) ? $data['results']->delivery_town : '')}}">
                    </div>
                </div>
        </div>   
      </div> 
      <div id="settings" class="tab-pane fade">
         <div class="row">
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.password')</label>
                        <input type="password" placeholder="{{(isset($data['results']->id) ? 'Type in to update password' : '')}}" name="password" class="form-control password m-input m-input--square password" value="" i>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.confirm_password')</label>
                        <input type="password" name="cpassword" class="form-control cpassword password m-input m-input--square confirm_password" value="">
                    </div>
                </div>
            </div>
             <span id='message'></span>
      </div>
      <div id="document" class="tab-pane fade">
        <div class="row">
              <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.document_type')</label>
                         <select class="form-control"  name="document_type" data-placeholder="Тип документа" data-option-id="{{isset($data['results']->document_type)?$data['results']->document_type:''}}">
                           <option data-placeholder="true"></option>
                           <option >Identity document</option>
                           <option >The passport</option>
                           <option >Driver's license</option>
                           <option >Other</option>
                        </select>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>@lang('users.document_status')</label>
                        <select name="document_status" class="form-control" data-option-id="{{(isset($data['results']->document_status) ? $data['results']->document_status : '')}}">
                            <option value="">Select</option>
                            <option>Pending</option>
                            <option>Approved</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-form__group">
                        <label>@lang('users.admin_remarks')</label>
                        <textarea name="admin_remarks" class="form-control">
                         {{(isset($data['results']->admin_remarks) ? $data['results']->admin_remarks : '')}}
                        </textarea>
                    </div>
                </div>
        </div>
          <div class="row">

            <div class="col-md-4">
            <div class="form-group" >
                <label>
                    @lang('users.upload_document')
                </label>
                <div  action="{{url('admin/upload_file?url=-public-uploads-document') }}" class="dropzone" id="documentupload">
                    <div class="dz-message">@lang('users.drop_file')</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-12">
            @if(!empty($data['results']->document))
              <a href="{{url(isset($data['results']->document)?$data['results']->document:'')}}">@lang('users.view'){{isset($data['results']->document_type)?$data['results']->document_type:''}} 
                
              @lang('users.document') 
            </a>
            @endif
           </div>
           <div class="col-md-12 mt-4">
                @if(!empty($data['results']->document_status))
                <h5><b>@lang('users.document_status'):</b>
                    @if(isset($data['results']->document_status)=="Pending")
                    <span style="color: red;">{{isset($data['results']->document_status)?$data['results']->document_status:''}}</span></h5>
                    @else
                     <span style="color: green;">{{isset($data['results']->document_status)?$data['results']->document_status:''}}</span></h5>
                    @endif
                @else
                <p>Not Uploaded yet</p>
                @endif
           </div>
        <input class="form-control" name="document" type="hidden" value="{{(isset($data['results']->document) ? $data['results']->document : '')}}">
      
      </div>  
            </div>
            </input>
            </input>
        </form>
    </div>
    </div>
    </div>
</section>
</div>
@endsection

@section('js')
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
     <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
 
    <script type="text/javascript">
        $('.usermgt').addClass('sidebar-group-active');
        $('.users').addClass('active');
        $('#form_submit').validate({
            rules: {
                'role_id': {
                    required: true
                },
                'first_name': {
                    required: true
                },
                'last_name': {
                    required: true
                },
                'email': {
                    required: true,
                    email: true
                },

                'cpassword': {
                    equalTo: '.password'
                },
                'status': {
                    required: true
                },
            }
        });
          DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1,'dp');
          DropzoneSinglefunc('documentupload','.pdf,.doc,.docx',1,'document');

   $(document).ready(function(){

    
    $(document).on("change",'select[name=country]',function(){


     var id=$(this).val(); 

     // alert(id);

      $.ajax({

                type: "get",

                url: "{{url(app()->getLocale().'/admin/get_states') }}/"+id,

                success: function(data) {

                  console.log(data);

                   $('#state').html('');

                   $('#state').append(data);

                    @if(isset($data['results']->id))

                    $('select[data-option-id]').each(function () {

                        $(this).val($(this).data('option-id'));

                    });

                    @endif

                }

            });    

       });

        @if(isset($data['results']->id))

            setTimeout(function()
            { $('.location').trigger('change') }, 1000);

            setTimeout(function()
            { $('.state').trigger('change') }, 2000);
        @endif
        

    @if(isset($data['results']->id))
    $('select[data-option-id]').each(function () {

            $(this).val($(this).data('option-id'));

        });

    @endif



     $(document).on("change",'select[name=region]',function(){

    

     var id=$(this).val(); 

      $.ajax({

                type: "get",

                url: "{{url(app()->getLocale().'/admin/get_cities') }}/"+id,

                success: function(data) {

                  // console.log(data);

                   $('#city').html('');

                  $('#city').append(data);

                   @if(isset($data['results']->id))
                  $('select[data-option-id]').each(function () {

                        $(this).val($(this).data('option-id'));

                    });

                  @endif

                }

            });    

       });

 $(document).on('keyup','.confirm_password',function(){

            // console.log($('.confirm_password'));

            if ($('.password').val() == $('.confirm_password').val()) {

        $('#message').html('Password Matching').css('color', 'green');

              } else {

          $('#message').html('Password Not Matching').css('color', 'red');

        }

          });  

    $(document).on("change",'select[name=delivery_country]',function(){


     var id=$(this).val(); 


      $.ajax({

                type: "get",

                url: "{{url(app()->getLocale().'/admin/get_deliverstates') }}/"+id,

                success: function(data) {

                  console.log(data);

                   $('#deliverstate').html('');

                   $('#deliverstate').append(data);
                   @if(isset($data['results']->id))

                    $('select[data-option-id]').each(function () {

                        $(this).val($(this).data('option-id'));

                    });

                    @endif
                
                }

            });    

       });

    @if(isset($data['results']->id))

            setTimeout(function()
            { $('.delivery_country').trigger('change') }, 1000);

            setTimeout(function()
            { $('.deliverstate').trigger('change') }, 3000);
        @endif
        

    @if(isset($data['results']->id))
    $('select[data-option-id]').each(function () {

            $(this).val($(this).data('option-id'));

        });

    @endif
     
      $(document).on("change",'select[name=delivery_region]',function(){

    

     var id=$(this).val(); 

      $.ajax({

                type: "get",

                url: "{{url(app()->getLocale().'/admin/get_delivercities') }}/"+id,

                success: function(data) {

                  // console.log(data);

                   $('#delivercity').html('');

                  $('#delivercity').append(data);
                   @if(isset($data['results']->id))
                  $('select[data-option-id]').each(function () {

                        $(this).val($(this).data('option-id'));

                    });

                  @endif
                 

                }

            });    

       });
});
    </script>
@endsection

