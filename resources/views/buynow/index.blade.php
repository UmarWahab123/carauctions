@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">



<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

<style>

    .table-responsive {

    display: table;

}



</style>

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

                                    <table class="table dynamic_table table-responsive font-weight-bold">

                                        <thead>

                                             <tr role="row">

		                                        <th>@lang('bids.sr_no')</th>

		                                        <th>@lang('bids.lot_number')</th>

		                                        <th>@lang('bids.user_name')</th>

                                                <th>@lang('bids.buy_now_amount')</th>

                                                <th>@lang('bids.status')</th>

		                                        <th>@lang('bids.action')</th>

                                   			 </tr>

                                        </thead>

                                        <tbody>

                                           @foreach($data['results'] as $key=>$value)

                                   		 <tr>

                                        <td> {{$key+1}}</td>

                                        <td>{{isset($value->lotname->lot_no)?$value->lotname->lot_no:''}}</td>

                                        <td>{{isset($value->user->name) ? $value->user->name : ''}}</td>

                                        <td>{{$value->buy_amount}}</td>



                                             <td>

                                                 @if($value->status=="Cancelled")

                                                 <span class="badge badge-pill badge-light-danger mr-1 pointer ">{{$value->status}}</span>

                                                 @elseif($value->status=="Pending")

                                                 <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'Declined' : 'Approved'}}" class="badge badge-pill badge-light-info mr-1 pointer btnstatus">{{$value->status}}</span>

                                                 @elseif($value->status=="Approved")

                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'Declined' : 'Approved'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>

                                                 @elseif($value->status=="Declined")

                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'Declined' : 'Approved'}}" class="badge badge-pill badge-light-warning mr-1 pointer btnstatus">{{$value->status}}</span>

                                                 @endif

                                             </td>

                                             <td>

                                            <div class="dropdown">

                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">

                                                    <i data-feather="more-vertical"></i>

                                                </button>

                                                <div class="dropdown-menu">

                                                    <a data-href="{{url(app()->getLocale().'/admin/approvebuynow/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-save" class="dropdown-item" href="javascript:void(0);">

                                                        <i data-feather="check" class="mr-50"></i>

                                                        <span>@lang('bids.approved_request')</span>

                                                    </a>

                                                     <a data-href="{{url(app()->getLocale().'/admin/rejectrequest/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-save" class="dropdown-item" href="javascript:void(0);">

                                                       <i data-feather='x'></i>

                                                        <span>@lang('bids.rejected_request')</span>

                                                    </a>

                                                    @if ($value->status=='Approved')

                                                     <a href="{{url('/admin/makeinvoice/'.$value->id)}}" class="dropdown-item d-none" >

                                                        <i data-feather="file-text" class="mr-50"></i>

                                                        <span>@lang('bids.make_invoice')</span>

                                                    </a>

                                                    @endif



                                                </div>

                                            </div>

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

            $('.dynamic_table').on( 'draw.dt', function () {
                feather.replace();
            });
            // $('.usermgt').addClass('sidebar-group-active');

            $('.buynow').addClass('active');

            $(document).on('click','.btnstatus',function () {

                var id=$(this).attr('data-id');

                var status=$(this).attr('data-status');

                var formdata={'id':id,'status':status};

                console.log(formdata);

               // exit();

                var token = $('input[name=_token]').val();

                var current=$(this);

                Swal.fire({

                    title: 'Are you sure?',

                    text: "You want to update the Bid status?",

                    icon: 'warning',

                    showCancelButton: true,

                    confirmButtonText: 'Yes, confirm it!',

                    customClass: {

                        confirmButton: 'btn btn-primary',

                        cancelButton: 'btn btn-outline-danger ml-1'

                    },

                    buttonsStyling: false

                }).then(function (result) {

                    if (result.value) {

                        $.ajax({

                            type:'POST',

                            headers: {'X-CSRF-TOKEN': token},

                            dataType:'json',

                            data:formdata,

                            url: '{{url(app()->getLocale().'/admin/buynowstatus')}}',

                            success: function(response){

                                current.attr('data-status',status);

                                if(response.status==1){

                                    if(status=='Approved'){

                                        current.attr('data-status','Declined');

                                        current.removeClass('badge-light-warning');

                                        current.addClass('badge-light-primary');

                                    }else{

                                        current.attr('data-status','Approved');

                                        current.removeClass('badge-light-primary');

                                        current.addClass('badge-light-warning');

                                    }

                                    current.html(status);

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'Updated!',

                                        text: 'User status has been updated.',

                                        customClass: {

                                            confirmButton: 'btn btn-success'

                                        }

                                    });

                                }

                            }

                        });

                    }

                });

            });

        });

    </script>

@endsection

