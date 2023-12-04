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

                                    <h4 class="card-title">All Notifications</h4>

                                </div>

                                <div class="card-datatable p-2">

                                    <table class="table dynamic_table  font-weight-bold">

                                        <thead>

                                             <tr role="row">

		                                        <th>Sr No</th>

		                                        <th> Lot Number</th>

		                                        <th> Auction</th>

		                                        <th> User Name</th>

		                                        <th> Minimun Price</th>

                                                <th> Bid Amount</th>

                                                <th> Status</th>

		                                        <th> Action</th>

                                   			 </tr>

                                        </thead>

                                        <tbody>

                                           @foreach(get_notification() as $key=>$value)

                                   		 <tr>

                                        <td> {{$key+1}}</td>

                                        <td>{{isset($value->lotname->lot_no)?$value->lotname->lot_no:''}}</td>

                                        <td>{{isset($value->auction->title)?$value->auction->title:''}}</td>

                                        <td>{{isset($value->user->name) ? $value->user->name : ''}}</td>

                                        <td>{{$value->min_price}}</td>

                                        <td>{{$value->bid_amount}}</td>



                                             <td>

                                                 @if($value->status=="Approved")

                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'UnApproved' : 'Approved'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>

                                                 @elseif($value->status=="UnApproved")

                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'UnApproved' : 'Approved'}}" class="badge badge-pill badge-light-warning mr-1 pointer btnstatus">{{$value->status}}</span>

                                                 @endif

                                             </td>

                                             <td>

                                            <div class="dropdown">

                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">

                                                    <i data-feather="more-vertical"></i>

                                                </button>

                                                <div class="dropdown-menu">

                                                    <a data-href="{{url('admin/approvebid/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-save" class="dropdown-item" href="javascript:void(0);">

                                                        <i data-feather="check" class="mr-50"></i>

                                                        <span>Approved Bid</span>

                                                    </a>

                                                    @if ($value->status=='Approved')

                                                     <a class="d-none" href="{{url("/admin/makeinvoice/".$value->id)}}" class="dropdown-item" >

                                                        <i data-feather="file-text" class="mr-50"></i>

                                                        <span>Make invoce</span>

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

            // $('.usermgt').addClass('sidebar-group-active');

            $('.bids').addClass('active');

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

                            url: '{{url('admin/bidstatus')}}',

                            success: function(response){

                                current.attr('data-status',status);

                                if(response.status==1){

                                    if(status=='Approved'){

                                        current.attr('data-status','UnApproved');

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

