           <div class="row">

                            <table class="responsive table sticky-header" style="width: 100%!important">

                                <tbody>

                                <tr>

                                    <td>

                                        <a href="">

                                          <span class="">

                                             <div style="background-image: url({{url($data['results']->feature_image)}})" class="new-shadow-all contest-item round-10">

                                             </div>

                                          </span>

                                        </a>

                                        <div class="row ">

                                            <div class="col-md-12">

                                                <a href="{{url(app()->getLocale().'/admin/lot/'.$data['results']->id)}}" class="btn btn-block btn-outline-primary mt-2">

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

                                                    <span class="">Lot Title</span>

                                                </label><br>

                                                <h3 class="zero"><b>

                                                        <span class="darkgreen-color">{{$data['results']->lot_title}}</span>

                                                    </b>

                                                </h3>

                                            </div>

                                            <div class="col-md-2">

                                                <label>

                                                    <i class="fas fa-gamepad"></i>

                                                    <span class="">Body Style</span>

                                                </label><br>

                                             <span class=" green-color fsize13">

                                            {{$data['results']->body_style}}

                                             </span>

                                            </div>

                                            <div class="col-md-2">

                                                <label>

                                                    <i class="fas fa-users"></i>

                                                    <span class="">Color</span>

                                                </label><br>

                                             <span class=" green-color fsize13 ">

                                            {{$data['results']->color}}

                                             </span>

                                            

                                            </div>

                                              <div class="col-md-2">

                                                <label>

                                                    <i class="fas fa-users"></i>

                                                    <span class="">Color</span>

                                                </label><br>

                                             <span class=" green-color fsize13 ">

                                            {{$data['results']->color}}

                                             </span>

                                            </div>

                                            <div class="col-md-2">

                                                <label>

                                                    <i class="fas fa-users"></i>

                                                    <span class="">Mileage</span>

                                                </label><br>

                                             <span class=" green-color fsize13 ">

                                            {{$data['results']->mileage}}

                                             </span>

                                            </div>

                                        </div>

                                        <div class="row ">

                                            <div class="col-md-4">

                                                <label>

                                                    <i class="fas fa-gamepad"></i>

                                                    <span class="">Cylinder</span>

                                                </label><br>

                                                        <span class="green-color fsize13">{{$data['results']->cylinder}}</span>

                                            </div>

                                            <div class="col-md-2">

                                                <label>

                                                    <i class="fas fa-gamepad"></i>

                                                    <span class="">Drive</span>

                                                </label><br>

                                             <span class=" green-color fsize13">

                                            {{$data['results']->drive}}

                                             </span>

                                            </div>

                                            <div class="col-md-2">

                                                <label>

                                                    <i class="fas fa-users"></i>

                                                    <span class="">Engine Type</span>

                                                </label><br>

                                             <span class=" green-color fsize13 ">

                                            {{$data['results']->engine_type}}

                                             </span>

                                            

                                            </div>

                                              <div class="col-md-2">

                                                <label>

                                                    <i class="fas fa-users"></i>

                                                    <span class="">Retail Value</span>

                                                </label><br>

                                             <span class=" green-color fsize13 ">

                                            {{$data['results']->est_retail_value}}

                                             </span>

                                            </div>

                                            <div class="col-md-2">

                                                <label>

                                                    <i class="fas fa-users"></i>

                                                    <span class="">Fuel</span>

                                                </label><br>

                                             <span class=" green-color fsize13 ">

                                            {{$data['results']->fuel}}

                                             </span>

                                            </div>

                                        </div>

                                        <div class="row ">

                                            <div class="col-md-12">

                                                <div class="card mb-0">

                                                    <div class="card-body">

                                                        <div class="row">

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-money-bill-alt"></i>Highlights</label><br>

                                                                <h5 class="zero"><b>

                                                                        <span class="darkgreen-color">{{$data['results']->highlights}}</span>

                                                                    </b>

                                                                </h5>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> Key</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->key}}</span>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> Lot Number</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->lot_no}}</span>

                                                            </div>

                                                           

                                                        </div>

                                                         <div class="row mt-2">

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-money-bill-alt"></i>primary damage</label><br>

                                                                <h5 class="zero"><b>

                                                                        <span class="darkgreen-color">

                                                                            {{$data['results']->primary_damage}}</span>

                                                                    </b>

                                                                </h5>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> secondary damage</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->secondary_damage}}</span>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> title code</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->title_code}}</span>

                                                            </div>

                                                            

                                                        </div>

                                                        <div class="row mt-2">

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> transmission</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->transmission}}</span>

                                                            </div>

                                                             <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> Odometer</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->odometer}}</span>

                                                            </div>

                                                             <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> vehicle type</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->vehicle_type}}</span>

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

                                                                <label><i class="fas fa-money-bill-alt"></i> Vin</label><br>

                                                                <h5 class="zero"><b>

                                                            <span class="darkgreen-color">{{$data['results']->vin}}</span>

                                                                    </b>

                                                                </h5>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> Document Type</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->document_type}}</span>

                                                            </div>

                                                             <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> repair cost</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->repair_cost}}</span>

                                                            </div>

                                                             @if ($data['results']->starting_price>0)

                                                             <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> starting price</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->starting_price}}</span>

                                                            </div>  

                                                            @endif

                                                            

                                                            @if ($data['results']->buy_now>0)

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i> Buy Now price</label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->buy_now}}</span>

                                                            </div>

                                                            @endif

                                                            <div class="col-md-4">

                                                                <label><i class="fas fa-file"></i>Model </label><br>

                                                                <span class="fsize13 blue-color font-weight-bold">{{$data['results']->model->name}}</span>

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

                            <div class="row mb-0 ml-1">

                                <div class="col-12">

                                    <div class="card mb-0">

                                        <div class="card-body ml-3">

                                           description

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>