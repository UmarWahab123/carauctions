@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection
<table class="table dynamic_table font-weight-bold">
    <thead>
    <tr class="font-white fsize12 font-weight-bold">
        <th>File</th>
        <th>Title</th>
        <th>Positon</th>
        <th>Tages</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['pages'] as $key=>$value)
        <tr>
            <td>
                <a href="javascript::void(0)" class="viewdetail" data-id="{{$value->id}}" data-type="{{$data['results']->type}}" data-href="{{url('admin/lessondetail') }}">
                    @if (strpos($value->file_upload, '.pdf') !== false)
                    <a href="{{$value->file_upload}}">View PDF</a>
                    @elseif(strpos($value->file_upload, '.doc') !== false)
                    <a href="{{$value->file_upload}}">View Word </a>
                    @else
                    <img src="{{$value->file_upload}}" class="img-fluid" width="100px">
                    @endif
                </a>
            </td>
            <td><span class="blue-color">{{$value->title}}</span></td>
            <td>{{$value->position}}</td>
            <td> <span class="darkgreen-color">{{$value->tags}}</span></td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('admin/page/'.$value->training_id.'/'.$value->id)}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Edit</span>
                        </a>
                        <a class="dropdown-item" href="javascript::void(0)" class="viewdetail" data-id="{{$value->id}}" data-type="{{$data['results']->type}}" data-href="{{url('admin/lessondetail') }}">
                            <i data-feather="file-text" class="mr-50"></i>
                            <span>Detail</span>
                        </a>
                        <a data-href="{{url('admin/deletelesson/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
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
@section('js')
<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.dynamic_table').DataTable();
            $('.tariningR').addClass('sidebar-group-active');
            $('.classrooms').addClass('active');
        });
    </script>
@endsection
