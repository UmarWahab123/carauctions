@extends('../../layout.header')
@section('title',$data['page_title'])
@section('content')
        <!-- BEGIN: Subheader -->

        @section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{$data['page_title']}}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/maintest')}}">Main Test</a>
            </li>
            <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
            </li>
        </ol>
    </div>
@endsection
    <!-- END: Subheader -->

    <div class="m-content">

        <div class="m-portlet__body">
            <ul class="nav nav-pills" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active show" id="account-pill-general" data-toggle="pill" href="#logic" aria-expanded="true">
                    <i data-feather='save'></i>
                    <span class="font-weight-bold">Logic</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="account-pill-general" data-toggle="pill" href="#questions" aria-expanded="true">
                    <i data-feather='file-text'></i>
                    <span class="font-weight-bold">Questions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="account-pill-general" data-toggle="pill" href="#languages" aria-expanded="true">
                    <i data-feather='globe'></i>
                    <span class="font-weight-bold">Languages</span>
                    </a>
                </li>
            </ul>
            <div class="card">
            <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active show" id="logic" role="tabpanel">
                    @include('test.partials.logic')
                </div>
                <div class="tab-pane" id="questions" role="tabpanel">
                    @include('test.partials.questions')
                </div>
                <div class="tab-pane" id="languages" role="tabpanel">
                    @include('test.partials.languages')
                </div>
            </div>
            </div>
            </div>

        </div>
    </div>

    <div class="loader text-center hide">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>

@section('js')
  <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.enneagram').addClass('sidebar-group-active');
        $('.mtest').addClass('active');
        $('#exportreport').submit(function(e) {
        if ( $.fn.DataTable.isDataTable('.dynamic-table2') ) {
            $('.dynamic-table2').DataTable().destroy();
        }

        $('.dynamic-table2 tbody').empty();
        e.preventDefault();
        var token = $('input[name=_token]').val();
        var formdata=$(this).serialize();
        $('.export-div').addClass('hide');
        $('.loader').removeClass('hide');
        $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('admin/exporttest') }}",
                    dataType: "json",
                    data:formdata,
                    success:function(data)
                    {

                        $('.export-div').html(data.response);
                        $('.export-div').removeClass('hide');
                        $('.loader').addClass('hide');
                        jqDatatable2('dynamic-table2');
                    }
                });
    });

        $("#form-submit").validate( {
            rules: {
                email: {
                    required: !0
                }
            }
            , invalidHandler:function(e, r) {
                mUtil.scrollTo("m_form_2", -200), swal( {
                            title:"", text:"There are some errors in your submission. Please correct them.", type:"error", confirmButtonClass:"btn btn-secondary m-btn m-btn--wide", onClose:function(e) {
                            }
                        }
                ), e.preventDefault()
            }
            , submitHandler:function(e) {
                return true;
            }
        });
    });
</script>
@endsection

@endsection
