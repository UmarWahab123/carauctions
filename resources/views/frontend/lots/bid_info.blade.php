	<!-- <div class="col-lg-6 col-xl-3">

		

		<div class="card card-product no-border">

			<div class="card-body-top bg-blue-transparent">

				<h3 >@lang('lotdetail.time_auction')</h3>

			</div>


			<input type="hidden" name="start_date" value="{{$data['auction']->start_date}}">

			<input type="hidden" name="end_date" value="{{$data['auction']->end_date}}">



		</div>

          

		<div class="card card-product no-border">

			<div class="card-body-top">

				<h3>@lang('lotdetail.betting')</h3>

			</div>
      @if ($data['lot']->buy_now>0)
      	<div class="card-info-rate-price">

				<p class="starting_price">$ {{ $data['lot']->buy_now}}  USD</p>

				<span>@lang('lotdetail.buy_now')</span>

			</div>
			@else
			<div class="card-info-rate-price">

				<p class="starting_price">$ {{ $data['starting_price']}}  USD</p>

				<span>@lang('lotdetail.current_rate')</span>

			</div>
      @endif
     
			<div class="px-3">
           @if ($data['lot']->buy_now>0)
				
				<button data-toggle="modal" data-target="#modal-rate" class="btn btn-dark-blue btn-big mb-4 mt-4 ">@lang('lotdetail.buy_now')</button>

				@else
				<div class="group-input calc-input">

					<button class="down_count btn btn-info" title="Down"><i class="far fa-minus"></i></button>

					<input class="counter" type="text" placeholder="value..." value="0" />    

					<button class="up_count btn btn-info" title="Up"><i class="far fa-plus"></i></button>

				</div>

				<button data-toggle="modal" data-target="#modal-rate" class="btn btn-dark-blue btn-big mb-4 mt-4 ">@lang('lotdetail.place_bit')</button>

        @endif


			</div>

			   @if (empty(Auth::user()->address))

			<div class="modal-footer-block-red">
				@php
					$user_id=0;
				@endphp
                     @if(Auth::check())
                      @php
                        $user_id=Auth::user()->id;
                      @endphp
                     @endif
				<p><a href="{{url(app()->getLocale().'/usersettings/'.$user_id.'?'.'type=Address')}}" class="link-decor-blue">@lang('lotdetail.your_profile')</a> @lang('lotdetail.empty_text')</p>

			</div>

			@endif



		</div>





		<div class="card card-product no-border">

			<div class="card-body-top">

				<h3>@lang('lotdetail.price_calculator')</h3>

			</div>



			<div class="card-body">

				<p class="title-p">@lang('lotdetail.final_rate')</p>

				<div class="card-price-tab sidebar-nav mb-4">

					
				<span class="fal fa-dollar-sign"></span>
					<form id="bid_value_form1" method="POST">
						{{csrf_field()}}
						<input type="text" name="bid_value1" value="" class="bid_value1">
						
					</form> -->
					<!-- <p>@lang('lotdetail.final_price')</p> -->


				<!-- </div>



				<p class="title-p">

					@lang('lotdetail.additional_expenses')

				</p>


				<dl class="details-list">

					<dt>{{$data['lot']->brand}} Fee</dt>

					<dd><p>$ <span class="copart_fee"></span> USD</p> </dd>

					<dt>@lang('lotdetail.documentation_fee')</dt>

					<dd>$@lang('lotdetail.fee_price')<input type="hidden" name="document_fee" value="@lang('lotdetail.fee_price')"> USD</dd>

					<dt>@lang('lotdetail.tarnsction')</dt>

					<dd>$@lang('lotdetail.transction_price') <input type="hidden" name="transction_price" value="@lang('lotdetail.transction_price')"> USD</dd>

					<dt><strong>@lang('lotdetail.total_price'):</strong></dt>

					<dd><p><strong>$<span class="total_price_fee"></span> USD</strong></p></dd>

				</dl>


				<p class="title-p mt-4 usa1">
					Delivery To  <br>
					<input type="radio" name="usa1" value="USA"> USA <input type="radio" name="usa1" value="Others"> Others
				</p>

				<form>
					<div class="form-group zip_code1">
						<input type="text" name="zip_code1"  class="form-control zip_code_search" placeholder="Zip Code">
					</div>
				</form>

				<form id="shipping_form" method="post">
					{{csrf_field()}}
				<p class="title-p mt-4 delivery1">

					Ground Shipping

				</p>

				<div class="card-body-row delivery">

					<div class="select mb-3 ">

						<select class="slim-select-2 ground_shipping_data1" data-shipping1 name="id1" >

							<option value="">Ground Shipping</option>
                                @foreach($data['ground_shipping'] as $key=>$value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach

						</select>

					</div>

					<p class="mt-2">$<span class="ground_fee"></span> USD</p>

				</div>



				<p class="title-p delivery1">

					Ocean Shipping
				</p>

				<div class="card-body-row delivery">

					<div class="select mb-3 ">

						<select class="slim-select-2 ocean_data" data-ocean1 name="ocean_id1" id="ocean_shipping1">
							<option value="">None</option>
						</select>

					</div>

					<p class="mt-2">$<span class="ocean_fee"></span> USD</p>

				</div>

			</form>

				<p>@lang('lotdetail.pricing_calculation')</p>

			</div>

			<div class="card-body-top total-summ total_cost_usa">

				<p>@lang('lotdetail.total_cost'):</p>

				<p>$<strong class="total_cost_price"></strong> USD</p>

			</div>

			

		</div>


	</div> -->

  <input type="hidden" name="start_date" value="{{$data['auction']->start_date}}">

      <input type="hidden" name="end_date" value="{{$data['auction']->end_date}}">

<div class="col-lg-6 col-xl-7">
          <div class="row">
            <div class="col-xl-7">
              <div class="card card-product">
                      <div class="card-body">
                        <div class="details-list">
                          <div class="details-list__item">
                            <div class="details-list__label-wrap">
                              <div class="card-product__notify">Скопировано</div>
                            <p class="details-list__label">@lang('lotdetail.vin')<span class="text-copy">{{$data['lot']->vin}}</span></p>
                                <span class="copy-value copy-btn" ><img src="{{asset('frontend/images/copy-icon.svg')}}" alt=""></span>
                            </div>
                            
                            <!-- <a href="#" class="btn-transparent btn-border">@lang('lotdetail.check_vin_history')</a> -->

                          </div>
                          <div class="details-list__item">
                            <div class="details-list__label-wrap">
                              <div class="card-product__notify">Скопировано</div>
                              <p class="details-list__label">@lang('lotdetail.lot_number')<span class="text-copy"> {{$data['lot']->lot_no}}</span></p>
                              <span class="copy-value copy-btn"><img src="{{asset('frontend/images/copy-icon.svg')}}" alt=""></span>
                            </div>
                            
                          </div>
                          <div class="details-list__item mb-none">


                            <p class="details-list__label color_green">@lang('lotdetail.sale_man'):<span>    @if($data['auction']->saleman=="INSURANCE COMPANY")

                             <dd><p class="color-green">{{$data['auction']->saleman}}</p></dd>

                            @elseif($data['auction']->saleman=="DEALER")

                             <dd><p class="color-red">{{$data['auction']->saleman}}</p></dd>

                            @else

                             <dd><p class="color-gray">{{$data['lot']->seller}}</p></dd>

                            @endif</span></p>
                          </div>
                          <div class="details-list__item mb-1">
                            <p class="color_black"><img src="{{asset('frontend/images/icon/calendar-week-icon.png')}}" alt=""><span>{{isset($data['lot']->trading_date) ? date('F-d-Y H:i A' , strtotime($data['lot']->trading_date)) : ''}}</span></p>
                          </div>
                          <div class="details-list__item mb-1">
                            <p class="color_black"><img src="{{asset('frontend/images/icon/pin-icon.png')}}" alt=""><span>{{$data['lot']->locationName}}</span></p>
                          </div>  
                        </div>

                      </div>
                  </div>

                  <div class="card card-product">
                      <div class="card-body-top">
                          <h3>@lang('lotdetail.demage')</h3>
                   </div>
                      <div class="card-body">
                        <dl class="details-list">
                          <dt><img src="{{asset('frontend/images/icon/file-icon.png')}}" alt="">@lang('lotdetail.document_type')</dt>
                          <dd><p class="color-green">{{$data['lot']->document_type}}</p></dd>

                          <dt><img src="{{asset('frontend/images/icon/car-crash-icon.png')}}" alt="">@lang('lotdetail.primary_damage')</dt>
                          <dd>{{$data['lot']->primary_damage}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/car-crash-icon.png')}}" alt="">@lang('lotdetail.secondary_damage')</dt>
                          <dd>{{$data['lot']->secondary_damage}}</dd>
                        </dl>
                      </div>
                  </div>

            </div>

            <div class="col-xl-5">
              <div class="card card-product padding-none card-info-rate-timer_wrapper">
                         <div class="card-info-rate-timer countdown">
                       {{--  <div>0 <span>days</span></div>
                        <div>06 <span>Hour</span></div>
                        <div>45 <span>Min</span></div>
                        <div>33 <span>sec</span></div> --}}
                      </div>
                      <div class="card-info-rate__wrapper">
                        <div class="card-info-rate-price">
                      <p class="starting_price">$ {{ $data['starting_price']}}  USD</p>
                      <span>@lang('lotdetail.current_rate')</span>
                    </div>
                      
                       <div class="px-3">
                      @if($data['lot']->buy_now>0)
                      
                      <button data-toggle="modal"  data-target="#modal-rate" class="btn btn-dark-blue btn-big mb-4 mt-4 bidbutton">@lang('lotdetail.buy_now')</button>

                      @else
                      <div class="group-input calc-input">

                        <button class="down_count btn btn-info" title="Down"><i class="far fa-minus"></i></button>

                        <input class="counter" type="text" placeholder="value..." value="0" />    

                        <button class="up_count btn btn-info" title="Up"><i class="far fa-plus"></i></button>

                      </div>
                     @if(Auth::check())
                      <button data-toggle="modal"  data-target="#modal-rate" class="btn btn-dark-blue btn-big mb-4 mt-4 bidbutton">
                      @lang('lotdetail.place_bit')</button>
                      @else
                      <button data-toggle="modal" data-target="#loginModal" class="btn btn-dark-blue btn-big mb-4 mt-4">
                       <i class="fa fa-lock" aria-hidden="true"></i>    @lang('lotdetail.place_bit')</button>
                      @endif
                      @endif
                      
                    </div>
                     @if(Auth::check())
                     @if(empty(Auth::user()->address))
                    <div class="modal-footer-block-red">
                      @php
                        $user_id=0;
                      @endphp
                      @if(Auth::check())
                        @php
                          $user_id=Auth::user()->id;
                        @endphp
                      @endif
                      <p><a href="{{url(app()->getLocale().'/usersettings/'.$user_id.'?'.'type=Address')}}" class="link-decor-blue">@lang('lotdetail.your_profile')</a> @lang('lotdetail.empty_text')</p>
                    </div>
                    @endif
                    @endif

                      <div class="winning-bet__block d-none">
                        <span>@lang('lotdetail.predicted_winning_rate')</span>
                        <div>$1 <strong>250</strong> USD - $ <strong>2 250</strong> USD</div>
                      </div>
                      <div class="buy-now__block mt-3">
                        @if($data['lot']->buy_now > 0)
                        <button data-toggle="modal" data-target="" class="btn btn-blue btn__big mb-2">
                          <span class="buy-now__price">{{$data['lot']->buy_now}}</span>
                          <span>@lang('lotdetail.buy_now')</span>
                        </button>
                        @endif
                        <div class="reserve__block">
                          <a href="">@lang('lotdetail.seller_reserve'): $ 7500 USD</a>
                        </div>
                      </div>
                      </div>
                      <div class="card-info-rate__bottom">
                          <div class="card-info-rate__bottom-item">
                            <span>@lang('lotdetail.retail_sales_cost'):</span>
                            <span><strong>$45 250 USD</strong></span>
                          </div>
                          <div class="card-info-rate__bottom-item">
                            <span>@lang('lotdetail.sale_status'):</span>
                            <span><strong>Min. bid</strong></span>
                          </div>  
                      </div>
                      </div>
               </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="card card-product bb-none">
                <div class="card-body-top">
                        <h3>@lang('lotdetail.price_calculator')</h3>
                     </div>

                     <div class="card-body">
                        <div class="row">
                          <div class="col-xl-6 card-product__calc">
                            <p class="title-p card-product__sub-title"><img src="{{asset('frontend/images/icon/cash-icon.png')}}" alt="">@lang('lotdetail.price_and_additional_costs')</p>
                              <div class="card-price-tab sidebar-nav mb-4">
                                <div class="card-price-tab__label"><span class="fal fa-dollar-sign"></span>USD</div>
                                 <div id="bid_value_form" >
                                    {{csrf_field()}}
                                    <input type="text" name="bid_value" value="" class="bid_value">
                                    
                                  </div>
                               </div>

                               <dl class="details-list">

                                <dt>{{$data['lot']->brand}} Fee</dt>

                                <dd><p>$ <span class="copart_fee"></span> USD</p> </dd>

                                <dt>@lang('lotdetail.documentation_fee')</dt>

                                <dd>$55<input type="hidden" name="document_fee" value="@lang('lotdetail.fee_price')"> USD</dd>

                                <dt>@lang('lotdetail.tarnsction')</dt>

                                <dd>$349<input type="hidden" name="transction_price" value="@lang('lotdetail.transction_price')"> USD</dd>

                                <dt><strong>@lang('lotdetail.total_price'):</strong></dt>

                                <dd><p><strong>$<span class="total_price_fee"></span> USD</strong></p></dd>

                              </dl>

                          </div>
                          <div class="col-xl-6">
                            <div class="card-product__delivery-option ">
                              <p class="title-p mt-4 usa"><img src="{{asset('frontend/images/icon/truck-flatbed-icon.svg')}}" alt="" >
                              @lang('lotdetail.delivery_to')<br>
                              <span><input type="radio" name="usa" class="check-style" value="USA"> USA</span>
                              <span><input type="radio" name="usa" value="Others" class="check-style">Others</span>
                                
                               </p>
                              </div>
                              <form>
                              <div class="form-group zip_code">
                                <input type="text" name="zip_code"  class="form-control zip_code_search" placeholder="Zip Code">
                              </div>
                            </form>
                              <div class="card-product__info-block">
                                <span>@lang('lotdetail.the_price_is_calculated_for'):</span>
                                <p>@lang('lotdetail.standart_vehicle_size')(@lang('lotdetail.sedan'))</p>
                              </div>

                           <form id="shipping_form" method="post">
                              {{csrf_field()}}   
                              <p class="title-p mt-4 delivery1">
                                @lang('lotdetail.ground_shipping')
                              </p>
                               <div class="card-body-row card-product__select delivery">
                                <div class="select mb-3">
                                  <select class="slim-select-2 ground_shipping_data" data-shipping name="id" >

                                      <option value="">Ground Shipping</option>
                                      @foreach($data['ground_shipping'] as $key=>$value)
                                          <option value="{{$value->id}}">{{$value->name}}</option>
                                      @endforeach

                                </select>
                                </div>
                                <p class="mt-3">$<span class="ground_fee"></span> USD</p>
                               </div>

                               <p class="title-p delivery1">
                                 @lang('lotdetail.ocean_shipping')
                               </p>
                               <div class="card-body-row card-product__select delivery">
                                <div class="select mb-3">
                                  <select class="slim-select-2 ocean_data" data-ocean name="ocean_id" id="ocean_shipping">
                                    <option value="">None</option>
                                  </select>
                                </div>
                                <p class="mt-2">$<span class="ocean_fee"></span> USD</p>

                                </form>
                               </div>
                                <div class="details-list__logistics mt-4">
                                <div><strong>@lang('lotdetail.pricing_calculation')</strong></div>
                               
                              </div>
                          </div>
                        </div>

                     </div>
                  </div>
                  <div class="card-body-top total-summ__product total_cost_usa">
                       <p>@lang('lotdetail.total_cost'):</p>

                        <p>$<strong class="total_cost_price"></strong> USD</p>
                     </div>
            </div>
          </div>

<div class="modal" tabindex="-1" role="dialog" id="loginModal">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">@lang('lotdetail.login_or_register')</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <p class="war-message">@lang('lotdetail.registered_users_only_msg')</p>

      <div class="row">
        
        <div class="col-md-6">
        <a href="{{url(app()->getLocale().'/userregister')}}" class="btn-blue btn-red btn btn-primary w-100"> @lang('lotdetail.create_new_account')</a>
        </div>
        <div class="col-md-6">
        <a href="{{url(app()->getLocale().'/login')}}" class="btn-blue btn-red btn btn-secondary w-100">@lang('lotdetail.login_now')</a>
        </div>

     </div>

      </div>

    </div>

  </div>

</div>
@include('frontend.lots.bid_modal')


<script type="text/javascript">
	
 

</script>