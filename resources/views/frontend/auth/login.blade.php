@extends('frontend.layout.header')



@section('content')

 

 	<div class="login-page">

		<div class="login-page-form">

			<div class="login-page-form-wrap">

				<h2 class="h2-style">@lang('login.site_login')</h2>



				<div class="form-row-social-account list-inline">

						<a href="{{url('/redirectfacebook')}}" class="s-facebook active"><img src="{{asset('/frontend/images/icon/facebook.svg')}}" alt="">@lang('login.facebook_login')</a>

						<a href="{{url('/redirect')}}" class="s-google"><img src="{{asset('/frontend/images/icon/google.svg')}}" alt="">@lang('login.google_login')</a>

				</div>



				<h4>@lang('login.login_account')</h4>



				<form action="{{url(app()->getLocale()."/customerlogin")}}" method="post" class="form-page">

			  	 {{csrf_field()}}

					<div class="row">

              		<div class="col-md-12">

              			<div class="form-group card-input">
              				<label>@lang('register_page.email')</label>
              				<input type="text" id="input-1" name="email" required>


              			</div>

              		</div>

              		<div class="col-md-12">

              			<div class="form-group card-input">

              				
              				<label>@lang('register_page.password')</label>
              				<input type="password" id="input-2" name="password" required>

              			</div>
              			<div class="form-group text-right">
              				<span ><a href="{{url(app()->getLocale().'/forgot_password')}}">@lang('login.forgot_password')</a></span><br>
              			</div>

              		</div>

              	</div>
              	@if(Session::has('message'))
					@php
						$message = Session::get('message');
						Session::forget('message');
					@endphp
					<p><b class="text-center">{{$message['text']}}</b></p>
				@endif

              	<button type="submit"  class="btn btn-register btn-dark-blue">@lang('login.login')</button>

				</form>

				<div class="register-page-link"><p>@lang('login.donot_account')  <a href="{{url(app()->getLocale().'/userregister')}}">@lang('login.regsiter_now')</a></p></div>

			</div>

		</div>



	</div>

  

 

@endsection