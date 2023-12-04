@extends('layout.header')

@section('css')





<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

@endsection

@section('breadcrumb')

    <h2 class="content-header-title float-left mb-0">@lang('model.models')</h2>

    <div class="breadcrumb-wrapper">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/models')}}">@lang('model.models')</a>

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

                                           <form action="{{ url(app()->getLocale().'/admin/savemodel') }}" class="" id="form_submit" method="post">

                                                    {{ csrf_field() }}

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label>

                                                                    @lang('model.name')

                                                                </label>

                                                                <input  class="form-control" name="name" type="text" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">

                                                                </input>

                                                            </div>

                                                        </div>

                                                         <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label>

                                                                    @lang('model.maker_name')

                                                                </label>

                                                               <select name="make_id" class="form-control" data-option-id="{{(isset($data['results']->make_id) ? $data['results']->make_id : '')}}">

                                                                <option value="">Select</option>

                                                                @foreach($data['make'] as $key=>$value)

                                                                <option value="{{$value->id}}">{{$value->name}}</option>

                                                                @endforeach

                                                            </select>

                                                            </div>

                                                        </div>

                                                    </div>

                                              <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

                                               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">@lang('model.save_change')</button>

                                               <a href="{{url(app()->getLocale().'/admin/models')}}" class="btn btn-outline-secondary">@lang('model.back')</a>

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

        $('.model').addClass('active');

        $('#form_submit').validate({

            rules: {

                'role_title': {

                    required: true

                },

            }

        });

    </script>

    @endsection

