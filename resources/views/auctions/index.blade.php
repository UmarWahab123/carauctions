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

                                    <h4 class="card-title">@lang('auction.auction')</h4>

                                    <a class="btn btn-primary" href="{{url(app()->getLocale().'/admin/auction')}}">@lang('auction.add_auction')</a>

                                </div>

                                <div class="card-datatable p-2">

                                    <table class="table dynamic_table table-resposive font-weight-bold">

                                        <thead>

                                            <tr role="row">

		                                        <th>@lang('auction.sr_no')</th>

		                                        <th> @lang('auction.title')</th>

		                                        <th> @lang('auction.banner')</th>

		                                        <th> @lang('auction.start_date')</th>

		                                        <th> @lang('auction.end_date')</th>

                                                <th> @lang('auction.status')</th>

		                                        <th> @lang('auction.action')</th>

                                   			</tr>

                                        </thead>

                                        <tbody>

                                           @foreach($data['results'] as $key=>$value)

                                         <tr>

                                        <td> {{$key+1}}</td>

                                        <td><a href="{{$value->title}}">{{$value->title}}</td>

                                        <td><img src="{{url($value->auction_banner)}}" class="img-fluid" width="100px"></td>

                                        <td>{{ $value->start_date}}</td>

                                        <td>{{ $value->end_date}}</td>

                                        <td>

                                            @if($value->status=="Active")

                                                <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>

                                            @elseif($value->status=="Inactive")

                                                <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-warning mr-1 pointer btnstatus">{{$value->status}}</span>

                                            @endif

                                        </td>

                                        <td>

                                            <div class="dropdown">

                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">

                                                    <i data-feather="more-vertical"></i>

                                                </button>

                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/auctiondetail/'.$value->id)}}">

                                                        <i data-feather="file-text" class="mr-50"></i>

                                                        <span>@lang('auction.detail')</span>

                                                    </a>

                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/auction/'.$value->id)}}">

                                                        <i data-feather="edit-2" class="mr-50"></i>

                                                        <span>@lang('auction.edit')</span>

                                                    </a>

                                                    <a data-href="{{url(app()->getLocale().'/admin/deleteauction/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">

                                                        <i data-feather="trash" class="mr-50"></i>

                                                        <span>@lang('auction.delete')</span>

                                                    </a>

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

 @include('includes.delete')



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

            $('.auctmgt').addClass('sidebar-group-active');

            $('.view_auction').addClass('active');

            $(document).on('click','.btnstatus',function () {

                var id=$(this).attr('data-id');

                var status=$(this).attr('data-status');

                var formdata={'id':id,'status':status};

                var token = $('input[name=_token]').val();

                var current=$(this);

                Swal.fire({

                    title: 'Are you sure?',

                    text: "You want to update the user status?",

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

                            url: '{{url(app()->getLocale().'/admin/userstatus')}}',

                            success: function(response){

                                current.attr('data-status',status);

                                if(response.status==1){

                                    if(status=='Active'){

                                        current.attr('data-status','Inactive');

                                        current.removeClass('badge-light-warning');

                                        current.addClass('badge-light-primary');

                                    }else{

                                        current.attr('data-status','Active');

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

