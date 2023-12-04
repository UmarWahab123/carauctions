@extends('frontend.layout.header')



@section('content')



	<section class="section-main pb-70 ">

		<div class="container">

			<div class="row">

			@include('frontend.lots.info')

			{{-- <div class="countdown"></div> --}}

			@include('frontend.lots.bet_info')

			@include('frontend.lots.bid_info')

			</div>

		</div>

		

	</section>

  


<!-- NEW -->
<hr class="d-none">
<section class="section-main pb-70">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-12">
          <div class="cart-product-title">
            <img src="{{asset('')}}frontend/images/icon/r-icon.svg" alt="">
            <h2>{{ $data['lot']->lot_title}}</h2>
                    <span class="book_mark active fas fa-bookmark" data-toggle="modal" data-target="#remove-bookmarks"></span>
                    <!-- <span class="book_mark fas fa-bookmark active"></span> -->
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12 col-xl-5">

        <div class="cart-product">    
          <div class="image-gallery">
            <main class="lightgallery">
              <a href="{{url($data['lot']->feature_image)}}">
                <img src="{{url($data['lot']->feature_image)}}" class="product-image" alt="">
              </a>
            </main>
            <aside class="thumbnails image-list thumbs-images-wrap">
              @foreach($data['lot_images'] as $key=>$value)
              <a href="#" class="{{$key==0 ? 'selected' : ''}} thumbnail" data-big="{{url($value->images)}}">
                <div class="thumbnail-image" style="background-image: url({{url($value->images)}})"></div>
              </a>
              @endforeach

              <a href="#" class=" thumbnail" data-big="{{url($data['lot']->feature_image)}}">

                <div class="thumbnail-image" style="background-image: url({{url($data['lot']->feature_image)}})"></div>

              </a>
             
            </aside>
          </div>      
  
                
        </div>  


            <div class="card card-product">
                  <div class="card-body-top">
                          <h3>@lang('lotdetail.vehicle')</h3>
                   </div>
                    <div class="card-body">
                      <dl class="details-list">
                        <dt><img src="{{ asset('frontend/images/icon/speed-icon.png')}}" alt="">@lang('lotdetail.mileage')</dt>
                        <dd>{{$data['lot']->mileage}}</dd>

                        <dt><img src="{{asset('frontend/images/icon/car-icon.png')}}" alt="">@lang('lotdetail.body_type')</dt>
                        <dd>{{$data['lot']->body_style}}</dd>

                        <dt><img src="{{asset('frontend/images/icon/car-color-icon.png')}}" alt="">@lang('lotdetail.color')</dt>
                        <dd>{{$data['lot']->color}}</dd>

                        <dt><img src="{{asset('frontend/images/icon/car-engine-icon.png')}}" alt="">@lang('lotdetail.engine_type')</dt>
                        <dd>{{$data['lot']->engine_type}}</dd>

                        <dt><img src="{{asset('frontend/images/icon/piston-icon.png')}}" alt="">@lang('lotdetail.cyclinder')</dt>
                        <dd>{{$data['lot']->cylinder}}</dd>

                        <dt><img src="{{asset('frontend/images/icon/petrol-icon.png')}}" alt="">@lang('lotdetail.fuel')</dt>
                        <dd>{{$data['lot']->fuel}}</dd>

                        <dt><img src="{{asset('frontend/images/icon/wheel-alignment-icon.png')}}" alt="">@lang('lotdetail.transmission')</dt>
                        <dd>{{$data['lot']->transmission}}</dd>

                        <dt><img src="{{asset('frontend/images/icon/car-key-icon.png')}}" alt="">@lang('lotdetail.key')</dt>
                        <dd>{{$data['lot']->key}}</dd>
                      </dl>
                    </div>
                </div>


        </div>
        <div class="col-lg-6 col-xl-7">
          <div class="row">
            <div class="col-xl-7">
              <div class="card card-product">
                      <div class="card-body">
                        <div class="details-list">
                          <div class="details-list__item">
                            <div class="details-list__label-wrap">
                              <p class="details-list__label">VIN <span class="text-copy"> {{$data['lot']->vin}}</span></p>
                                <span class="copy-value copy-btn" ><img src="{{asset('frontend/images/icon/copy-icon.svg')}}" alt=""></span>
                            </div>
                            
                            <a href="https://vin.doctor/en/" class="btn-transparent btn-border">Check VIN history</a>

                          </div>
                          <div class="details-list__item">
                            <div class="details-list__label-wrap">
                              <p class="details-list__label">@lang('lotdetail.lot_number')<span class="text-copy"> {{$data['lot']->lot_no}}</span></p>
                              <span class="copy-value copy-btn"><img src="{{asset('frontend/images/icon/copy-icon.svg')}}" alt=""></span>
                            </div>
                            
                          </div>
                          <div class="details-list__item">


                            <p class="details-list__label color_green">@lang('lotdetail.sale_man'):<span>    @if($data['auction']->saleman=="INSURANCE COMPANY")

                             <dd><p class="color-green">{{$data['auction']->saleman}}</p></dd>

                            @elseif($data['auction']->saleman=="DEALER")

                             <dd><p class="color-red">{{$data['auction']->saleman}}</p></dd>

                            @else

                             <dd><p class="color-gray">{{$data['auction']->saleman}}</p></dd>

                            @endif</span></p>
                          </div>
                          <div class="details-list__item mb-1">
                            <p class="color_black"><img src="{{asset('frontend/images/icon/calendar-week-icon.png')}}" alt=""><span>Dec 22 2021, 17:30 (+03)</span></p>
                          </div>
                <div class="details-list__item mb-1">
                            <p class="color_black"><img src="{{asset('frontend/images/icon/pin-icon.png')}}" alt=""><span>MS - Moss Point</span></p>
                          </div>  
                        </div>

                      </div>
                  </div>

                  <div class="card card-product">
                      <div class="card-body-top">
                          <h3>DAMAGE</h3>
                   </div>
                      <div class="card-body">
                        <dl class="details-list">
                          <dt><img src="{{asset('frontend/images/icon/file-icon.png')}}" alt="">@lang('lotdetail.document_type')</dt>
                          <dd><p class="color-green">{{$data['auction']->document_type}}</p></dd>

                          <dt><img src="{{asset('frontend/images/icon/car-crash-icon.png')}}" alt="">Primary Damage</dt>
                          <dd>{{$data['lot']->primary_damage}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/car-crash-icon.png')}}" alt="">Secondary Damage</dt>
                          <dd>{{$data['lot']->secondary_damage}}</dd>
                        </dl>
                      </div>
                  </div>

            </div>

            <div class="col-xl-5">
              <div class="card card-product padding-none card-info-rate-timer_wrapper">
                         <div class="card-info-rate-timer">
                        <div>0 <span>days</span></div>
                        <div>06 <span>Hour</span></div>
                        <div>45 <span>Min</span></div>
                        <div>33 <span>sec</span></div>
                      </div>
                      <div class="card-info-rate__wrapper">
                        <div class="card-info-rate-price">
                      <p>$ {{ $data['starting_price']}}  USD</p>
                      <span>@lang('lotdetail.current_rate')</span>
                    </div>

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

                      <div class="winning-bet__block">
                        <span>Predicted Winning Rate</span>
                        <div>$1 <strong>250</strong> USD - $ <strong>2 250</strong> USD</div>
                      </div>
                      <div class="buy-now__block mt-3">
                        <button data-toggle="modal" data-target="" class="btn btn-blue btn__big mb-2">
                          <span class="buy-now__price">$ 7400 USD</span>
                          <span>buy now</span>
                        </button>
                        <div class="reserve__block">
                          <a href="">Seller's reserve: $ 7500 USD</a>
                        </div>
                      </div>
                      </div>
                      <div class="card-info-rate__bottom">
                          <div class="card-info-rate__bottom-item">
                            <span>Retail sales cost:</span>
                            <span><strong>$45 250 USD</strong></span>
                          </div>
                          <div class="card-info-rate__bottom-item">
                            <span>Sale status:</span>
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
                            <h3>price calculator</h3>
                     </div>

                     <div class="card-body">
                        <div class="row">
                          <div class="col-xl-6 card-product__calc">
                            <p class="title-p card-product__sub-title"><img src="{{asset('frontend/images/icon/cash-icon.png')}}" alt="">Price and additional costs</p>
                              <div class="card-price-tab sidebar-nav mb-4">
                                <div class="card-price-tab__label"><span class="fal fa-dollar-sign"></span>USD</div>
                                 <form id="bid_value_form" method="POST">
                                    {{csrf_field()}}
                                    <input type="text" name="bid_value" value="" class="bid_value">
                                    
                                  </form>
                               </div>

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

                          </div>
                          <div class="col-xl-6">
                            <div class="card-product__delivery-option">
                              <p class="title-p mt-4 usa"><img src="{{asset('frontend/images/icon/truck-flatbed-icon.svg')}}" alt="" >
                               Delivery To<br>

                               <input type="radio" name="usa" class="check-style" value="USA"> USA <input type="radio" name="usa" value="Others" class="check-style"> Others
                               </p>
                             
                             
                              </div>
                              <form>
                              <div class="form-group zip_code">
                                <input type="text" name="zip_code"  class="form-control zip_code_search" placeholder="Zip Code">
                              </div>
                            </form>
                              <div class="card-product__info-block">
                                <span>The price is calculated for:</span>
                                <p>Standart Vehicle size (sedan)</p>
                              </div>

                           <form id="shipping_form" method="post">
                              {{csrf_field()}}   
                              <p class="title-p mt-4 delivery1">

                                Ground Shipping

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
                               Ocean shipping
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
        </div>

      </div>
    </div>
    
@include('frontend.lots.bid_modal')
    
  </section>




<!-- END -->

	@endsection


@section('js')

	<script type="text/javascript">

     $(document).ready(function() {

     	 $(document).on('submit','#buynow',function (e) {

           // alert('test');

           e.preventDefault();

           var min_price=parseFloat($('input[name="min_price"]').val());

           var bid_amount=parseFloat($('input[name="bid_amount"]').val());

           var lot_id=$('input[name="lot_id"]').val();

           var auction_id=$('input[name="auction_id"]').val();

           var user_id=$('input[name="user_id"]').val();

           // var formdata={"min_price":min_price,'bid_amount':bid_amount,'lot_id':lot_id,'auction_id':auction_id,'user_id':user_id};

           var formdata=$('#buynow').serialize();

           // console.log('bid_amount',bid_amount);

           // console.log('min_price',min_price);



           // console.log(formdata);



      //      if(bid_amount<min_price){

      //      	Swal.fire({

						//   icon: 'error',

						//   title: 'Invalid Bid!',

						//   text: 'Minimun bid must be greater than '+min_price,

						//   // footer: '<a href="">Why do I have this issue?</a>'

						// });

      //      	return null;

      //      }

            $.ajax({

                type: "post",

                url: "{{url(app()->getLocale().'/buynow') }}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                	// console.log(data.response);

                	Swal.fire({

						  icon: 'success',

						  title: 'Congratulation!',

						  text: 'Buy Now Request Send!',

						  // footer: '<a href="">Why do I have this issue?</a>'

						})

                 // $('.starting_price').html('$'+data.response.bid_amount+" USD");

                 // $('input[name="bid_amount"]').val(data.response.bid_amount);

                 // $('input[name="min_price"]').val(data.response.bid_amount);

                 $("#modal-rate").modal('hide');

                }

            });





      });



        $(document).on('submit','#bidform',function (e) {

           // alert('test');

           e.preventDefault();

           var min_price=parseFloat($('input[name="min_price"]').val());

           var bid_amount=parseFloat($('input[name="bid_amount"]').val());

           var lot_id=$('input[name="lot_id"]').val();

           var auction_id=$('input[name="auction_id"]').val();

           var user_id=$('input[name="user_id"]').val();

           // var formdata={"min_price":min_price,'bid_amount':bid_amount,'lot_id':lot_id,'auction_id':auction_id,'user_id':user_id};

           var formdata=$('#bidform').serialize();

           // console.log('bid_amount',bid_amount);

           // console.log('min_price',min_price);



           // console.log(formdata);



           if(bid_amount<min_price){

            Swal.fire({

              icon: 'error',

              title: 'Invalid Bid!',

              text: 'Minimun bid must be greater than '+min_price,

              // footer: '<a href="">Why do I have this issue?</a>'

            });

            return null;

           }

            $.ajax({

                type: "post",

                url: "{{url(app()->getLocale().'/placebid') }}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                  // console.log(data.response);

                  Swal.fire({

              icon: 'success',

              title: 'Congratulation!',

              text: 'Bid Placed!',

              // footer: '<a href="">Why do I have this issue?</a>'

            })

                 $('.starting_price').html('$'+data.response.bid_amount+" USD");

                 $('input[name="bid_amount"]').val(data.response.bid_amount);

                 $('input[name="min_price"]').val(data.response.bid_amount);

                 $("#modal-rate").modal('hide');

                }

            });





      });




     	 $.each( $(".lot_timer"), function() {

			$(this).countdown(moment.tz($(this).text(), "Europe/Berlin").toDate(), function (event) {

				$(this).html(event.strftime('%D DAYS %H:%M:%S'));

				if($(this).text()=="00 DAYS 00:00:00")

				{

					// location.reload();

				}

			});

		});
    var eventTime = $('input[name="start_date"]').val();
    // alert(eventTime);
    var currentTime = '{{$data['auction']->current_date}}';
    // alert(currentTime);
    var leftTime = eventTime - currentTime;//Now i am passing the left time from controller itself which handles timezone stuff (UTC), just to simply question i used harcoded values.
    // alert(eventTime);
    var duration = moment.duration(leftTime, 'seconds');
    var interval = 1000;
    setInterval(function(){
      // Time Out check
      if (duration.asSeconds() <= 0) {
        clearInterval(intervalId);
        window.location.reload(true); 
      }
      //Otherwise
      duration = moment.duration(duration.asSeconds() - 1, 'seconds');
       var time=`<div>`+duration.days()+` <span>Days</span></div>
				<div>`+duration.hours()+` <span>Hours</span></div>
				<div>`+duration.minutes()+` <span>Min</span></div>
				<div>`+duration.seconds()+` <span>Sec</span></div>`;
      $('.countdown').html(time);

    }, interval);


      })


      $('.bid_value').on('change', function() {
 
          var token = $('input[name=_token]').val();
          var bid_value = $('input[name=bid_value]').val();
          var type = "{{$data['lot']->brand}}";
          var formdata = {'_token':token,'bid_value':bid_value,'brand':type};

          $.ajax({

                type: "POST",

                headers: "{'X-CSRF-TOKEN':_token}",

                url: "{{url(app()->getLocale().'/bid_value')}}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                  $('.copart_fee').html(data.response);
                  var copart_fee = $('.copart_fee').html();
                  var document_fee = $('input[name=document_fee]').val();
                  var transction_price = $('input[name=transction_price]').val();
                  var total_price = Number(document_fee) + Number(transction_price) + Number(bid_value) + Number(copart_fee);
                  $('.total_price_fee').html(total_price);

              }
        
           });
        });

        $('.zip_code').addClass('d-none');
        // $('.total_cost_usa').addClass('d-none');
        $('.usa').on('click', function() {

          var delivery_to = $('input[name=usa]:checked').val();
          alert(delivery_to)

         if(delivery_to=="USA")
         {
            $('.zip_code').removeClass('d-none');
            $('.delivery').addClass('d-none');
            $('.delivery1').addClass('d-none');

         }

         else if(delivery_to=="Others")
         {
            $('.zip_code').addClass('d-none');
            $('.delivery').removeClass('d-none');
            $('.delivery1').removeClass('d-none');

         }

          $('.zip_code_search').on('change', function() {

            var token = $('input[name=_token]').val();
            var zip_code = $('input[name=zip_code]').val();
            var formdata = {'_token':token,'zip_code':zip_code,'type':delivery_to};

            $.ajax({

                  type: "POST",

                  headers: "{'X-CSRF-TOKEN':_token}",

                  url: "{{url(app()->getLocale().'/zip_code_search')}}",

                  data: formdata,

                  dataType:'json',

                  success: function(data) {

                    $('.total_cost_price').html(data.response);

                }
          
             });

           });

          $('.ground_shipping_dataa').on('change', function() {

            var token = $('input[name=_token]').val();
            var id = $('select[name=id]').val();
            var formdata = {'_token':token,'id':id};

            $.ajax({

                  type: "POST",

                  headers: "{'X-CSRF-TOKEN':_token}",

                  url: "{{url(app()->getLocale().'/ground_shipping_search')}}",

                  data: formdata,

                  dataType:'json',

                  success: function(data) {

                    $('.ground_fee').html(data.response);

                    $('.ocean_shipping').html(data.ocean);

                }
          
             });

          });

          $('.ocean_data').on('change', function() {

            var token = $('input[name=_token]').val();
            var id = $('select[name=ocean_id]').val();
            var formdata = {'_token':token,'ocean_id':id};

            $.ajax({

                  type: "POST",

                  headers: "{'X-CSRF-TOKEN':_token}",

                  url: "{{url(app()->getLocale().'/ocean_shipping_search')}}",

                  data: formdata,

                  dataType:'json',

                  success: function(data) {

                  $('.ocean_fee').html(data.response);

                  var ground_fee = $('.ground_fee').html();
                  var ocean_fee = $('.ocean_fee').html();

                  var total_ground_fee = Number(ground_fee) + Number(ocean_fee);

                  $('.total_cost_price').html(total_ground_fee);
                }
          
             });

          });

       });
	</script>

@endsection	

