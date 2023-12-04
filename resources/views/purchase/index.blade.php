@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">



<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">



@endsection

@section('content')

    {{ csrf_field() }}

    <section id="basic-datatable">

                    <div class="row">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header border-bottom">

                                    <h4 class="card-title">@lang('bids.bids')</h4>

                                </div>

                                <div class="card-datatable p-2">

                                    <table class="table dynamic_table font-weight-bold">

                                        <thead>

                                             <tr role="row">

                                                <th>@lang('bids.sr_no')</th>

                                                <th>@lang('bids.lot_number')</th>

                                                <th>@lang('bids.auction')</th>

                                                <th>@lang('bids.user_name')</th>

                                                <th>@lang('bids.minimum_price')</th>

                                                <th>@lang('bids.bid_amount')</th>

                                                <th>@lang('bids.status')</th>

                                             </tr>

                                        </thead>

                                        <tbody>

                                           @foreach($data['results'] as $key=>$value)

                                         <tr>

                                        <td> {{$key+1}}</td>

                                        <td>{{isset($value->lotname->lot_no)?$value->lotname->lot_no:''}}</td>

                                        <td>{{isset($value->auction->title)?$value->auction->title:''}}</td>

                                        <td>{{isset($value->user->name) ? $value->user->name : ''}}</td>

                                        <td>{{$value->min_price}}</td>

                                        <td>{{$value->bid_amount}}</td>

                                        <td>

                                        <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'UnApproved' : 'Approved'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>

                                                

                                        </td>

                                            

                                    </tr>

                                    @endforeach



                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>

 @include('includes.save')



@endsection





@section('js')

<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>



<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}">



    <script type="text/javascript">

        $(document).ready(function() {

            $('.dynamic_table').DataTable();

            // $('.usermgt').addClass('sidebar-group-active');

            $('.phistory').addClass('active');

           

        });

    </script>

@endsection

