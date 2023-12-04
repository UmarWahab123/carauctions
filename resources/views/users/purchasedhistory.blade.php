<section id="basic-datatable">

                    <div class="row">

                        <div class="col-12">

                                <div class="card-datatable ">

                                       @if (count($data['results'])>0)

                                    <table class="table table-responsive dynamic_table font-weight-bold">

                                        <thead>

                                             <tr role="row">

                                                <th>Sr No</th>

                                                <th> Lot Number</th>

                                                <th> Auction</th>

                                                <th> User Name</th>

                                                <th> Minimun Price</th>

                                                <th> Bid Amount</th>

                                                <th> Status</th>

                                                <th> Action</th>

                                             </tr>

                                        </thead>

                                        <tbody>

                                 

                                      @foreach($data['results'] as $key=>$value)

                                         <tr>

                                        <td> {{$key+1}}</td>

                                        <td>{{isset($value->lotname->lot_no)?$value->lotname->lot_no:''}}</td>

                                        <td>{{isset($value->auction->title)?$value->auction->title:''}}</td>

                                        <td>{{isset($value->user->name) ? $value->user->name : ''}}</td>

                                        <td>{{$value->min_price}}</td>

                                        <td>{{$value->bid_amount}}</td>

                                        <td>

                                        <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'UnApproved' : 'Approved'}}" class="badge badge-pill badge-light-primary mr-1 pointer ">{{$value->status}}</span>

                                                

                                        </td>

                                            <td><a href="{{url("/admin/makeinvoice/".$value->id)}}">Invoice</a></td>

                                        </tr>

                                      @endforeach

                                        </tbody>

                                    </table>

                                      @else  

                                      <h2 class="text-center mt-5 mb-5">No record found</h2>

                                   @endif

                                </div>

                        </div>

                    </div>

                </section>