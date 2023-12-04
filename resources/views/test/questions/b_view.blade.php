@if($results->action=="Added")
@foreach($results as $key=>$value)
<tr>
       <td>{{$value->rank}}</td>
            <td>{{$value->statement_a_text}}</td>
            <td>{{get_personality($value->statement_a_pid)}}</td>
            <td>{{$value->statement_b_text}}</td>
            <td>{{get_personality($value->statement_b_pid)}}</td>
            <td>{{$value->langname}}</td>
            <td>{{$value->id}}</td>
      <td>
<td>
      <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                            <div class="dropdown-menu">
                                <a data-id="{{$value->id}}" data-type="B" data-transid="{{$value->trans_id}}" href="javascript:void(0)" class="dropdown-item type_a_question" >
                                    <i data-feather="edit-2" class="mr-50"></i>
                                    <span>Edit</span>
                                    </a>
                                <a data-href="{{url('admin/deletequestion/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                    <i data-feather="trash" class="mr-50"></i>
                                    <span>Delete</span>
                                </a>
                            </div>
                </div>
</td>
</tr>
@endforeach
@else
        <td>{{$results->rank}}</td>
            <td>{{$results->statement_a_text}}</td>
            <td>{{get_personality($results->statement_a_pid)}}</td>
            <td>{{$results->statement_b_text}}</td>
            <td>{{get_personality($results->statement_b_pid)}}</td>
            <td>{{$results->langname}}</td>
            <td>{{$results->id}}</td>
      <td>

      <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                            <div class="dropdown-menu">
                                <a data-id="{{$results->id}}" data-type="B" data-transid="{{$results->trans_id}}" href="javascript:void(0)" class="dropdown-item type_a_question" >
                                    <i data-feather="edit-2" class="mr-50"></i>
                                    <span>Edit</span>
                                    </a>
                                <a data-href="{{url('admin/deletequestion/'.$results->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                    <i data-feather="trash" class="mr-50"></i>
                                    <span>Delete</span>
                                </a>
                            </div>
                </div>
</td>
@endif
