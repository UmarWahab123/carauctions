@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

@endsection
@section('content')
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Personalities</h4>
                                    <a class="btn btn-primary" href="{{url('admin/personality')}}">Add Personality</a>
                                </div>
                                <div class="card-datatable p-2">
                                    <table class="table dynamic_table font-weight-bold">
                                        <thead>
                                            <tr>
                                                  <th>Sr No</th>
                                                   <th> Name</th>
                                                   <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($data['results'] as $key=>$row)
                                             <tr>
                                        <td> {{$key+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url('admin/personality/'.$row->id)}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a data-href="{{url('admin/deletepersonality/'.$row->id)}}"  data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
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
        $('.enneagram').addClass('sidebar-group-active');
        $('.personalities').addClass('active');
//        $('.dynamic_table').DataTable({});
    });
</script>
@endsection
