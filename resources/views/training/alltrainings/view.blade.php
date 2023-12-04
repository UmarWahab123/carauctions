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
                                    <h2 class="content-header-title float-left mb-0">{{$data['page_title']}}</h2>
                                </div>
                                
                                <div class="card-datatable p-2">
                                    <table class="table dynamic_table font-weight-bold">
                                        <thead>
                                          <tr role="row">
                                            <th>Sr No</th>
                                            <th>Uploaded File</th>
                                            <th>Title</th>
                                            <th>User</th>
                                            <th>Description</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                         </tr>
                                        </thead>
                                        <tbody>
                                      @foreach(get_notification() as $key=>$value)
                                       <tr>
                                        <td> {{$key+1}}</td>
                                        <td>
                                            @if($value->type=="video")
                                                <video height="150px" class="w-100 video-style"  controls poster="https://newrich.com/wp-content/themes/betheme/images/newrich-logo.png">
                                                    <source  src="{{$value->file_upload}}" type="video/mp4">
                                                </video>
                                            @else
                                                <a href="{{url('admin/trainingdetail/'.$value->id)}}">
                                                    <img src="{{$value->file_upload}}" class="img-fluid" width="100px"></a>
                                            @endif
                                          </td>
                                              <td> <span class="blue-color">{{$value->title}}</span></td>
                                              <td>{{isset($value->user->name)?$value->user->name:''}}</td>
                                              <td>{{mb_strimwidth($value->description, 0, 30, "...")}}</td>
                                              <td><span class="darkgreen-color">{{$value->tags}}</span></td>
                                              <td> <span class="yellow-color">{{$value->status}}</span></td>
                                              <td>
                                              <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url('admin/training/'.$value->type.'/'.$value->id)}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{url('admin/trainingdetail/'.$value->id)}}">
                                                        <i data-feather="file-text" class="mr-50"></i>
                                                        <span>Detail</span>
                                                    </a>
                                                    <a data-href="{{url('admin/deletetraining/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.dynamic_table').DataTable();

        });
    </script>
@endsection


