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

    <h2 class="content-header-title float-left mb-0">@lang('faq.faqs')</h2>

    <div class="breadcrumb-wrapper">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/Home')}}">@lang('faq.faqs')</a>

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

                                           <form action="{{ url(app()->getLocale().'/admin/savefaq') }}" class="" id="form_submit" method="post">

                                                    {{ csrf_field() }}

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                           <div class="form-group m-form__group">

                                                                <label>@lang('faq.type')</label>

                                                                <select name="type" class="form-control" data-option-id="{{(isset($data['results']->type) ? $data['results']->type : '')}}">

                                                                    <option value="">Select</option>

                                                                    <option>Registration</option>

                                                                    <option>Deposit</option>

                                                                    <option>Bidding</option>

                                                                    <option>Condition of the vehicle</option>

                                                                    <option>Paying for the vehicle</option>

                                                                    <option>Vehicle delivery</option>

                                                                    <option>Vehicle documents</option>

                                                                </select>

                                                            </div>

                                                        </div> 

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label>

                                                                    @lang('faq.faq_title')

                                                                </label>

                                                                <input  class="form-control" name="title" type="text" value="{{(isset($data['results']->title) ? $data['results']->title : '')}}">

                                                                </input>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                    <div class="col-md-12 col-12">

                                                        <div class="form-group" id="full-container">

                                                            <label for="exampleFormControlTextarea1">  @lang('faq.content')</label>

                                                            <div id="full-container">

                                                                <div class="editor">

                                                                    <?=(isset($data['results']->content) ? $data['results']->content : '')?>

                                                                </div>

                                                            </div>

                                                            <textarea class="form-control d-none" name="content">{{(isset($data['results']->description) ? $data['results']->description : '')}}</textarea>

                                                        </div>

                                                    </div>

                                                </div>

                                            <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

                                               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 savepage"> @lang('faq.save_change')</button>

                                               <a href="{{url(app()->getLocale().'/admin/faqs')}}" class="btn btn-outline-secondary"> @lang('faq.back')</a>

                                            </input>

                                            </input>

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

        $('.usermgt').addClass('sidebar-group-active');

        $('.faqs').addClass('active');

        $('#form_submit').validate({

            rules: {

                'role_title': {

                    required: true

                },

            }

        });

         $(document).on('click','.savepage',function(e) {

            e.preventDefault();

            $('textarea[name=content]').val($('.ql-editor').html());

            $('#form_submit').submit();

        });

    </script>

    @endsection

