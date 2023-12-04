<table class="table dynamic_table1  font-weight-bold">

    <thead>

        <tr role="row">

		    <th>@lang('bids.sr_no')</th>

		    <th>@lang('bids.lot_number')</th>

		    <th>@lang('bids.auction')</th>

		    <th>@lang('bids.user_name')</th>

		    <th>@lang('bids.minimum_price')</th>

            <th>@lang('bids.bid_amount')</th>

            <th>@lang('bids.status')</th>

		    <th>@lang('bids.action')</th>

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

                @if($value->status=="Approved")

                    <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'UnApproved' : 'Approved'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>

                @elseif($value->status=="UnApproved")

                    <span data-id="{{$value->id}}" data-status="{{$value->status=='Approved' ? 'UnApproved' : 'Approved'}}" class="badge badge-pill badge-light-warning mr-1 pointer btnstatus">{{$value->status}}</span>

                @endif

            </td>

            <td>

                <div class="dropdown">

                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">

                        <i data-feather="more-vertical"></i>

                    </button>

                    <div class="dropdown-menu">

                        <a data-href="{{url('admin/approvebid/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-save" class="dropdown-item" href="javascript:void(0);">

                            <i data-feather="check" class="mr-50"></i>

                            <span>@lang('bids.approve_bids')</span>

                        </a>

                        @if ($value->status=='Approved')

                            <a class="d-none" href="{{url("/admin/makeinvoice/".$value->id)}}" class="dropdown-item" >

                                <i data-feather="file-text" class="mr-50"></i>

                                <span>@lang('bids.make_invoice')</span>

                            </a>

                        @endif



                    </div>

                </div>

            </td>

        </tr>

        @endforeach

    </tbody>
</table>

