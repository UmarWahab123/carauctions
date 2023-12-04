<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url(app()->getLocale().'/admin/deposits')}}" data-toggle="tooltip" data-placement="top" title="Deposits"><i class="ficon" data-feather="dollar-sign"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url(app()->getLocale().'/admin/purchased') }}" data-toggle="tooltip" data-placement="top" title="purchased"><i class="ficon" data-feather="file-text"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url(app()->getLocale().'/admin/bids') }}" data-toggle="tooltip" data-placement="top" title="bids"><i class="ficon" data-feather="folder"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url(app()->getLocale().'/admin/settings')}}" data-toggle="tooltip" data-placement="top" title="Settings"><i class="ficon" data-feather="settings"></i></a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                    <div class="bookmark-input search-input">
                        <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                        <ul class="search-list search-list-bookmark"></ul>
                    </div>
                </li>
            </ul>
        </div>
                <div class='d-none' id="google_translate_element"></div>

        <ul class="nav navbar-nav align-items-center ml-auto">
             <li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">
  @php
  $icon=app()->getLocale();
                 if(app()->getLocale() == 'en'){
                         $icon='us';
                     }
                          @endphp
                {{strtoupper(app()->getLocale())}}</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                       
                          @php
                          $parameter=last(request()->segments());
                          if(is_numeric($parameter)){
                            $parameter=last(request()->segments());
                          }else{
                            $parameter='';
                          }
                      @endphp

                           @foreach (config('app.available_locales') as $locale)
                              @php
                         $icon=$locale;
                         if($locale == 'uk'){
                           continue;
                          }
                      if($locale == 'en'){
                         $icon='us';
                     }
                          @endphp
                             <a class="dropdown-item language" data-lang='{{$locale}}' data-value="ENG" href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}/{{$parameter}}" data-language="{{$locale}}"><i class="flag-icon flag-icon-{{$icon}}" ></i> {{ strtoupper($locale) }}</a>
                           @endforeach
                    </div>
                </li>
            <li class="nav-item d-none d-lg-block setmode"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-danger badge-up">{{count(get_notification())}}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                            <div class="">{{count(get_notification())}} New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                        @foreach(get_notification() as $key=>$value)
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                @if(!function_exists('userdp'))
                                <div class="media-left">
                                    <div class="avatar"><img src="{{url($value->user->dp)}}" alt="avatar" width="32" height="32"></div>
                                </div>
                               @endif
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">{{$value->user->name}}</span></p><small class="notification-text">Place a Bid on Lot No{{isset($value->lotname->lot_no)?$value->lotname->lot_no:''}} an amount of ${{$value->bid_amount}}</small>
                                </div>
                            </div>
                        </a>
                       @endforeach


                   <!--      <div class="media d-flex align-items-center d-none">
                            <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>
                            <div class="custom-control custom-control-primary custom-switch">
                                <input class="custom-control-input" id="systemNotification" type="checkbox" checked="">
                                <label class="custom-control-label" for="systemNotification"></label>
                            </div>
                        </div>
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to hight CPU usage</small>
                                </div>
                            </div>
                        </a> -->                 
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="{{url(app()->getLocale().'/admin/todayBids')}}">@lang('main_navigation.all_notification')</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{Auth::user()->name}}</span><span class="user-status">{{Auth::user()->role->role_title}}</span></div><span class="avatar"><img class="round" src="{{url('/')}}{{Auth::user()->dp}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/userprofile')}}"><i class="mr-50" data-feather="user"></i> @lang('main_navigation.profile')</a>
                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/settings')}}"><i class="mr-50" data-feather="settings"></i> @lang('main_navigation.settings')</a>
                    <a class="dropdown-item logout" href="{{url(app()->getLocale().'/admin/adminlogout')}}"><i class="mr-50" data-feather="power"></i> @lang('main_navigation.logout')</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
