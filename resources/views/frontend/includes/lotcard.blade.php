<div class="card card-item card-item-vertical lotlist" data-time="{{strtotime($value->start_date)}}">
	<div class="card-img-top">
		<div class="card-img-wrap">
			<main class="lightgallery">
				 <a class="lot-img" href="{{url(isset($value->lotname->feature_image)?$value->lotname->feature_image:'')}}">
			<img src="{{url(isset($value->lotname->feature_image)?$value->lotname->feature_image:'') }}">
		</a>
			<div class="all-card-photos"><a href="{{url(app()->getLocale().'/lotdetail/'.$value->lot_id)}}">@lang('betting.photo')</a></div>
			 @foreach ($value->lotname->gallery as $lotimages)
                        <a  class="lot-img d-none" href="{{url($lotimages->images)}}">
                          <img src="{{url($lotimages->images)}}" class="product-image" alt="">
                        </a> 
                        @endforeach

			</main>
		</div>
	</div>
	<div class="card-content">
		<div class="text-right"><span class="book_mark fas fa-bookmark {{check_bookmark(Auth::user()->id,$value->lot_id)==1?"active":''}} add_bookmark" data-lot="{{$value->lot_id}}" data-id="{{isset(Auth::user()->id)?Auth::user()->id:''}}" data-bookmark="{{check_bookmark(Auth::user()->id,$value->lot_id)==1?1:0}} "></span></div>
		<div class="card-block">
			<h4 class="card-title"><img src="{{url(isset($value->lotname->brand_logo)?$value->lotname->brand_logo:'')}}" alt=""><a href="{{url(app()->getLocale().'/lotdetail/'.$value->lot_id)}}">{{$value->lotname->lot_title}}</a></h4>
			<div class="char-card">
				<p><span>@lang('betting.lot')</span>{{$value->lotname->lot_no}} - <strong>@lang('betting.start_up')</strong></p>
				<p><span>@lang('betting.vin')</span>{{$value->lotname->vin}}</p>
			</div>
		</div>
		<div class="card-footer-vertical">
			<div class="card-footer-info">
				<span>@lang('betting.auction_date')</span>
				<p>{{get_date_month($value->auction->start_date)}}</p>
			</div>
			<div class="card-footer-info">
				<span>@lang('betting.damage')</span>
				<p>{{$value->lotname->primary_damage}},{{$value->lotname->secondary_damage}} </p>
			</div>
			<div class="card-footer-info">
				<span>@lang('betting.mileage')</span>
				<p>{{$value->lotname->mileage}} @lang('betting.miles')</p>
			</div>
		</div>
	</div>
	<div class="card-info-rate">
		@if($value->status=="Approved") <!--Purchased -->
		<div class="card-info-rate-title">
			@lang('betting.auction_won')
		</div>
		@elseif($value->status=="Rejected")  <!-- Rejected -->
		<div class="card-info-rate-title">
			<h2>@lang('betting.bid_rejected')</h2>
		</div>
		@elseif($value->status=="Canceled") <!-- Canceled -->
		<div class="card-info-rate-title">
			<h2>@lang('betting.lot_cancel')</h2>
		</div>
		@else
		<div class="card-info-rate-timer countdown">
		</div>
		@endif
		<div class="card-info-rate-price">
			<p>${{check_starting_price($value,$value->lot_id)}} USD</p>
			<span> @lang('betting.current_rate')</span>
		</div>
		<div class="card-btn">
			<a href="{{url("/lotsearch")}}" class="btn btn-dark-blue">@lang('betting.search_similar')</a>
		</div>
	</div>
</div>