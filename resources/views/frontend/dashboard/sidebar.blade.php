<div class="section-sidebar">

						<ul class="sidebar-nav">

							<li><a class="cabinet" href="{{url(app()->getLocale().'/userdashboard')}}" ><span><img src="{{asset('/frontend/images/icon-new/list-ul.svg')}}" alt=""></span>@lang('side_bar.cabinet')</a></li>
							<li><a href="{{url('/userdashboard')}}" class="d-none"><span><img src="{{asset('/frontend/images/icon-new/list-ul.svg')}}" alt=""></span>@lang('side_bar.dashboard')</a></li>

							<li><a class="bookmarks " href="{{url(app()->getLocale().'/bookmarks')}}"><span><img src="{{asset('/frontend/images/icon-new/bookmark.svg')}}" alt=""></span>@lang('side_bar.bookmarks')<i>
								@if(isset($data['bookmark']))
							<span class="bookmarkcount">{{count($data['bookmark'])}}</span>
							@endif
						</i></a></li>

							<li><a class="betting" href="{{url(app()->getLocale()."/bettings/".Auth::user()->id)}}"><span><img src="{{asset('/frontend/images/icon-new/icon-center.svg')}}" alt=""></span>@lang('side_bar.betting')</a></li>

							<li><a class="buy_now" href="{{url(app()->getLocale()."/buynowlist/".Auth::user()->id)}}"><span><img src="{{asset('/frontend/images/icon-new/buy-now.svg')}}" alt=""></span>@lang('side_bar.buy_now')</a></li>
      
							<li><a class="deposits" href="{{url(app()->getLocale().'/deposit')}}"><span><img src="{{asset('/frontend/images/icon-new/deposite.svg')}}" alt=""></span>@lang('side_bar.deposit')</a></li>	

							<li><a class="payment_history" href="{{url(app()->getLocale().'/paymenthistory')}}"><span><img src="{{asset('/frontend/images/icon-new/deposite.svg')}}" alt=""></span>@lang('side_bar.payment_history')</a></li>
                            @if (Auth::user()->role->role_title=='Dealer')
							<li><a class="your_lots" href="{{url(app()->getLocale().'/view_dealer')}}"><span><img src="{{asset('/frontend/images/icon-new/chat-dots.svg')}}" alt=""></span>@lang('side_bar.your_lot')</a></li>
                             @endif
                             @if (Auth::user()->role->role_title=='Manager')

							<li><a class="buyers" href="/deposite-pay-succes.html"><span><img src="{{asset('/frontend/images/icon-new/cart3.svg')}}" alt=""></span>@lang('side_bar.buyer')</a></li>

							<li><a class="dealer" href="/deposite-pay-succes.html"><span><img src="{{asset('/frontend/images/icon-new/cart-plus.svg')}}" alt=""></span>@lang('side_bar.dealer')</a></li>

                              @endif

							

							<!-- <li  class="dropdown"><a href="#" id="navbarDropdownProfile" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span><img src="{{asset('/frontend/images/icon-new/person.svg')}}" alt=""></span>@lang('side_bar.profile')<span class="arrow-icon"></span></a>

								<div class="dropdown-menu dropdown-menu-profile" aria-labelledby="navbarDropdownProfile">

									<a class="dropdown-item account" href="{{url(app()->getLocale().'/usersettings/'.Auth::user()->id).'?'."type=Account"}}">@lang('side_bar.account')</a>

									<a class="dropdown-item doc" href="{{url(app()->getLocale().'/document/'.Auth::user()->id)}}">@lang('side_bar.documentation')</a>

									<a class="dropdown-item address" href="{{url(app()->getLocale().'/usersettings/'.Auth::user()->id).'?'."type=Address"}}">@lang('side_bar.address')</a>

									<a class="dropdown-item setting" href="{{url(app()->getLocale().'/usersettings/'.Auth::user()->id).'?'."type=Settings"}}">@lang('side_bar.settings')</a>

								</div>

							</li> -->

							<li class="dropdown dropdown-has-child"><a href="" class="dropdown-toggle"><span><img src="{{asset('/frontend/images/icon-new/person.svg')}}" alt=""></span>@lang('side_bar.profile')<span class="arrow-icon"></span></a>
								<div class="dropdown-menu-child">
									<a class="dropdown-item account" href="{{url(app()->getLocale().'/usersettings/'.Auth::user()->id).'?'."type=Account"}}">@lang('side_bar.account')</a>

									<a class="dropdown-item doc" href="{{url(app()->getLocale().'/document/'.Auth::user()->id)}}">@lang('side_bar.documentation')</a>

									<a class="dropdown-item address" href="{{url(app()->getLocale().'/usersettings/'.Auth::user()->id).'?'."type=Address"}}">@lang('side_bar.address')</a>

									<a class="dropdown-item setting" href="{{url(app()->getLocale().'/usersettings/'.Auth::user()->id).'?'."type=Settings"}}">@lang('side_bar.settings')</a>
								</div>
							</li>

						</ul>

					</div>