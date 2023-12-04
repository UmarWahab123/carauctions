<!-- <div class="col-lg-6 col-xl-3"> -->



	<!-- <div class="card card-product no-border">

		<div class="card-body-top">

			<h3>@lang('lotdetail.auction') </h3>

			<span><img src="{{ url($data['lot']->brand_logo) }}" alt=""></span>

		</div>

		<div class="card-body">

			<dl class="details-list">

				<dt>@lang('lotdetail.lot_number')</dt>

				<dd>{{$data['lot']->lot_no}}</dd>

				<dt>@lang('lotdetail.location')</dt>

				<dd>{{$data['auction']->location}}</dd>

				<dt>@lang('lotdetail.begining')</dt>

				<dd>{{$data['auction']->start_date}}</dd>

				<dt>@lang('lotdetail.sale_man')</dt>

				@if($data['auction']->saleman=="INSURANCE COMPANY")

				 <dd><p class="color-green">{{$data['auction']->saleman}}</p></dd>

				@elseif($data['auction']->saleman=="DEALER")

				 <dd><p class="color-red">{{$data['auction']->saleman}}</p></dd>

				@else

				 <dd><p class="color-gray">{{$data['auction']->saleman}}</p></dd>

				@endif

				<dt>@lang('lotdetail.document_type')</dt>

				<dd><p class="color-green">{{$data['auction']->document_type}}</p></dd>

			</dl>



		</div>

	</div>



	<div class="card card-product no-border">

		<div class="card-body-top">

			<h3>@lang('lotdetail.bet_info')</h3>

			

		</div>

		<div class="card-body">

			<dl class="details-list">

				<dt>@lang('lotdetail.current_bid')</dt>

				<dd class="starting_price">$ {{ $data['starting_price']}} USD</dd>

				<dt>@lang('lotdetail.predict_bid')<br>@lang('lotdetail.bet')</dt>

				<dd>$@lang('lotdetail.price') USD - $@lang('lotdetail.next_price') USD</dd>

				<dt>@lang('lotdetail.sale_status')</dt>

				<dd>@lang('lotdetail.net_sale')</dd>

				<dt>@lang('lotdetail.price_buy')</dt>

				<dd>@lang('lotdetail.ha')</dd>

				<dt>@lang('lotdetail.retail_value')<br> @lang('lotdetail.sale')</dt>

				<dd>$@lang('lotdetail.retail_price') USD</dd>

			</dl>

		</div>

	</div>





	<div class="card card-product no-border">

		<div class="card-body-top">

			<h3>@lang('lotdetail.lot')</h3>

			<span><img src="{{ url($data['lot']->brand_logo) }}" alt=""></span>

		</div>

		<div class="card-body">



			<dl class="details-list">

				<dt class="vin">VIN</dt>

				<dd>{{$data['lot']->vin}}</dd>

				<dt>@lang('lotdetail.repair_cost')</dt>

				<dd>${{$data['lot']->repair_cost}} USD</dd>

				<dt>@lang('lotdetail.primary_damage')</dt>

				<dd>{{$data['lot']->primary_damage}}</dd>

				<dt>@lang('lotdetail.secondary_damage')</dt>

				<dd>{{$data['lot']->secondary_damage}}</dd>

				<dt>@lang('lotdetail.document_type')</dt>

				<dd>{{$data['lot']->document_type}}</dd>

			</dl>



		</div>

	</div>



	<div class="card card-product no-border">

		<div class="card-body-top">

			<h3><strong>@lang('lotdetail.vin_global')</strong></h3>

			<h4>@lang('lotdetail.car_history')</h4>

		</div>

		<div class="card-body font-small">

			<p>@lang('lotdetail.car_history_text')</p>



			<a href="" class="btn btn-dark-blue mt-2 pl-3 pr-3">@lang('lotdetail.check') VIN</a>

		</div>

	</div>
 -->




<!-- </div> -->

