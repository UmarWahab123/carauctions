<style>
    .td-padding-50-0 tr td {padding-top: 25px !important;padding-bottom: 25px !important;}
    table.new-shadow tr:hover {background: none;}
</style>
<h2 class="text-uppercase mt-5 text-center  green-color text-uppercase font-weight-bold"><b><i class="fa fa-gamepad pr-2"></i> Training Detail</b></h2>
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
                <div class="row ">
                    <div class="col-md-12">
                        <a href="{{url('admin/training/'.$data['results']->type.'/'.$data['results']->id)}}" class="btn btn-block btn-outline-primary mt-2">
                     <span class=""><i class="fas fa-gamepad "></i> Go To Edit
                     </span>
                        </a>

                    </div>
                </div>
            </td>
            <td>
                <div class="row ">
                    <div class="col-md-4">
                        <label>
                            <i class="fas fa-gamepad"></i>
                            <span class="">Name</span>
                        </label><br>
                        <h3 class="zero"><b>
                                <span class="darkgreen-color">{{$data['results']->title}}</span>
                            </b>
                        </h3>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <i class="fas fa-gamepad"></i>
                            <span class="">Share</span>
                        </label><br>
                     <span class=" green-color fsize13">
                     {{$data['results']->share}}
                     </span>
                    </div>
                    <div class="col-md-3">
                        <label>
                            <i class="fas fa-users"></i>
                            <span class="">Access Control</span>
                        </label><br>
                     <span class=" green-color fsize13 ml-5">
                     {{$data['results']->access_control}}
                     </span>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><i class="fas fa-money-bill-alt"></i> Tags</label><br>
                                        <h5 class="zero"><b>
                                                <span class="darkgreen-color">{{$data['results']->tags}}</span>
                                            </b>
                                        </h5>
                                    </div>
                                    <div class="col-md-4">
                                        <label><i class="fas fa-file"></i> Comments</label><br>
                                        <span class="fsize13 blue-color font-weight-bold">0</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label><i class="fas fa-file"></i> Likes</label><br>
                                        <span class="fsize13 blue-color font-weight-bold">0</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><i class="fas fa-money-bill-alt"></i> User</label><br>
                                        <h5 class="zero"><b>
                                    <span class="darkgreen-color">{{isset($data['results']->user->name) ? $data['results']->user->name : ''}}</span>
                                            </b>
                                        </h5>
                                    </div>
                                    <div class="col-md-4">
                                        <label><i class="fas fa-file"></i> Duration</label><br>
                                        <span class="fsize13 blue-color font-weight-bold">{{$data['results']->duration}}</span>
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
     @if ($data['results']->type=='course')
         
    
        <div class="col-md-12 ml-5 mb-5">
          <label><i class="fas fa-file"></i> Benefit</label><br>
          <span class="fsize13 blue-color font-weight-bold">{{$data['results']->benefits}}</span>
        </div>
        @endif 

    <div class="row mb-0">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ml-3">
                    <?=$data['results']->description?>
                </div>
            </div>
        </div>
    </div>
</div>