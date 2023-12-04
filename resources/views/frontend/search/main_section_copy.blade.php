							

							<b class="text-right ml-3">Page {{$data['offset']}} of {{$data['per_page']}} </b>

		@foreach ($data['search'] as $search)

						<div class="col-xl-12 filter_search">

							<div class="card card-item card-item-vertical lotlist" data-time={{strtotime($search->lot->start_date)}}>

			                	<div class="card-img-top">

			                		<div class="card-img-wrap">

			                			<img src={{url($search->feature_image)}}>

			                		<div class="all-card-photos"><a href="{{url(app()->getLocale().'/lotdetail').'/'.$search->id}}">SEE ALL PHOTOS</a></div>

			                		</div>

			                	</div>

			                	<div class="card-content">

			                		<div class="card-block">

				                        <h4 class="card-title"><img src="{{url($search->brand_logo)}}" alt=""><a href="{{url(app()->getLocale().'/lotdetail/'.$search->id)}}">{{$search->lot_title}}</a></h4>

				                        <div class="char-card">

				                        	<p><span>@lang('main_section.lot_label')</span>{{$search->lot_no}} - <strong>@lang('main_section.start_up')</strong></p>

				                        	<p><span>Vin</span>{{$search->vin}}</p>

				                        </div>

			                    	</div>

				                    <div class="card-footer-vertical">

				                    	<div class="card-footer-info">

				                    		<span>@lang('main_section.date')</span>

				                    		<p>{{get_date_month($search->lot->start_date)}}</p>

				                    	</div>

				                        <div class="card-footer-info">

				                    		<span>@lang('main_section.damage')</span>

				                    		<p>{{$search->primary_damage}}, {{$search->secondary_damage}} </p>

				                    	</div>

				                    	<div class="card-footer-info">

				                    		<span>@lang('main_section.mileage')</span>

				                    		<p>{{$search->mileage}} miles  (verified)</p>

				                    	</div>

				                    </div>

		                		</div>

		                		<div class="card-info-rate">

		                			<div class="card-info-rate-timer countdown">

		                				{{-- <div>0 <span>Дней</span></div>

		                				<div>06 <span>Час</span></div>

		                				<div>45 <span>Мин</span></div>

		                				<div>33 <span>Сек</span></div> --}}

		                			</div>

		                			@if ($search->buy_now>0)

		                				<div class="card-info-rate-price">

		                				<p>${{$search->buy_now}} USD</p>

		                				<span>@lang('main_section.buy_price')</span>

		                			</div>

		                			 <div class="card-btn">

		                			 	<a href="" class="btn btn-register btn-dark-blue ">Buy Now</a>

				                    </div>

		                		     @else

		                			<div class="card-info-rate-price">

		                				<p>${{check_starting_price($search,$search->id)}} USD</p>

		                				<span>@lang('main_section.current_rate')</span>

		                			</div>

		                			 <div class="card-btn">

		                			 	<a href="{{url(app()->getLocale().'/lotdetail/'.$search->id)}}" class="btn btn-register btn-dark-blue ">@lang('main_section.place_bid')</a>

				                    </div>

				                   @endif

		                		</div>

	                		</div>

						</div>

		@endforeach





						

