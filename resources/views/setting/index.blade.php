@extends('layout.header')
@section('content')
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">@lang('setting.setting')</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/settings')}}">@lang('setting.setting')</a>
        </li>
        <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
        </li>
    </ol>
</div>
@endsection
<div class="content-body">
    <section id="basic-input">
        <div class="card">
            <div class="card-body">
             <form action="{{ url(app()->getLocale().'/admin/saveportalsettings') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="media mb-2">
                                <img src="{{(isset($data['results']->logo) ? 
                                asset('/').''.$data['results']->logo : 'https://www.zonergy.com.pk/wp-content/themes/consultix/images/no-image-found-360x250.png')}}" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer img-fluid" />
                                <div class="media-body mt-50">
                                    <div class="col-12 d-flex mt-1 px-0">
                                        <button class="btn btn-outline-secondary d-block d-sm-none">
                                            <i class="mr-0" data-feather="trash-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label class="btn btn-outline-primary waves-effect mr-75 mb-5" for="change-picture">
                            <span class="d-none d-sm-block">@lang('setting.upload_photo')</span>
                            <input class="form-control" type="file" id="change-picture" hidden accept="image/png, image/jpeg, image/jpg" name="logo" />
                            <span class="d-block d-sm-none">
                                <i class="mr-0" data-feather="edit"></i>
                            </span>
                        </label>
                    </div>
                    <div class="col-md-4 ml-1">
                        <div class="form-group">
                            <label>
                              @lang('setting.name')
                          </label>
                          <input  class="form-control" name="name" type="text" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                      </div>
                      <div class="form-group">
                        <label>
                           @lang('setting.phone_no')
                       </label>
                       <input  class="form-control" name="phone" type="text" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}">
                       
                     </div>
                     <div class="form-group">
                        <label>
                            @lang('setting.bank_name')
                       </label>
                       <input  class="form-control" name="bank_name" type="text" value="{{(isset($data['results']->bank_name) ? $data['results']->bank_name : '')}}">
                       
                     </div> 
                     <div class="form-group">
                        <label>
                           @lang('setting.swift')
                       </label>
                       <input  class="form-control" name="swift" type="text" value="{{(isset($data['results']->swift) ? $data['results']->swift : '')}}">
                       
                     </div> 
                     <div class="form-group">
                        <label>
                            @lang('setting.account_no')
                       </label>
                       <input  class="form-control" name="account_no" type="text" value="{{(isset($data['results']->account_no) ? $data['results']->account_no : '')}}">
                       
                     </div>
                     <div class="form-group">
                        <label>
                          @lang('setting.beneficary_address')
                       </label>
                       <input  class="form-control" name="beneficiary_address" type="text" value="{{(isset($data['results']->beneficiary_address) ? $data['results']->beneficiary_address : '')}}">
                       
                     </div>

           </div>
           <div class="col-md-4">
            <div class="form-group">
                <label>
                   @lang('setting.email')
               </label>
               <input  class="form-control" name="email" type="text" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}">
           </div>
           <div class="form-group">
            <label>
               @lang('setting.address')
            </label>
            <input  class="form-control" name="address" type="text" value="{{(isset($data['results']->address) ? $data['results']->address : '')}}">
        </div> 
        <div class="form-group">
            <label>
               @lang('setting.bank_address')
            </label>
            <input  class="form-control" name="bank_address" type="text" value="{{(isset($data['results']->bank_address) ? $data['results']->bank_address : '')}}">
        </div> 
        <div class="form-group">
            <label>
              @lang('setting.routing_no')
            </label>
            <input  class="form-control" name="routing_no" type="text" value="{{(isset($data['results']->routing_no) ? $data['results']->routing_no : '')}}">
        </div>  
        <div class="form-group">
            <label>
                @lang('setting.beneficary_name')
            </label>
            <input  class="form-control" name="beneficiary_name" type="text" value="{{(isset($data['results']->beneficiary_name) ? $data['results']->beneficiary_name : '')}}">
        </div>
    </div>

</div>
<input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
<button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('setting.save_change')</button>

</input>
</input>
</form>
</div>
</div>


</section>
</div>
@endsection


@section('js')

    <script src="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.usermgt').addClass('sidebar-group-active');
        $('.settings').addClass('active');

    });
</script>
@endsection
