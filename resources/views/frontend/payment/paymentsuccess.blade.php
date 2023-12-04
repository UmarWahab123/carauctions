@extends('frontend.layout.header')
@section('content')


	<section class="section-main section-cabinet">

		<div class="">

			<div class="row">

				<div class="col-md-5 col-lg-3">

					@include('frontend.dashboard.sidebar')

					

				</div>

				<div class="col-md-7 col-lg-9">

					<div class="section-info section-invoce">
						<div class="invoce-center">
							<div class="invoce-info">
								<h3 class="ml-5">You successfully created payment request</h3>
								<h6 class="ml-5">We process your payment with one working day after receive.</h6>
							</div>
								
						</div>
						<div class="invoce-btn" style="margin-left: 26%;">
							<a href="{{url(app()->getLocale().'/deposit')}}" class="btn  btn-dark-blue pl-4 pr-4">@lang('payment.make_deposit')</a>
						</div>
					</div>

				</div>

			</div>

		</div>

		

	</section>



@endsection	
