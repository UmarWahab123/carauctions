<div class="col-12">

                                <table class="table dynamic_table table-resposive font-weight-bold">

                                        <thead>

                                             <tr role="row">

                                                <th>@lang('auction.sr_no')</th>

                                                <th>@lang('auction.image')</th>

                                                <th>@lang('auction.lot_title')</th>

                                                <th>@lang('auction.body_style')</th>

                                                <th>@lang('auction.mileage')</th>

                                                <th>@lang('auction.engine_type')</th>

                                                <th>@lang('auction.vechile_type')</th>

                                                <th>@lang('auction.vin')</th>

                                                <th>@lang('auction.starting_price')</th>

                                                <th>@lang('auction.active')</th>

                                             </tr>

                                        </thead>

                                        <tbody>

                                           @foreach($data['lot'] as $key=>$value)

                                         <tr>

                                        <td> {{$key+1}}</td>

                                        <td><img src="{{url($value->feature_image)}}" width="100px" height="100px" alt=""></td>

                                        <td>{{$value->lot_title}}</td>

                                        <td>{{$value->body_style}}</td>

                                        <td>{{$value->mileage}}</td>

                                        <td>{{$value->engine_type}}</td>

                                        <td>{{$value->vehicle_type}}</td>

                                        <td>{{$value->vin}}</td>

                                        <td>{{$value->starting_price}}</td>

                                        <td> <div class="dropdown">

                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">

                                                    <i data-feather="more-vertical"></i>

                                                </button>

                                                <div class="dropdown-menu">

                                                    

                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/lot/'.$value->id)}}">

                                                        <i data-feather="edit-2" class="mr-50"></i>

                                                        <span>@lang('auction.edit')</span>

                                                    </a>

                                                   

                                                </div>

                                            </div></td>

                                        

                                      

                                        

                                    </tr>

                                    @endforeach



                                        </tbody>

                                    </table>

                            </div>