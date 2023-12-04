@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

@endsection
<table class="table dynamic_table font-weight-bold">
    <thead class="theme-color">
        <th>Rank</th>
        <th>Statement Text A</th>
        <th>Personality Type A</th>
        <th>Statement Text B</th>
        <th>Personality Type B</th>
        <th>Language</th>
        <th>Question ID</th>
        <th></th>
    </thead>
    <tbody class="btbody">
        @foreach($data['questionstypeB'] as $key=>$row)
        <tr>
            <td>{{$row->rank}}</td>
            <td>{{$row->statement_a_text}}</td>
            <td>{{get_personality($row->statement_a_pid)}}</td>
            <td>{{$row->statement_b_text}}</td>
            <td>{{get_personality($row->statement_b_pid)}}</td>
            <td>{{$row->langname}}</td>
            <td>{{$row->id}}</td>
             <td>
            <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </button>
                            <div class="dropdown-menu">
                                <a data-id="{{$row->id}}" data-type="B" data-transid="{{$row->trans_id}}" href="javascript:void(0)" class="dropdown-item type_a_question" >
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
 <button data-id="-1" data-type="B"  data-transid="0" type="submit" class="btn btn-primary type_a_question">Add New Question</button>
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