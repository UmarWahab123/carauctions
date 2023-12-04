@extends('layout.header');
@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/charts/chart-apex.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">
@endsection
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">@lang('dashboard.dashboard')</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/home')}}">@lang('dashboard.home')</a>
            </li>
            {{--<li class="breadcrumb-item"><a href="#">Components</a>--}}
            {{--</li>--}}
            {{--<li class="breadcrumb-item active">Alerts--}}
            {{--</li>--}}
        </ol>
    </div>
@endsection
@section('content')
<div class="content-body">
    <section id="basic-alerts">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="users" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder mt-1">{{count($data['users'])}}</h2>
                        <p class="card-text">@lang('dashboard.total_user')</p>
                    </div>
                    <div id="gained-chart"></div>
                </div>          
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="package" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">0</h2>
                    <p class="card-text">@lang('dashboard.total_auction')</p>
                </div>
                <div id="order-chart"></div>
            </div>
          </div>
           <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="users" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">0</h2>
                    <p class="card-text">@lang('dashboard.total_invoice')</p>
                </div>
                <div id="gained-chart1"></div>
            </div>          
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-warning p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="package" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">0</h2>
                <p class="card-text">@lang('dashboard.total_lots')</p>
            </div>
            <div id="order-chart1"></div>
        </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4 class="card-title">@lang('dashboard.bids')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                <h1 class="font-large-2 font-weight-bolder mt-2 mb-0 getvalue">{{count($data['alltraining'])}}</h1>
                                <p class="card-text">@lang('dashboard.all_bids')</p>
                            </div>
                            <div class="col-sm-10 col-12 d-flex justify-content-center">
                                <div id="support-trackers-chart"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-1">
                            <div class="text-center">
                                <p class="card-text mb-50">@lang('dashboard.today_bids')</p>
                                <span class="font-large-1 font-weight-bold">0</span>
                            </div>
                            <div class="text-center">
                                <p class="card-text mb-50">@lang('dashboard.last_week_bids')</p>
                                <span class="font-large-1 font-weight-bold">0</span>
                            </div>
                            <div class="text-center">
                                <p class="card-text mb-50">@lang('dashboard.last_month')</p>
                                <span class="font-large-1 font-weight-bold">0</span>
                            </div>
                             <div class="text-center">
                                <p class="card-text mb-50">@lang('dashboard.last_year')</p>
                                <span class="font-large-1 font-weight-bold">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('js')

<script src="{{asset('/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/moment.min.js')}}"></script>

<script src="{{asset('/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>

<script type="text/javascript">
    $('.dashboard').addClass('active');
</script>
@endsection
