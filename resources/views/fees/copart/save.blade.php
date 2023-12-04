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

    <h2 class="content-header-title float-left mb-0">@lang('copart.copart')</h2>

    <div class="breadcrumb-wrapper">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/coparts')}}">@lang('copart.copart')</a>

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

                    <form action="{{url(app()->getLocale().'/admin/savecopart')}}" class="" id="form_submit" method="post">

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-4">
                                 <div class="form-group">
                                    <label>@lang('copart.sub_type')</label>
                                    <select class="form-control main_cat" name="sub_type" data-option-id="{{(isset($data['results']->sub_type) ? $data['results']->sub_type : '')}}">
                                        <option value="">Select</option>
                                        <option value="BuyerFee">Buyer Fee</option>
                                        <option value="Virtualbed">Virtual Bed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('copart.sale_price')</label>
                                    <input type="text" name="sale_price_start" class="form-control" value="{{(isset($data['results']->sale_price_start) ? $data['results']->sale_price_start : '')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('copart.sale_price_end')</label>
                                    <input type="text" name="sale_price_end" class="form-control" value="{{(isset($data['results']->sale_price_end) ? $data['results']->sale_price_end : '')}}">
                                </div>
                            </div>
                            <div class="col-md-4 copart_standard">
                                <div class="form-group">
                                    <label>@lang('copart.standard_fee')</label>
                                    <input type="text" name="standard_fee" class="form-control" value="{{(isset($data['results']->standard_fee) ? $data['results']->standard_fee : '')}}">
                                </div>
                            </div>
                            <div class="col-md-4 copart_standard1">
                                <div class="form-group">
                                    <label>@lang('copart.pre_bid_fee')</label>
                                    <input type="text" name="prebid_proxy_fee" class="form-control" value="{{(isset($data['results']->prebid_proxy_fee) ? $data['results']->prebid_proxy_fee : '')}}">
                                </div>
                            </div>
                            <div class="col-md-4 copart_standard1">
                                <div class="form-group">
                                    <label>@lang('copart.live_fee')</label>
                                    <input type="text" name="live_fee" class="form-control" value="{{(isset($data['results']->live_fee) ? $data['results']->live_fee : '')}}">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="type" class="form-control" value="copart">
                        <input type="hidden" name="id" class="form-control" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">@lang('copart.save')</button>
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

        $('.copart_standard').addClass('d-none');
        $('.copart_standard1').addClass('d-none');

        $(document).ready(function() {

            $('.feemgt').addClass('sidebar-group-active');
            $('.copart').addClass('active');

            jQuery(document).on('change','.main_cat',function(){

                var token = $('input[name=_token]').val();
                var select =$('select[name=sub_type]').val();

                if(select=="BuyerFee")
                {
                    $('.copart_standard').removeClass('d-none');
                    $('.copart_standard1').addClass('d-none');

                }
                else if(select=="Virtualbed")
                {
                    $('.copart_standard1').removeClass('d-none');
                    $('.copart_standard').addClass('d-none');
                }

            });
            
            $('select[data-option-id]').each(function () {

                $(this).val($(this).data('option-id'));

            });

            setTimeout(function()


            { $('.main_cat').trigger('change') }, 1000);

         });

        

    </script>

    @endsection

