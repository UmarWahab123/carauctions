@extends('layout.header')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
@endsection
@section('content')
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">@if($type=="certifiedcourses")
      Update  certified courses
      @else
       {{$data['page_title']}}
       @endif</h2>
<div class="breadcrumb-wrapper">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('admin/trainings')}}/{{$type}}">
  @if($type=="certifiedcourses")
   certified courses
    @else
    {{$type}} 
     @endif</a>
</li>

    <li class="breadcrumb-item"><a href="#">
      @if($type=="certifiedcourses")
      Update  certified courses
      @else
       {{$data['page_title']}}
       @endif
    </a>
</li>
</ol>
</div>
@endsection
<div class="content-body">
<section id="basic-input">
<div class="card">
<div class="card-body">

<form action="{{ url('admin/savetraining') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4 col-12">
            <div class="form-group">
                <label>Title </label>
                <input  class="form-control" name="title" type="text" value="{{(isset($data['results']->id) ? $data['results']->title : '')}}">
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <label>Share</label>
                    <select class="form-control" name="share" data-option-id="{{(isset($data['results']->id) ? $data['results']->share : '')}}">
                        <option value="">Select</option>
                        <option>ON</option>
                        <option>OFF</option>
                    </select>
                </div>
            </div> <div class="col-md-2 col-12">
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" data-option-id="{{(isset($data['results']->id) ? $data['results']->status : '')}}">
                        <option value="">Select</option>
                        <option>Published</option>
                        <option>Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label>Access Control</label>
                    <select class="form-control" name="access_control" data-option-id="{{(isset($data['results']->id) ? $data['results']->access_control : '')}}">
                        <option value="">Select</option>
                        <option>All</option>
                        <option> Available to All Members</option>
                        <option> Exclusive to Premium Members</option>
                        <option>Monthly Only</option>
                        <option>Yearly Only</option>
                    </select>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-4 col-12">
            <div class="form-group m-form__group">
                        <label>Users</label>
                        <select name="user_id" class="form-control" data-option-id="{{(isset($data['results']->user_id) ? $data['results']->user_id : '')}}">
                            <option value="">Select</option>
                            @foreach($data['users'] as $key=>$value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label>Duration </label>
                    <select class="form-control" name="duration" data-option-id="{{(isset($data['results']->duration) ? $data['results']->duration : '')}}">
                        <option value="">Select</option>
                        <option>1 Week </option>
                        <option>2 Week</option>
                        <option>3 Week</option>
                        <option>1 Month</option>
                        <option>2 Months</option>
                        <option>3 Months</option>


                    </select>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label>Tags  </label>
                <select name="tags[]" class="tags form-control" multiple>
                    <optgroup label="LifeStyle">
                        <option>Love</option>
                        <option>World</option>
                        <option>Motivation</option>
                    </optgroup>
                    <optgroup label="Mindset">
                        <option>Journey</option>
                        <option>Resistance</option>
                        <option>Process</option>
                    </optgroup>
                    <optgroup label="Yoga">
                        <option>Stamina</option>
                        <option>Stronger</option>
                        <option>Resilience</option>
                    </optgroup>
                </select>
            </div>
              @if($type=='course')
                <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Benefits</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Benefits" name="benefits">{{(isset($data['results']->benefits) ? $data['results']->benefits : '')}}</textarea>
                        </div>
                </div>
                @endif
        </div>
        <div class="col-md-8 col-12">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description">{{(isset($data['results']->description) ? $data['results']->description : '')}}</textarea>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group" >
                <label>
                    Upload File
                </label>
                <div  action="{{url('admin/upload_file?url=-uploads-tutorials') }}" class="dropzone" id="dropzoneupload">
                    <div class="dz-message">Drop files here or click to upload.</div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
                @if(isset($data['results']->id))

                    @if($type=="video")
                        <video height="250px" class="w-100 video-style"  controls poster="https://newrich.com/wp-content/themes/betheme/images/newrich-logo.png">
                            <source  src="{{$data['results']->file_upload }}" type="video/mp4">
                        </video>
                    @else
                        <img class="img-fluid mt-3" src="{{$data['results']->file_upload }}">
                    @endif
                @endif
              
            </div>
            

    </div>
   <input class="form-control" type="hidden" name="file_upload" value="{{(isset($data['results']->id) ? $data['results']->file_upload : '')}}">
   <input class="form-control" name="type" type="hidden" value="{{$type}}">
   <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
    <a class="btn btn-outline-secondary" href="{{url('admin/trainings')}}/{{$type}}">Go To List</a>

@if(isset($data['results']->id ))
    <a class="btn btn-outline-secondary" href="{{url('admin/trainingdetail')}}/{{$data["results"]->id}}">Go To Detail</a>
        @endif
</form>

</div>
</div>

</section>
</div>
@endsection


    @section('js')
        <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
        <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
        <script src="{{asset('/app-assets/js/scripts/forms/form-select2.js')}}"></script>

    <script type="text/javascript">
        $('.tariningR').addClass('sidebar-group-active');
        var type='{{$type}}';
        $('.'+type).addClass('active');

        $('select[name="tags[]"] option').each(function() {
            var tagval=$(this).text();
            var tagsarray='<?=json_encode($tags); ?>';
            var tagsarray = JSON.parse(tagsarray); //
            const isInArray = tagsarray.includes(tagval);
            if(isInArray){
                console.log(tagsarray);
                $(this).attr('selected',true);
            }
        });

        tags();
        if(type=="video"){
            DropzoneSinglefunc('dropzoneupload','.avi,.mp4,.mkv',1,'file_upload');
        }else{
            DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpge',1.,'file_upload');
        }
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
    </script>
    @endsection
