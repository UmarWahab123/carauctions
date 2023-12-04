{{--This renders on page load--}}
@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

@endsection
<table class="table dynamic_table font-weight-bold">
    <thead class="theme-color">
        <th>Rank</th>
        <th>Question Text</th>
        <th>Personality Type</th>
        <th>Language</th>
        <th>Question ID</th>
        <th></th>
    </thead>
    <tbody class="atbody">
        @foreach($data['questionstypeA'] as $key=>$row)
        <tr>
            <td>{{$row->rank}}</td>
            <td>{{$row->question}}</td>
            <td>{{get_personality($row->personality_id)}}</td>
            <td>{{$row->langname}}</td>
            <td>{{$row->id}}</td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                    </button>
                        <div class="dropdown-menu">
                            <a data-id="{{$row->id}}" data-type="A" data-transid="{{$row->trans_id}}" href="javascript:void(0)" class="dropdown-item type_a_question" >
                                <i data-feather="edit-2" class="mr-50"></i>
                                <span>Edit</span>
                                </a>
                            <a data-href="{{url('admin/deletequestion/'.$row->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
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

<div class="form-group m-form__group mt-5">
 <button data-id="-1" data-type="A" data-transid="0" type="submit" class="btn btn-primary type_a_question">Add New Question</button>
 </div>

@section('js')
<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('.dynamic_table').DataTable();
        });
</script>
@endsection
