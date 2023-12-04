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
                                    <h4 class="card-title">@lang('users.users')</h4>
                                    <a class="btn btn-primary" href="{{url(app()->getLocale().'/admin/user')}}">@lang('users.add_user')</a>
                                </div>
                                <div class="card-datatable p-2">
                                    <table class="table table-responsive dynamic_table font-weight-bold">
                                        <thead>
                                             <tr role="row">
		                                        <th>@lang('users.sr_no')</th>
		                                        <th>@lang('users.name')</th>
                                                <th>Date</th>
		                                        <th>@lang('users.email')</th>
		                                        <th>@lang('users.role')</th>
		                                        <th>@lang('users.status')</th>
                                                <th>@lang('users.document_status')</th>
		                                        <th>@lang('users.action')</th>
                                   			 </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($data['results'] as $key=>$value)
                                               @if($value->id==123)

                                   		 <tr class="d-none">
                                        <td> {{$key+1}}</td>
                                        <td><a href="{{$value->name}}">{{$value->name}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{isset($value->role->role_title) ? $value->role->role_title : ''}}</td>
                                             <td>
                                                 @if($value->status=="Active")
                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>
                                                 @elseif($value->status=="Inactive")
                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-warning mr-1 pointer btnstatus">{{$value->status}}</span>
                                                 @endif
                                             </td>
                                             <td> @if($value->document_status=="Pending")
                                                <span class="badge adge-pill badge-light-warning">{{$value->document_status }}</span>
                                                  @elseif($value->document_status=="Approved")
                                                  <span class="badge adge-pill badge-light-success">{{$value->document_status }}</span>
                                                  @endif
                                             </td>
                                             <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/userprofile/'.$value->id)}}">
                                                        <i data-feather="file-text" class="mr-50"></i>
                                                        <span>@lang('users.detail')</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/user/'.$value->id)}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>@lang('users.edit')</span>
                                                    </a>
                                                    <a data-href="{{url(app()->getLocale().'/admin/deleteuser/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>@lang('users.delete')</span>
                                                    </a>
                                                    <a data-id="{{$value->id}}"  class="dropdown-item purchased" href="javascript:void(0);">
                                                        <i data-feather="file-text" class="mr-50"></i>
                                                        <span>@lang('users.purchased_history')</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                     @else
                                      <tr >
                                        <td> {{$key+1}}</td>
                                        <td><a href="{{$value->name}}">{{$value->name}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{isset($value->role->role_title) ? $value->role->role_title : ''}}</td>
                                             <td>
                                                 @if($value->status=="Active")
                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>
                                                 @elseif($value->status=="Inactive")
                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-warning mr-1 pointer btnstatus">{{$value->status}}</span>
                                                 @endif
                                             </td>
                                             <td> @if($value->document_status=="Pending")
                                                <span class="badge adge-pill badge-light-warning">{{$value->document_status }}</span>
                                                  @elseif($value->document_status=="Approved")
                                                  <span class="badge adge-pill badge-light-success">{{$value->document_status }}</span>
                                                  @endif
                                             </td>
                                             <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/userprofile/'.$value->id)}}">
                                                        <i data-feather="file-text" class="mr-50"></i>
                                                        <span>@lang('users.detail')</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/user/'.$value->id)}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>@lang('users.edit')</span>
                                                    </a>
                                                    <a data-href="{{url(app()->getLocale().'/admin/deleteuser/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>@lang('users.delete')</span>
                                                    </a>
                                                    <a data-id="{{$value->id}}"  class="dropdown-item purchased" href="javascript:void(0);">
                                                        <i data-feather="file-text" class="mr-50"></i>
                                                        <span>@lang('users.purchased_history')</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                     @endif
                                    @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
     <div class="modal right fade" id="purchased" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Purchased History <span class="modal-title"></span> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-div">
            </div>
        </div>
    </div>
</div>
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
            $('.usermgt').addClass('sidebar-group-active');
            $('.users').addClass('active');
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

            $(document).on('click','.purchased',function () {
                var id =$(this).attr('data-id');
              // alert(id);
                $('#purchased').find('.modal-body').html('<p>Loading...</p>');
            $('#purchased').modal('show');
              $.ajax({
                 type:'get',
                 dataType:'json',
                 url: '{{url(app()->getLocale().'/admin/purchasedhistory')}}/'+id,
                  success: function(data){
                  $('#purchased').find('.modal-div').html(data.response);
                            }
                });
             });
        });
    </script>
@endsection
