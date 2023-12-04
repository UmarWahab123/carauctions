@extends('frontend.layout.header')



@section('content')

 <div class="header__slider">

            <div class="home-slider">

                <div class="home-slider__item" style="background-image: url('{{asset('/frontend/images/src/slider-1.jpg')}}">

                    <div class="container">

                        <div class="home-slider__content">

                            <h2>@lang('home_page.buy_car')<br> @lang('home_page.us_auction')</h2>

                            <p>@lang('home_page.buy_sub_car')</p>

                        </div>

                    </div>



                </div>

            </div>

        </div>

	<section class="section-search-lots" id="search-section">

		<div class="search-lots-wrap">

			<div class="container">

				<div class="row">

					<div class="col-12">

						<div class="search-lots-top">

							<div class="search-lots-top-title">

								<h3 class="d-flex align-items-center justify-content-between">

									@lang('home_page.find_lots')

								</h3>

								<p>@lang('home_page.copart_text')</p>

							</div>

							<div class="search-lots-top-brand">

								<div><img src=" {{asset('/frontend//images/src/brand-1.jpg')}}" alt=""></div>

								<div><img src=" {{asset('/frontend//images/src/brand-2.jpg')}}" alt=""></div>



								<div><img src=" {{asset('/frontend//images/src/brand-3.jpg')}}" alt=""></div>

							</div>

						</div>



					</div>

				</div>

				<div class="row">

					<div class="col-md-12">

					@include('frontend.home.search_form')

					</div>

				</div>







			</div>

		</div>

	</section>

	<section class="section-advantages">

		<div class="container">

			<div class="row">

				<div class="col-md-3 advantage-item">

					<span></span>

					<h3>@lang('home_page.low_text') <br> @lang('home_page.commission')</h3>

				</div>

				<div class="col-md-3 advantage-item">

					<span></span>

					<h3>@lang('home_page.high_level')<br> @lang('home_page.service').</h3>

				</div>

				<div class="col-md-3 advantage-item">

					<span></span>

					<h3>@lang('home_page.full_range') <br>@lang('home_page.service').</h3>

				</div>

				<div class="col-md-3 advantage-item">

					<span></span>

					<h3>@lang('home_page.delivery')<br> @lang('home_page.port_world').</h3>

				</div>

			</div>

		</div>

	</section>

	<section class="section-purchase-scheme">

		<div class="container">

			<h2 class="h2-style-main">@lang('home_page.purchase_data')</h2>

			<div class="row">

				<div class="col-md-6 col-lg-3 mt-4">

					<div class="card">

						<div class="card-scheme" style="background-image: url({{asset('/frontend/images/src/register.png')}});">

						</div>

						<div class="card-block">

							<h4 class="card-title">@lang('home_page.registration')</h4>

							<div class="card-text">

								@lang('home_page.register_text')



							</div>

						</div>

					</div>

				</div>

				<div class="col-md-6 col-lg-3 mt-4">

					<div class="card">

						<div class="card-scheme" style="background-image: url({{asset('/frontend/images/src/search.png')}});">

						</div>

						<div class="card-block">

							<h4 class="card-title">@lang('home_page.place_bid')</h4>

							<div class="card-text">

								@lang('home_page.bid_text')

							</div>

						</div>

					</div>

				</div>

				<div class="col-md-6 col-lg-3 mt-4">

					<div class="card">

						<div class="card-scheme" style="background-image: url({{asset('/frontend/images/src/pay.png')}});">

						</div>

						<div class="card-block">

							<h4 class="card-title">@lang('home_page.pay_purchase')</h4>

							<div class="card-text">

								@lang('home_page.pay_purchase_text')

							</div>

						</div>

					</div>

				</div>

				<div class="col-md-6 col-lg-3 mt-4">

					<div class="card">

						<div class="card-scheme" style="background-image: url({{asset('/frontend/images/src/bid.png')}});">

						</div>

						<div class="card-block">

							<h4 class="card-title">@lang('home_page.track_order')</h4>

							<div class="card-text">

								@lang('home_page.track_order_text')

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</section>

	<section class="section-catalog-lot">

			<div class="container">

				<div class="row">

				<div class="col-md-12">

					<h2 class="h2-style-main">@lang('home_page.excellents_savings')</h2>

				</div>

			</div>

			</div>

			

		   {{-- Lot Section --}}



		   @include('frontend.home.lot_section')

			<div class="container">

				<div class="navigation">

				<div class="progress"></div>

				<div class="card-slider-arrows"></div>

			</div>

			</div>

		

	</section>

	<section class="section-why">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<h2 class="h2-style-main">@lang('home_page.worth_buying')</h2>

				</div>

			</div>

			<div class="row">

				<div class="col-md-6 col-lg-3">

					<div class="box box-why">

						<div class="img">

							<img src="{{asset('/frontend/images/src/usa.png')}}">

						</div>

						<h2>@lang('home_page.car_market')</h2>

						<p>@lang('home_page.car_market_text')</p>



					</div>

				</div>

				<div class="col-md-6 col-lg-3">

					<div class="box box-why">

						<div class="img">

							<img src="{{asset('/frontend/images/src/online-instrument.png')}}">

						</div>

						<h2>@lang('home_page.shopping_tools')</h2>

						<p>@lang('home_page.shopping_tools_text')</p>



					</div>

				</div>

				<div class="col-md-6 col-lg-3">

					<div class="box box-why">

						<div class="img">

							<img src="{{asset('/frontend/images/src/price.png')}}">

						</div>

						<h2>@lang('home_page.affordable_price')</h2>

						<p>@lang('home_page.affordable_price_text')</p>



					</div>

				</div>

				<div class="col-md-6 col-lg-3">

					<div class="box box-why">

						<div class="img">

							<img src="{{asset('/frontend/images/src/auto.png')}}">

						</div>

						<h2>@lang('home_page.huge_selection')</h2>

						<p>@lang('home_page.huge_selection_text')</p>



					</div>

				</div>

				<div class="col-md-6 col-lg-3">

					<div class="box box-why">

						<div class="img">

							<img src="{{asset('/frontend/images/src/easy.png')}}">

						</div>

						<h2>@lang('home_page.get_started')</h2>
						<p>@lang('home_page.get_started_text')</p>


					</div>

				</div>

				<div class="col-md-6 col-lg-3">

					<div class="box box-why">

						<div class="img">

							<img src="{{asset('/frontend/images/src/addited.png')}}">

						</div>

						<h2>@lang('home_page.additional_services')</h2>

						<p>@lang('home_page.additional_services_text')</p>



					</div>

				</div>

				<div class="col-md-6 col-lg-3">

					<div class="box box-why">

						<div class="img">

							<img src="{{asset('/frontend/images/src/delivery.png')}}">

						</div>

						<h2>@lang('home_page.reliable_delivery')</h2>

						<p>@lang('home_page.reliable_delivery_text')</p>



					</div>

				</div>

				<div class="col-md-6 col-lg-3">

					<div class="box box-why">

						<div class="img">

							<img src="{{asset('/frontend/images/src/shield.png')}}">

						</div>

						<h2>@lang('home_page.insurance')</h2>

						<p>@lang('home_page.insurance_text')</p>



					</div>

				</div>

			</div>

		</div>

	</section>

	<section class="section-register">

		<div class="register-wrapper">

			<div class="container">

			<div class="row">

				<div class="col-xl-6">

					<div class="about-block-content styled-list">

						<div class="container">

							<div class="row">

								<div class="col-md-12">

									<h2>@lang('home_page.AlfaMotors')</h2>

									<p>@lang('home_page.AlfaMotors_para')

									</p>

									<br>

									<br>

									<h3>@lang('home_page.registration_work')</h3>

									<br>

									<ul><li>@lang('home_page.registration_li')</li>

										<li>@lang('home_page.registration_lis')</li>

										<li>@lang('home_page.registration_lit')</li>

									</ul>

										<div class="about-item-statistics">

											<div class="about-item">

												<p>@lang('home_page.num')</p>

												<span>@lang('home_page.year_exp')</span>

											</div>

											<div class="about-item">

												<p><strong>@lang('home_page.num2')</strong></p>

												<span>@lang('home_page.countries')</span>

											</div>

											<div class="about-item">

												<p>>@lang('home_page.num3') <small>@lang('home_page.thous')</small></p>

												<span>@lang('home_page.cars')</span>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="col-xl-6">

						<div class="login-page-form">

							<div class="login-page-form-wrap">

								<h2 class="h2-style">@lang('home_page.register_form')</h2>

								<span class="span-style">@lang('home_page.free')</span>



								<form action=""  method="post" id="register_form" class="form-page">

				  	 				{{csrf_field()}}

								<div class="row">

									<div class="col-md-12">

	              					<div class="form-group card-input">

	 									<!-- <label for="input-1" class="form-label" >@lang('home_page.lab_name')</label> -->

	              						<input type="text" id="input-1" name='name' required placeholder="@lang('home_page.lab_name')">


	              					</div>

	              				</div>

	              				<div class="col-md-12">

	              					<div class="form-group card-input">

	              					<!-- 	<label for="input-2" class="form-label" >@lang('home_page.lab_email')</label> -->

	              						<input type="text" id="input-2" name='email' required placeholder="@lang('home_page.lab_email')">

	              					</div>

	              				</div>

	              				<div class="col-md-12">

	              					<div class="form-group card-input">

	              						<!-- <label for="input-3" class="form-label" >@lang('home_page.lab_pass')</label> -->

	              						<input type="password " class="password" id="input-3"  name='password' required placeholder="@lang('home_page.lab_pass')">

	              					</div>

	              				</div>

	              				<div class="col-md-12">

	              					<div class="form-group card-input">

	              						<!-- <label for="input-4" class="form-label" >@lang('home_page.lab_cpass')</label> -->

	              						<input type="password" id="input-4" class="confirm_password" id="confirm_password" required placeholder="@lang('home_page.lab_cpass')">

	              						<span id='message'></span>

	              					</div>

	              				</div>

	              				<div class="col-md-12">

								   <div class="check-wrap check-register">

						  		    <label for="check" class="chek-label">

									  <input type="checkbox" id="check" class="chek-styled">

							 		 <span class="checkmark"></span></label>

							 		 <p style="font-size: 14px;">@lang('home_page.term_guide_text')<a href="" style="color: #0000ff;">@lang('home_page.term_guide_text')</a></p>

						     		</div>

						 		</div>

	            			  	</div>

	              			<button type="submit" class="btn btn-register btn-dark-blue" id="button_disable">@lang('home_page.reg_button')</button>

							</form>

								<h4>@lang('home_page.use_login')</h4>

								<div class="form-row-social-account list-inline">





									<a href="{{url('/redirectfacebook')}}" class="s-facebook active">

                                       <img src="{{asset('/frontend/images/icon/facebook.svg')}}">

										@lang('home_page.facebook_log')</a>





									<a href="{{url('/redirect')}}" class="s-google"><img src="{{asset('/frontend/images/icon/google.svg')}}" alt="">@lang('home_page.google_log')</a>







								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		</section>



		<div class="section-possibilities">

			<div class="container">

				<h2 class="h2-style-main">@lang('home_page.key_feature')<br> @lang('home_page.key_features')</h2>

				<div class="row">

					<div class="col-md-5">

					<div class="nav nav-tabs nav-possibilities" id="nav-tab" role="tablist">

							<a class="nav-item nav-link-possibility active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1-tab" aria-selected="true">@lang('home_page.retail_value')</a>

							<a class="nav-item nav-link-possibility" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2-tab" aria-selected="false">@lang('home_page.repair_cost')</a>

							<a class="nav-item nav-link-possibility" id="nav-3-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3-tab" aria-selected="false">@lang('home_page.predicted_winning')</a>

							<a class="nav-item nav-link-possibility" id="nav-4-tab" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4-tab" aria-selected="false">@lang('home_page.full_vin')</a>

							<a class="nav-item nav-link-possibility" id="nav-5-tab" data-toggle="tab" href="#nav-5" role="tab" aria-controls="nav-5-tab" aria-selected="false">@lang('home_page.seller_details')</a>	

							<a class="nav-item nav-link-possibility" id="nav-6-tab" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6-tab" aria-selected="false">@lang('home_page.advanced_filter')</a>			



						</div>

				</div>

				<div class="col-md-7">

					<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

						<div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">

							<div class="pane-img">

								<img src="{{asset('/frontend/images/src/tabs-image-1.svg')}}" alt="">

							</div>

							<div class="pane-content">

								<p>@lang('home_page.retail_value_text')</p>

							</div>

							</div>

							<div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">

							<div class="pane-img">

								<img src="{{asset('/frontend/images/src/promo-icon.png')}}" alt="">

							</div>

							<div class="pane-content">

								<p>@lang('home_page.repair_cost_text')</p>

							</div>

						</div>

						<div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">

							<div class="pane-img">

								<img src="{{asset('/frontend/images/src/sheme-img1.png')}}" alt="">

							</div>

							<div class="pane-content">

								<p>@lang('home_page.predicted_winning_text')</p>

							</div>

						</div>

						<div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">

							<div class="pane-img">

								

								<img src="{{asset('/frontend/images/src/sheme-img1.png')}}" alt="">

							</div>

							<div class="pane-content">

								<p>@lang('home_page.full_vin_text')</p>

							</div>

						</div>

						<div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-5-tab">

							<div class="pane-img">

								

								<img src="{{asset('/frontend/images/src/sheme-img1.png')}}" alt="">



							</div>

							<div class="pane-content">

								<p>@lang('home_page.seller_details_text')</p>

							</div>

						</div>

						<div class="tab-pane fade" id="nav-6" role="tabpanel" aria-labelledby="nav-6-tab">

							<div class="pane-img">

								<img src="{{asset('/frontend/images/src/sheme-img1.png')}}" alt="">

							</div>

							<div class="pane-content">

								<p>@lang('home_page.advanced_filter_text')</p>

							</div>

						</div>

						

					</div>	

				</div>

				</div>

			</div>

		</div>



