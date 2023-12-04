@extends('layout.header')

@section('css')





<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

@endsection

@section('breadcrumb')

    <h2 class="content-header-title float-left mb-0">@lang('make.makes')</h2>

    <div class="breadcrumb-wrapper">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/makes')}}">@lang('make.makes')</a>

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

                                           <form action="{{ url(app()->getLocale().'/admin/savemake') }}" class="" id="form_submit" method="post">

                                                    {{ csrf_field() }}

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label>

                                                                    @lang('make.name')

                                                                </label>

                                                                <input  class="form-control" name="name" type="text" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">

                                                                </input>

                                                            </div>

                                                        </div>

                                                    </div>

                                            <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

                                               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('make.save_change')</button>

                                               <a href="{{url(app()->getLocale().'/admin/makes')}}" class="btn btn-outline-secondary">@lang('make.back')</a>

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

    <script type="text/javascript">

        $('.usermgt').addClass('sidebar-group-active');

        $('.make').addClass('active');

        $('#form_submit').validate({

            rules: {

                'role_title': {

                    required: true

                },

            }

        });

    </script>

    @endsection

