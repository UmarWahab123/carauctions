
<div class="content-body">
    <section id="basic-input">
        <div class="card mb-0">
            <div class="card-body">
                <style>
                    .td-padding-50-0 tr td {padding-top: 25px !important;padding-bottom: 25px !important;}
                    table.new-shadow tr:hover {background: none;}
                </style>
                <div class="row">
                    <table class="responsive table sticky-header" style="width: 100%!important">
                        <tbody>
                        <tr>
                            <td>
                                <a href="">
                                  <span class="">
                                     <div style="background-image: url({{$data['results']->file_upload}});" class="new-shadow-all contest-item round-10">
                                     </div>
                                  </span>
                                </a>
                                <div class="row m-t-20">
                                    <div class="col-md-12">
                                        <a href="{{url('admin/page/'.$data['results']->training_id.'/'.$data['results']->id)}}" class="btn btn-block btn-outline-primary mt-2">
                                         <span class=""><i class="fas fa-gamepad "></i> Go To Edit
                                         </span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>

                                <div class="row">
                                    <div class="col-md-8">
                                        <label>
                                            <i class="fas fa-gamepad"></i>
                                            <span class="">Name</span>
                                        </label><br>
                                        <h3 class="zero"><b>
                                                <span class="darkgreen-color">{{$data['results']->title}}</span>
                                            </b>
                                        </h3>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <i class="fas fa-users"></i>
                                            <span class="">Positon</span>
                                        </label><br>
                                         <span class=" green-color fsize13">
                                         {{$data['results']->position}}
                                         </span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label><i class="fas fa-money-bill-alt"></i> Tags</label><br>
                                                        <h5 class="zero"><b>
                                                                <span class="darkgreen-color">{{$data['results']->tags}}</span>
                                                            </b>
                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                 
                    <div class="row mb-0">
                        <div class="col-12">
                        <div class="card mb-0">
                        <div class="card-body">
                            <?=$data['results']->description?>
                        </div>
                        </div>
                        </div>
                    </div>
                    @if ($data['type']=='course')
                    <div class="row mt-4">
                         <div class="col-md-12">
                            <h3 class="green-color">Courses Tasks</h3><br>
                             @foreach ($data['course_task'] as $key=>$value)
                              <h4 class="blue-color">Task {{$key+1}}</h4> <p class="darkgreen-color">{{$value->title}}</p>
                             @endforeach
                        </div>
                    </div>
                     @endif
                </div>

            </div>

        </div>
    </section>
</div>

