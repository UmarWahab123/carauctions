@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/quill.bubble.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-quill-editor.css')}}">

@endsection
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Ennegramm</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/personalities')}}">Personalities</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Add Personality</a>
            </li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="content-body">
    <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-8 col-md-6 col-12 mb-1">
                                           <form action="{{ url('admin/savepersonality') }}" class="" id="form_submit" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>
                                                                   Personality Type
                                                                </label>
                                                                <input  class="form-control" name="name" type="text" value="{{(isset($data['results']->id) ? $data['results']->name : '')}}">
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-8 col-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Short Description</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="short_description">{{(isset($data['results']->short_description) ? $data['results']->short_description : '')}}</textarea>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group" id="full-container">
                                                                <label for="exampleFormControlTextarea1">Long Description</label>
                                                                <div id="full-container">
                                                                    <div class="editor">
                                                                        <?=(isset($data['results']->long_description) ? $data['results']->long_description : '')?>
                                                                    </div>
                                                                </div>
                                                                <textarea class="form-control d-none" name="long_description">{{(isset($data['results']->long_description) ? $data['results']->long_description : '')}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Famous Personality</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Famous Personality" name="famous_personality">{{(isset($data['results']->famous_personality) ? $data['results']->famous_personality : '')}}</textarea>
                                                        </div>
                                                        </div>
                                                    </div>

                                            <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                                               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 savepage">Save Changes</button>
                                               <a href="{{url('admin/personalities')}}" class="btn btn-outline-secondary">Back</a>
                                            </input>
                                            </input>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 </section>
</div>
@endsection
@section('js')
  <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
     <script src="{{asset('/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/form-quill-editor.js')}}"></script>
    <script type="text/javascript">
        $('.enneagram').addClass('sidebar-group-active');
        $('.personalities').addClass('active');
          $(document).on('click','.savepage',function(e) {
            e.preventDefault();
            $('textarea[name=long_description]').val($('.ql-editor').html());
            $('#form_submit').submit();
        });
        $('#form_submit').validate({
            rules: {
                'name': {
                    required: true
                },
            }
        });
    </script>
    @endsection
