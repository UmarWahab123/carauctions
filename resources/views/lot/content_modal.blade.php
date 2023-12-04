@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

 <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

@endsection

<form action=""  id="form_submit1" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}



       <div class="row">

       <div class="col-md-12 col-12">

            <div class="form-group">

              <label>@lang('lot.title')</label>

            <input type="text" class="form-control "  name="title" value="{{(isset($data['results']->title) ? $data['results']->title : '')}}" />

            </div>

         </div>	

             <div class="col-md-12">

            <div class="form-group" >

                <label>

                   @lang('lot.upload_picture')

                </label>

                <div  action="{{url('admin/upload_file?url=-public-uploads-lot') }}" class="dropzone" id="dropzoneupload">

                    <div class="dz-message">@lang('lot.drop_file')</div>

                </div>

            </div>

        </div>

        <div class="col-lg-12">

          @if(isset($data['results']->images) && (strpos($data['results']->images,'cs') !== false))
        	<img class="img-fluid mt-3" src="{{$data['results']->images}}">

          @else
          <img class="img-fluid mt-3" src="{{isset($data['results']->images)?url('/').''. $data['results']->images:'' }}">
           @endif
            </div>

         
        </div>
        <br>

        <div class="col-md-4">

        	 <input class="form-control" name="images" type="hidden" value="{{(isset($data['results']->images) ? $data['results']->images : '')}}">

        <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

        <input class="form-control" name="lot_id" type="hidden" value="{{(isset($data['lot_id']) ? $data['lot_id'] : '')}}">

       </div>	

       <div class="col-lg-12">

       	<button type="button" class="btn btn-primary save_photo">@lang('lot.save_photo')</button>

       </div>

   </div>



</form>





@section('js')

    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

     <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>

    <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

 

    <script type="text/javascript">

         

              $(document).ready(function () {

        

          });



          DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1,'images');

    </script>

@endsection