@extends('layout.header')

@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">

    

    <style>

    .td-padding-50-0 tr td {padding-top: 25px !important;padding-bottom: 25px !important;}

    table.new-shadow tr:hover {background: none;}

</style>

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

@endsection

@section('content')

    {{ csrf_field() }}

    <section id="multilingual-datatable">

            <div class="card">

                        <h2 class="text-uppercase mt-5 text-center  green-color text-uppercase font-weight-bold"><b><i class="fa fa-gamepad pr-2"></i>Lot Detail</b></h2>

                        {{-- Lot Detail --}}

                               @include('lot.detail.lotdetail')

                        <h2 class="text-uppercase mt-5 text-center  green-color text-uppercase font-weight-bold"><b>Bids</b></h2>

                        <div class="row lesson-div p-2">

                            {{-- Bids Table --}}

                              @include('lot.detail.bidsdetail')

                        </div>

            </div>

    </section>

 @include('includes.delete')

 @include('includes.save_lg_modal')

@endsection



@section('js')

    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

    <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>

    <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

    <script src="{{asset('/app-assets/js/scripts/forms/form-select2.js')}}"></script>

    <script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>





    <script type="text/javascript">

        $(document).ready(function() {

              $('.dynamic_table').DataTable();

            $('.tariningR').addClass('sidebar-group-active');

           

        });

    </script>

@endsection

