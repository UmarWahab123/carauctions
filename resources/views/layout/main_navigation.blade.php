<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url(app()->getLocale().'/') }}"><span class="brand-logo">
                          <img src="{{asset('/')}}/images/logo.svg" alt="Global Motors" style="max-width: 200px" ></span>
                    <h2 class="brand-text"></h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        @if(Auth::user()->role_id==3)
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item dashboard"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/home')}}"><i data-feather="home"></i><span class="menu-title text-truncate">@lang('main_navigation.dashboard')</span></a>
              <li class="nav-item"><a class="d-flex align-items-center auctmgt" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">@lang('main_navigation.auction_management')</span></a>
                <ul class="menu-content dfdsfsd">
                    
                    <li class="view_auction"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/auctions') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.view_auction')</span></a>
                    </li>  
                    <li class="lot"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/lots') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.view_lot')</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item bids"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/bids')}}"><i data-feather='shuffle'></i><span class="menu-title text-truncate">@lang('main_navigation.bid')</span></a>
            </li>  
            <li class=" nav-item invoice"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/invoices')}}"><i data-feather='shuffle'></i><span class="menu-title text-truncate">@lang('main_navigation.invoice')</span></a>
            </li>
               <li class=" nav-item phistory"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/purchased')}}"><i data-feather='file-text'></i><span class="menu-title text-truncate">@lang('main_navigation.purchased_history')</span></a>
            </li>
           
        </ul>
        @else
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item dashboard"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/home')}}"><i data-feather="home"></i><span class="menu-title text-truncate">@lang('main_navigation.dashboard')</span></a>
            <li class="nav-item"><a class="d-flex align-items-center usermgt" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">@lang('main_navigation.user_management')</span></a>
                <ul class="menu-content dfdsfsd">
                    <li class="roles"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/roles') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.roles')</span></a>
                    </li>
                    <li class="access"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/role_access') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">Role Access</span></a>
                    </li>
                    <li class="users"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/users') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.user_list')</span></a>
                    </li>
                </ul>
            </li>
              <li class="nav-item"><a class="d-flex align-items-center auctmgt" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">@lang('main_navigation.auction_management')</span></a>
                <ul class="menu-content dfdsfsd">
                    
                    <li class="view_auction"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/auctions') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.view_auction')</span></a>
                    </li>  
                    <li class="lot"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/lots') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.view_lot')</span></a>
                    </li>

                </ul>
            </li>
             <li class="nav-item"><a class="d-flex align-items-center cars" href="#"><i data-feather="truck"></i><span class="menu-title text-truncate">@lang('main_navigation.cars')</span></a>
                <ul class="menu-content dfdsfsd">
                    
                    <li class=" nav-item bids"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/bids')}}"><i data-feather='shuffle'></i><span class="menu-title text-truncate">@lang('main_navigation.bid')</span></a>
                    </li> 
                     
                    <li class=" nav-item buynow"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/buynow')}}"><i data-feather='shuffle'></i><span class="menu-title text-truncate">@lang('main_navigation.bid') Buy now</span></a>
                    </li> 
                      <li class=" nav-item phistory"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/purchased')}}"><i data-feather='file-text'></i><span class="menu-title text-truncate">@lang('main_navigation.purchased_history')</span></a>
                    </li>
                      <li class=" nav-item model"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/models')}}"><i data-feather='shuffle'></i><span class="menu-title text-truncate">@lang('main_navigation.model')</span></a>
                    </li> 
                     <li class=" nav-item make"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/makes')}}"><i data-feather='shuffle'></i><span class="menu-title text-truncate">@lang('main_navigation.make')</span></a>
                    </li>

                </ul>
            </li>
                
            <li class=" nav-item deposit "><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/deposits')}}"><i data-feather='dollar-sign'></i><span class="menu-title text-truncate">@lang('main_navigation.deposit')</span></a>
            </li>  
            <li class=" nav-item invoice d-none"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/invoices')}}"><i data-feather='shuffle'></i><span class="menu-title text-truncate">@lang('main_navigation.invoice')</span></a>
            </li>
              
             <li class=" nav-item contactus"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/contactus')}}"><i data-feather='message-square'></i><span class="menu-title text-truncate">@lang('main_navigation.contact_us')</span></a>
            </li>
           

          {{--   <li class="nav-item"><a class="d-flex align-items-center feemgt" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">@lang('main_navigation.fee_management')</span></a>
                <ul class="menu-content dfdsfsd">
                    <li class="copart"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/coparts') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.copart')</span></a>
                    </li>
                    <li class="iaai"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/iaais') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.iaai')</span></a>
                    </li>
                </ul>
            </li> --}}
          {{--   <li class="nav-item"><a class="d-flex align-items-center shipmgt" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">@lang('main_navigation.shipping_management')</span></a>
                <ul class="menu-content dfdsfsd">
                    <li class="view_shippment"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/view_shippment') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.view_shipment')</span></a>
                    </li>
                </ul>
            </li> --}}
           {{--  <li class="nav-item"><a class="d-flex align-items-center groundshipmgt" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">@lang('main_navigation.ground_shipping_mangement')</span></a>
                <ul class="menu-content dfdsfsd">
                    <li class="ground_shipping"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/ground_shipping') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.ground_shipping_mangement')</span></a>
                    </li>
                </ul>
            </li> --}}
          {{--   <li class="nav-item"><a class="d-flex align-items-center oceanshipmgt" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">@lang('main_navigation.ocean_shipping_management')</span></a>
                <ul class="menu-content dfdsfsd">
                    <li class="ocean_shipping"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/ocean_shipping') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.ocean_shipping')</span></a>
                    </li>
                </ul>
            </li> --}}

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Menu Levels">@lang('main_navigation.calculator')</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center feemgt" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">@lang('main_navigation.fee_management')</span></a>
                            <ul class="menu-content">
                                 <li class="copart"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/coparts') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.copart')</span></a>
                                </li>
                                <li class="iaai"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/iaais') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.iaai')</span></a>
                                </li>
                            </ul>
                        </li> 
                        <li><a class="d-flex align-items-center shipmgt" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">@lang('main_navigation.shipping_management')</span></a>
                            <ul class="menu-content">
                                 <li class="view_shippment"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/view_shippment') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.view_shipment')</span></a>
                                </li>
                            </ul>
                        </li> 
                        <li><a class="d-flex align-items-center groundshipmgt" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">@lang('main_navigation.ground_shipping_mangement')</span></a>
                            <ul class="menu-content">
                                 <li class="ground_shipping"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/ground_shipping') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.ground_shipping')</span></a>
                                 </li>
                            </ul>
                        </li> 
                        <li><a class="d-flex align-items-center oceanshipmgt" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">@lang('main_navigation.ocean_shipping_management')</span></a>
                            <ul class="menu-content">
                                  <li class="ocean_shipping"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/ocean_shipping') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">@lang('main_navigation.ocean_shipping')</span></a>
                                 </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="view_temp"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/templete') }}"><i data-feather="mail"></i><span class="menu-item text-truncate">@lang('main_navigation.email_template')</span></a>
                </li>
                <li class="view_seo"><a class="d-flex align-items-center" href="{{ url(app()->getLocale().'/admin/add_seo/1') }}"><i data-feather="settings"></i><span class="menu-item text-truncate">@lang('main_navigation.seo')</span></a>
                </li>

               
                <li class=" nav-item settings"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/settings')}}"><i data-feather='settings'></i><span class="menu-title text-truncate">@lang('main_navigation.settings')</span></a>
                  </li>
                <li class=" nav-item faqs"><a class="d-flex align-items-center" href="{{url(app()->getLocale().'/admin/faqs')}}"><i data-feather='settings'></i><span class="menu-title text-truncate">@lang('main_navigation.faqs')</span></a>
                </li>
        </ul>
        @endif
       
    </div>
</div>
<!-- END: Main Menu-->
