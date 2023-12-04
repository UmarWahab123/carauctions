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
              <label>@lang('dealer.title')</label>
            <input type="text" class="form-control "  name="title" value="{{(isset($data['results']->title) ? $data['results']->title : '')}}" />
            </div>
         </div>	
        <div class="col-md-12">
          <div class="form-group">
            <label>@lang('dealer.images')</label>
            <input type="file" name="images" class="form-control" value="{{(isset($data['results']->images) ? $data['results']->images : '')}}">

          </div>
        </div>
        
        <div class="col-md-4">
        	
        <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
        <input class="form-control" name="lot_id" type="hidden" value="{{(isset($data['lot_id']) ? $data['lot_id'] : '')}}">
       </div>	
       <div class="col-lg-12">
       	<button type="button" class="btn btn-primary save_photo" id="photo_save">@lang('dealer.save_photo')</button>
       </div>
   </div>

</form>


