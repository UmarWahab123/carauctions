@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-datatable p-2">
          <table class="table dynamic_table font-weight-bold">
            <thead>
             <tr role="row">
              <th>Sr No</th>
              <th> Uploaded File</th>
              <th> Title</th>
              <th> User</th>
              <th> Description</th>
              <th> Tags</th>
              <th> Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach($results as $key=>$value)
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
              <td> <span class="darkgreen-color">{{$value->tags}}</span></td>
              <td> <span class="yellow-color">{{$value->status}}</span></td>
              <td>
               <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{url('admin/training/'.$value->type.'/'.$value->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                    <span>Edit</span>
                  </a>
                  <a class="dropdown-item" href="{{url('admin/trainingdetail/'.$value->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text mr-50"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    <span>Detail</span>
                  </a>
                  <a class="dropdown-item" href="{{url('admin/page/'.$value->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    <span>Add Page</span>
                  </a>
                  <a data-href="{{url('admin/deletetraining/'.$value->id)}}" data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
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
@section('js')
<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.dynamic_table').DataTable();

        });
    </script>
@endsection