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

<li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/view_seo')}}/">

   @lang('seo.seo')

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



<form action="{{ url(app()->getLocale().'/admin/saveseo') }}" class="" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-4 col-12">

              <div class="form-group">

                <label>@lang('seo.title')</label>

                <input  class="form-control" name="title" type="text" value="{{(isset($data['results']->title) ? $data['results']->title : '')}}">

                </div>

            </div>

            <div class="col-md-4 col-12">

              <div class="form-group">

                <label>@lang('seo.meta_decription')</label>

                <textarea cols="12" rows="5" class="form-control" name="meta_desc">{{(isset($data['results']->meta_desc) ? $data['results']->meta_desc : '')}}</textarea>

                </div>

            </div>

            <div class="col-md-4 col-12">

              <div class="form-group">

                <label>@lang('seo.keyword')</label>

                <textarea rows="5" cols="12" class="form-control" name="keywords">{{(isset($data['results']->keywords) ? $data['results']->keywords : '')}}</textarea>

                </div>

            </div>

            <div class="col-md-4 col-12">

              <div class="form-group">

                <label>@lang('seo.site_name')</label>

                <input  class="form-control" name="site_name" type="text" value="{{(isset($data['results']->site_name) ? $data['results']->site_name : '')}}">

                </div>

            </div>

            <div class="col-md-4 col-12">

              <div class="form-group">

                <label>@lang('seo.page')</label>

                <input  class="form-control" name="page" type="text" value="{{(isset($data['results']->page) ? $data['results']->page : '')}}">

                </div>

            </div>

        </div>

    <div class="row">

        <div class="col-md-4">

            <div class="form-group" >

                <label>

                  @lang('seo.seo_image')

                </label>

                <div  action="{{url('/admin/upload_file?url=-public-uploads-seo') }}" class="dropzone" id="dropzoneupload">

                    <div class="dz-message">@lang('seo.drop_file')</div>

                </div>

            </div>

            </div>

              <div class="col-md-4">

         <img class="img-fluid mt-3" src="{{isset($data['results']->image)?url('/').''. $data['results']->image:'' }}">  </div>



    </div>

   <input class="form-control" type="hidden" name="image" value="{{(isset($data['results']->image) ? $data['results']->image : '')}}">

  

   <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('seo.save_change')</button>

    <a class="btn btn-outline-secondary d-none" href="{{url(app()->getLocale().'/admin/view_seo')}}">@lang('seo.go_to_list')</a>




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

        DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpge',1.,'image');

        $(document).ready(function() {

        $('.seomgt').addClass('sidebar-group-active');

        $('.view_seo').addClass('active');


    });


    

    </script>

    @endsection

