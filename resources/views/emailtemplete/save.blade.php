@extends('layout.header')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/app-calendar.css')}}">

      <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/calendars/fullcalendar.min.css')}}">


@endsection

@section('content')

@section('breadcrumb')

<h2 class="content-header-title float-left mb-0">

      @lang('email_template.email_template')
      </h2>

<div class="breadcrumb-wrapper">

<ol class="breadcrumb">

<li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/templete')}}/">

    Templetes

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



<form action="{{ url(app()->getLocale().'/admin/savetemplete') }}" id="form_submit" class="" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-6 col-12">
               <div class="form-group">
                <label>@lang('email_template.lang_code')</label>
                <select name="langcode" class="form-control" data-option-id="{{(isset($data['results']->langcode) ? $data['results']->langcode : '')}}">
                  <option value="">Select</option>
                  <option>EN</option>
                  <option>RU</option>
                  <option>UK</option>
                </select>
              </div>

            </div>

             <div class="col-md-6 col-12">

              <div class="form-group">

                <label>@lang('email_template.title')</label>

                <input  class="form-control" name="title" type="text" value="{{(isset($data['results']->title) ? $data['results']->title : '')}}">

                </div>

            </div>
         </div>
              <div class="row">
                  <div class="col-md-12 col-12">
                     <div class="form-group" id="full-container">
                        <label for="exampleFormControlTextarea1">@lang('email_template.content')</label>
                        <div id="full-container">
                           <div class="editor">
                              <?=(isset($data['results']->content) ?json_decode($data['results']->content) : '')?>
                           </div>
                        </div>
                        <textarea class="form-control d-none" name="content">{{(isset($data['results']->content) ? $data['results']->content : '')}}</textarea>
                     </div>
                  </div>
               </div>

   <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 savepage">@lang('email_template.save_change')</button>

    <a class="btn btn-outline-secondary" href="{{url(app()->getLocale().'/admin/templete')}}">@lang('email_template.back')</a>




</form>



</div>

</div>



</section>

</div>

@endsection



    @section('js')
     <script src="{{asset('/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
     <script src="{{asset('/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/form-quill-editor.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>


        <script src="{{asset('/app-assets/vendors/js/calendar/fullcalendar.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/extensions/moment.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

        <script src="{{asset('/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

        <script src="{{asset('/app-assets/js/scripts/pages/app-calendar-events.js')}}"></script>

       <script src="{{asset('/app-assets/js/scripts/pages/app-calendar.js')}}"></script>


    <script type="text/javascript">


        $(document).ready(function() {

        $('.seomgt').addClass('sidebar-group-active');

        $('.view_temp').addClass('active');


$(document).on('click','.savepage',function(e) {
            e.preventDefault();
            $('textarea[name=content]').val($('.ql-editor').html());
            $('#form_submit').submit();
        });

    });


    

    </script>

    @endsection

