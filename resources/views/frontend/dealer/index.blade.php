@extends('frontend.layout.header')


@section('content')




<section class="section-main section-cabinet pb-70">
	<div class="">
		<div class="row">
			<div class="col-md-5 col-lg-3">
				<div class="section-sidebar">

					@include('frontend.dashboard.sidebar')

				</div>
			</div>

			<div class="col-md-7 col-lg-9">

				<section id="basic-datatable">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="row">

                        <div class="col-12">

                            <h4 class="card-title">{{$data['page_title']}}</h4>

                            <a class="btn btn-dark-blue " href="{{url(app()->getLocale().'/dealer')}}">@lang('dealer.add_lot')</a><br><br>
                            <div class="card card-white">
                            

                            <div class="styled-table payment-table">
                                    <div class="paymenttable">

                                    <table class="table-style table-responsive">
                                    <tbody>
                                    <tr>
                                        <td width="30%">@lang('dealer.sr_no')</td>
                                        <td width="30%">@lang('dealer.auction')</td>
                                        <td width="30%">@lang('dealer.lot_title')</td>
                                        <td width="30%">@lang('dealer.model')</td>
                                        <td width="30%">@lang('dealer.color')</td>
                                        <td width="30%">@lang('dealer.body_style')</td>
                                        <td width="30%">@lang('dealer.engine_type')</td>
                                        <td width="30%">@lang('dealer.lot_number')</td>
                                        <td width="30%">@lang('dealer.vechile_type')</td>
                                        <td width="30%">@lang('dealer.primary_damage')</td>
                                        <td width="30%">@lang('dealer.secondary_damage')</td>
                                        <td width="30%">@lang('dealer.status')</td>
                                        <td width="30%">@lang('dealer.action')</td>
                                    </tr>
                                    @foreach($data['results'] as $key=>$value)

                                            <tr>

                                                <td> {{$key+1}}</td>

                                                <td>{{$value->lot->title}}</td>

                                                <td>{{$value->lot_title}}</td>
                                                <td>{{isset($value->model->name)?$value->model->name:''}}</td>

                                                <td>{{$value->color}}</td>

                                                <td>{{ $value->body_style}}</td>

                                                <td>{{ $value->engine_type}}</td>

                                                <td>{{ $value->lot_no}}</td>

                                                <td>{{ $value->vehicle_type}}</td>

                                                <td>{{ $value->primary_damage}}</td>

                                                <td>{{ $value->secondary_damage}}</td>

                                                <td>

                                                    @if($value->status=="Approved")

                                                    <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-primary mr-1 pointer ">{{$value->status}}</span>

                                                    @elseif($value->status=="UnApproved")

                                                    <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-warning mr-1 pointer ">{{$value->status}}</span>

                                                    @elseif($value->status=="Canceled")

                                                    <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-danger mr-1 pointer ">{{$value->status}}</span>

                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{url(app()->getLocale().'/dealer_deatil/'.$value->id)}}">@lang('dealer.detail')</a> | <a href="{{url(app()->getLocale().'/dealer/'.$value->id)}}">@lang('dealer.edit')</a> | 
                                                    <a href="{{url(app()->getLocale().'/deletedealer/'.$value->id)}}">@lang('dealer.delete')</a>
                                            
                                                </td>

                                            </tr>

                                            @endforeach

                                    </tbody></table>
                                                        <!-- <div class="text-right">
                                    <h5>0-4 of 0</h5>
                                </div> -->
                            </div>
                        </div>

                        </div>
                      </div>
                    </div>

                </section>
			</div>
		</div>
	</div>

</section>



@endsection

@section('js')

    <script type="text/javascript">

       $(document).ready(function(){
         $('.your_lots').addClass('activetab');
});
    </script>

@endsection 





