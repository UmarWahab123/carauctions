@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">

<!-- BEGIN: Vendor CSS-->

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">


<!-- END: Vendor CSS-->
@endsection
@section('content')
    {{ csrf_field() }}
    <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                  <div class="card-datatable p-2">
                                     <h4 class="card-title">Memberships</h4>
                                    <a class="btn btn-primary float-lg-right mt-lg-n3" href="{{url('admin/membership')}}">Add Membership</a>
                                    <table class="table dynamic_table font-weight-bold">
                                        <thead>
                                             <tr role="row">
		                                        <th>Sr No</th>
		                                        <th> Type</th>
		                                        <th> Price</th>
		                                        <th> Descriptions</th>
		                                        <th> Action</th>
                                   			 </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($data['results'] as $key=>$value)
                                   		 <tr>
                                        <td> {{$key+1}}</td>
                                        <td>{{$value->type}}</td>
                                        <td>{{$value->price}}</td>
                                        <td>{{$value->description}}</td>
                                             <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url('admin/membership/'.$value->id)}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a data-href="{{url('admin/deletemembership/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>Delete</span>
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
            $('.memberships').addClass('active');
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
                            url: '{{url('userstatus')}}',
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
