

		<footer class="footer">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-3 col-sm-6">
						<div class="footer-logo">
							<img  src="{{asset('/frontend/images/src/logo-text.svg')}}" alt="">
						</div>
						<div class="footer-address">
							<p>{{get_settings()->address}}</p>
						</div>
						<div class="footer-phone">
							<p><a href="">{{get_settings()->phone}}</a></p>
							
						</div>
						<div class="footer-email">
							<p>{{get_settings()->email}}</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<h4 class="">@lang('footer.services')</h4>
						<ul class="footer-nav">
							<li><a href="{{url(app()->getLocale().'/fees')}}">@lang('footer.commissions')</a></li>
							<li><a href="{{url(app()->getLocale().'/contactus')}}">@lang('footer.contact_us')</a></li>
							<li><a href="https://vin.doctor/en/">@lang('footer.vin_check')</a></li>
							<li><a href="{{url(app()->getLocale().'/faq')}}">@lang('footer.faq')</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6">
						<h4 class="">@lang('footer.user_information')</h4>
						<ul class="footer-nav">
							<li><a href="{{url(app()->getLocale().'/howto')}}">@lang('footer.how_it_works')</a></li>
							<li><a href="{{url(app()->getLocale().'/terms')}}">@lang('footer.terms_of_use')</a></li>
							<li><a href="{{url(app()->getLocale().'/privacy')}}">@lang('footer.privacy_policy')</a></li>
							
						</ul>
					</div>
					<div class="col-md-3 col-sm-6">
						<h4 class="mb-5">@lang('footer.follow_us')</h4>
						<div class="footer-social">
							<ul>
								<li><a href="" class="dark-icon"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="" class="dark-icon"><i class="fab fa-instagram"></i></a></li>
								<li><a href="" class="dark-icon"><i class="fab fa-youtube"></i></a></li>	
							</ul>
							<ul>
								<li><a href="" class="viber"><i class="fab fa-viber"></i></a></li>
								<li><a href="" class="whatsapp"><i class="fab fa-whatsapp"></i></a></li>

								<li><a href="" class="telegram"><i class="fab fa-telegram-plane"></i></a></li>
							</ul>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div>© 2022. {{get_settings()->name}}. @lang('footer.copy_right')</div>
					</div>
					<div class="col-md-6">
						<div class="footer-policy-link">@lang('footer.use_of')<br>
							<a href="{{url(app()->getLocale().'/terms')}}">@lang('footer.terms_of_service')</a> @lang('footer.and') <a href="{{url(app()->getLocale().'/privacy')}}">@lang('footer.privacy_policy')</a>
						</div>
					</div>
				</div>
			</div>
		</footer>


{{-- @section('js') --}}

{{-- @endsection --}}

