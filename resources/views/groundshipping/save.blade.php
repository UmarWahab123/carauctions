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

    <h2 class="content-header-title float-left mb-0">@lang('ground_shipping.ground_shipping')</h2>

    <div class="breadcrumb-wrapper">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/view_shippment')}}">@lang('ground_shipping.ground_shipping')</a>

            </li>

            <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>

            </li>

        </ol>

    </div>

@endsection

@section('content')

    <div class="content-body">

        <section id="basic-input">

            <div class="card">

                <div class="card-body">

                    <form action="{{url(app()->getLocale().'/admin/savegroundshipping')}}" class="" id="form_submit" method="post">

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ground_shipping.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ground_shipping.fee')</label>
                                    <input type="text" name="fee" class="form-control" value="{{(isset($data['results']->fee) ? $data['results']->fee : '')}}">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" class="form-control" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">@lang('ground_shipping.save')</button>
                                </div>
                            </div>
                        </div>
                    </form>

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


        $(document).ready(function() {

            $('.groundshipmgt').addClass('sidebar-group-active');

            $('.ground_shipping').addClass('active');

            $('select[data-option-id]').each(function () {

                $(this).val($(this).data('option-id'));

            });

         });

        

    </script>

    @endsection

