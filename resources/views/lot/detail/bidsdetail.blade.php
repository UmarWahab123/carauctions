<div class="col-12">
                                <table class="table dynamic_table font-weight-bold">
                                        <thead>
                                             <tr role="row">
                                                <th>Sr No</th>
                                                <th> Lot Number</th>
                                                <th> Auction</th>
                                                <th> User Name</th>
                                                <th> Minimun Price</th>
                                                <th> Bid Amount</th>
                                                <th> Status</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($data['bid'] as $key=>$value)
                                         <tr>
                                        <td> {{$key+1}}</td>
                                        <td>{{isset($value->lotname->lot_no)?$value->lotname->lot_no:''}}</td>
                                        <td>{{isset($value->auction->title)?$value->auction->title:''}}</td>
                                        <td>{{isset($value->user->name) ? $value->user->name : ''}}</td>
                                        <td>{{$value->min_price}}</td>
                                        <td>{{$value->bid_amount}}</td>

                                        <td>
                                                 @if($value->status=="Approved")
                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'UnApproved' : 'Approved'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>
                                                 @elseif($value->status=="UnApproved")
                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'UnApproved' : 'Approved'}}" class="badge badge-pill badge-light-warning mr-1 pointer btnstatus">{{$value->status}}</span>
                                                 @endif
                                             </td>
                                        
                                    </tr>
                                    @endforeach

                                        </tbody>
                                    </table>
                            </div>