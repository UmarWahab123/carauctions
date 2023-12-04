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

                                    <h4 class="card-title">{{$data['page_title']}}</h4>

                                    <a class="btn btn-primary" href="{{url(app()->getLocale().'/admin/lot')}}">@lang('lot.add_lot')</a>

                                </div>

                                <div class="card-datatable p-2">

                                    <table class="table dynamic_table table-responsive font-weight-bold table_resposive">

                                        <thead>

                                             <tr role="row">

		                                        <th>@lang('lot.sr_no')</th>

                                                <th>@lang('lot.auction')</th>

                                                <th>@lang('lot.lot_title')</th>

		                                        <th>@lang('lot.color')</th>

		                                        <th>@lang('lot.body_style')</th>

		                                        <th>@lang('lot.engine_type')</th>

                                                <th>@lang('lot.lot_number')</th>

                                                <th>@lang('lot.vechile_type')</th>

                                                <th>@lang('lot.primary_damage')</th>

                                                <th>@lang('lot.secondary_damage')</th>

                                                <th>@lang('lot.status')</th>

		                                        <th>@lang('lot.action')</th>

                                   			 </tr>

                                        </thead>

                                        <tbody>

                                           @foreach($data['results'] as $key=>$value)

                                         <tr>

                                        <td> {{$key+1}}</td>

                                        <td>{{isset($value->lot->title) ? $value->lot->title:''}}</td>

                                        <td>{{$value->lot_title}}</td>

                                        <td>{{$value->color}}</td>

                                        <td>{{ $value->body_style}}</td>

                                        <td>{{ $value->engine_type}}</td>

                                        <td>{{ $value->lot_no}}</td>

                                        <td>{{ $value->vehicle_type}}</td>

                                        <td>{{ $value->primary_damage}}</td>

                                        <td>{{ $value->secondary_damage}}</td>



                                             <td>

                                                 @if($value->status=="Approved")

                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-primary mr-1 pointer ">{{$value->status}}</span>

                                                 @elseif($value->status=="UnApproved")

                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-warning mr-1 pointer ">{{$value->status}}</span>

                                                 @elseif($value->status=="Canceled")

                                                   <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-danger mr-1 pointer ">{{$value->status}}</span>



                                                 @endif

                                             </td>

                                             <td>

                                            <div class="dropdown">

                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">

                                                    <i data-feather="more-vertical"></i>

                                                </button>

                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/lotdetail/'.$value->id)}}">

                                                        <i data-feather="file-text" class="mr-50"></i>

                                                        <span>@lang('lot.detail')</span>

                                                    </a>

                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/lot/'.$value->id)}}">

                                                        <i data-feather="edit-2" class="mr-50"></i>

                                                        <span>@lang('lot.edit')</span>

                                                    </a>

                                                    <a data-href="{{url(app()->getLocale().'/admin/deletelot/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">

                                                        <i data-feather="trash" class="mr-50"></i>

                                                        <span>@lang('lot.delete')</span>

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

            $('.lot').addClass('active');

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

                            url: '{{url('admin/userstatus')}}',

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

