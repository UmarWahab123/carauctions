           <div class="row">

                            <table class="table-resposive table sticky-header" style="width: 100%!important">

                                <tbody>

                                <tr>

                                    <td>

                                        <a href="">

                                          <span class="">

                                             <div style="background-image: url({{url($data['results']->auction_banner)}})" class="new-shadow-all contest-item round-10">

                                             </div>

                                          </span>

                                        </a>

                                        <div class="row ">

                                            <div class="col-md-12">

                                                <a href="{{url(app()->getLocale().'admin/auction/'.$data['results']->id)}}" class="btn btn-block btn-outline-primary mt-2">

                                             <span class=""><i class="fas fa-gamepad "></i> @lang('auction.go_to_edit')

                                             </span>

                                                </a>



                                            </div>

                                        </div>

                                    </td>

                                    <td>

                                        <div class="row ">

                                            <div class="col-md-3">

                                                <label>

                                                    <i class="fas fa-gamepad"></i>

                                                    <span class="">@lang('auction.title')</span>

                                                </label><br>

                                                <h3 class="zero"><b>

                                                        <span class="darkgreen-color">{{$data['results']->title}}</span>

                                                    </b>

                                                </h3>

                                            </div>

                                            <div class="col-md-3">

                                                <label>

                                                    <i class="fas fa-gamepad"></i>

                                                    <span class="">@lang('auction.location')</span>

                                                </label><br>

                                             <span class=" green-color fsize13">

                                            {{$data['results']->location}}

                                             </span>

                                            </div>

                                            <div class="col-md-3">

                                                <label>

                                                    <i class="fas fa-users"></i>

                                                    <span class="">@lang('auction.saleman')</span>

                                                </label><br>

                                             <span class=" green-color fsize13 ">

                                            {{$data['results']->saleman}}

                                             </span>

                                            

                                            </div>

                                              <div class="col-md-3">

                                                <label>

                                                    <i class="fas fa-users"></i>

                                                    <span class="">@lang('auction.document_type')</span>

                                                </label><br>

                                             <span class=" green-color fsize13 ">

                                            {{$data['results']->document_type}}

                                             </span>

                                            </div>

                                           

                                        </div>

                                        <div class="row ">

                                            <div class="col-md-12">

                                                <div class="card mb-0">

                                                    <div class="card-body">

                                                        <div class="row">

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-money-bill-alt"></i>@lang('auction.start_date')</label><br>

                                                                <h5 class="zero"><b>

                                                                        <span class="darkgreen-color">{{$data['results']->start_date}}</span>

                                                                    </b>

                                                                </h5>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> @lang('auction.end_date')</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->end_date}}</span>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> @lang('auction.status')</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->status}}</span>

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

                        

                        </div>