@endsection

@section('js')

		<script src="{{ asset('frontend/js/filter.js')}}" ></script>


<script type="text/javascript">

	 

 $(document).ready(function(){

    

    $(document).on('click','.add_bookmark',function(){

     var user_id=$(this).parents('.card').find(".book_mark").attr('data-id');

     // alert(user_id);

     var _token = $("input[name=_token]").val();

     var lot_id=$(this).parents('.card').find(".book_mark").attr('data-lot');

     var bookmark=$(this).parents('.card').find(".book_mark").attr('data-bookmark');

     // alert(user_id);

     console.log(bookmark,lot_id,user_id)

     var currentvalue= $(this);

     var formdata={'user_id':user_id,'lot_id':lot_id,"bookmark":bookmark, _token:_token};

     console.log("fomrdata",formdata)

        $.ajax({

                type: "post",

                url: "{{url(app()->getLocale().'/savebookmark') }}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                 console.log(data.response);

                 if(bookmark==0){

                 currentvalue.attr('data-bookmark',1);

                 currentvalue.parents('.card').find(".book_mark").addClass('active');
               Swal.fire('Bookmark Successfully.')

                 }else{

                 	 currentvalue.attr('data-bookmark',0);

                    currentvalue.parents('.card').find(".book_mark").removeClass('active');
                    Swal.fire('Removed From Bookmark Successfully.')


                 }

                }

            });

    });

 

 }); 

	$('#password, #confirm_password').on('keyup', function () {

    if ($('#password').val() == $('#confirm_password').val()) {

        $('#message').html('Matching').css('color', 'green');

    } else 

        $('#message').html('Not Matching').css('color', 'red');

});



		 $("#button_disable").prop('disabled', true);
		    
		    $( "#check" ).click(function() {


		      if ($(this).is(':checked')) {
		            $('#button_disable').prop('disabled', false);
		        } else {
		            $('#button_disable').prop('disabled',true);
		        }
		      // $("#button_disable").prop('disabled', false);
		  });

         $(document).ready(function () {

        $(document).on('keyup','.password, .confirm_password',function(){

        	// console.log($('.confirm_password'));

            if ($('.password').val() == $('.confirm_password').val()) {

        $('#message').html('Matching').css('color', 'green');

  			  } else {

      	  $('#message').html('Not Matching').css('color', 'red');

      	}

          });  


        $("#register_form").submit(function(e) {

         e.preventDefault();

         var formdata = $(this).serialize();

         $.ajax({
                    type:"post",
                    headers: "{'X-CSRF-TOKEN': token}",
                    url: "{{url(app()->getLocale().'/userregister') }}",
                    dataType: "json",
                    data:formdata,
                    success:function(data)
                    {
                        if(data.status==1)
                        {
                          Swal.fire({
                            icon: 'success',
                            title: 'Congratulation!',
                            text: data.response,

                          })

                        }
                        else
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: data.response,

                          })
                        }

                        $("#register_form").trigger("reset");

                    }
                })

        });



    });  

</script>

@endsection