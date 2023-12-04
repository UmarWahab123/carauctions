@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/page-profile.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">
@endsection
@section('content')
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">@lang('profile.profile')</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/admin/userprofile')}}">@lang('profile.profile')</a>
        </li>
        <li class="breadcrumb-item"><a href="#">{{$data['users']->name}}</a>
        </li>
    </ol>
</div>
@endsection
<div class="content-body">
                <div id="user-profile">
                    <!-- profile header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-header mb-2">
                               
                                <!-- <div class="position-relative"> -->
                                    <!-- profile picture -->
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="{{url('/')}}{{$data['users']->dp}}" class="rounded img-fluid" alt="Card image" style="height:100% !important;" />
                                        </div>
                                        <!-- profile title -->
                                        <div class="profile-title ml-3">
                                            <h2 class="text-white">{{$data['users']->name}}</h2>
                                            <p class="text-white">{{$data['users']->role->role_title}}</p>
                                        </div>
                                    </div>
                                <!-- </div> -->

                                <!-- tabs pill -->
                                <div class="profile-header-nav">
                                    <!-- navbar -->
                                    <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                        <button class="btn btn-icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <i data-feather="align-justify" class="font-medium-5"></i>
                                        </button>

                                        <!-- collapse  -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                                <ul class="nav nav-pills mb-0">
                                                    <li class="nav-item d-none">
                                                        <a class="nav-link font-weight-bold active" href="javascript:void(0)">
                                                            <span class="d-none d-md-block">@lang('profile.feed')</span>
                                                            <i data-feather="rss" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                   
                                                    <li class="nav-item d-none">
                                                        <a class="nav-link font-weight-bold" href="javascript:void(0)">
                                                            <span class="d-none d-md-block">@lang('profile.photos')</span>
                                                            <i data-feather="image" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                                <!-- buttons -->
                                                @if (Auth::user()->role_id==1)
                                                <button class="btn btn-primary ml-auto mr-1">
                                                    
                                                    <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/users')}}">
                                                     <i data-feather="edit" class="d-block d-md-none"></i>
                                                    <span class="font-weight-bold d-none d-md-block text-white">@lang('profile.user_list')</span></a>
                                                </button>
                                                <button class="btn btn-primary">
                                                    
                                                     <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/user/'.$data['users']->id)}}">
                                                     <i data-feather="edit" class="d-block d-md-none"></i>
                                                    <span class="font-weight-bold d-none d-md-block text-white">@lang('profile.edit')</span></a>
                                                </button>
                                                @endif



                                                 
                                            </div>
                                        </div>
                                        <!--/ collapse  -->
                                    </nav>
                                    <!--/ navbar -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile header -->

                    <!-- profile info section -->
                    <section id="profile-info">
                        <div class="row">
                            <!-- left profile info section -->
                            <div class="col-lg-3 col-12 order-2 order-lg-1">
                                <!-- about -->
                                <div class="card">
                                    <div class="card-body">
                                     <h5 class="mb-75">@lang('profile.social_media_link'):</h5>
                                       <a href="{{$data['users']->facebook}}">{{$data['users']->facebook}}</a>
                                        <a href="{{$data['users']->twitter}}">{{$data['users']->twitter}}</a>
                                        <a href="{{$data['users']->instagram}}">{{$data['users']->instagram}}</a>
                                        <a href="{{$data['users']->linkedin}}">{{$data['users']->linkedin}}</a>
                                        <div class="mt-2">
                                            <h5 class="mb-75">@lang('profile.joined'):</h5>
                                            <p class="card-text">{{$data['users']->created_at}}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">@lang('profile.lives'):</h5>
                                            <p class="card-text">{{$data['users']->address}}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">@lang('profile.email'):</h5>
                                            <p class="card-text">{{$data['users']->email}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ about -->

    

                                <!--/ suggestion pages -->
                            </div>
                            <!--/ left profile info section -->

                            <!-- center profile info section -->
                            <div class="col-lg-6 col-12 order-1 order-lg-2">
                                <!-- post 1 -->
                               @foreach ($data['bid'] as $value)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <!-- avatar -->
                                          @if (Auth::user()->role_id==1)

                                            <div class="avatar mr-1">
                                                <a href="{{url('admin/user/'.$value->user->id)}}">
                                                <img src="{{url('/')}}{{$value->user->dp}}" alt="avatar img" height="50" width="50" /></a>
                                            </div>
                                            @else
                                            <div class="avatar mr-1">
                                                <a >
                                                <img src="{{url('/')}}{{$value->user->dp}}" alt="avatar img" height="50" width="50" /></a>
                                            </div>
                                           @endif

                                            <!--/ avatar -->
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">{{$value->lotname->lot_title}}</h6>
                                                <small class="text-muted">{{$value->created_at->format('Y-m-d H:i A') }}</small>
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            {{$value->lotname->description}}
                                        </p>
                                        <!-- post img -->
                                          <img class="mb-75" src="{{url('/')}}{{$value->lotname->feature_image}}" alt="avatar img" height="300px" width="100%" />
                                        <div class="">
                                            <h3>Bid Amount : ${{$value->bid_amount}}</h3>
                                        </div> 
                                    </div>
                                </div>
                                  @endforeach 
                                <!--/ post 1 -->

                               
                            </div>
                            <!--/ center profile info section -->

                            <!-- right profile info section -->
                            <div class="col-lg-3 col-12 order-3">
                                <!-- latest profile pictures -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-0">@lang('profile.lot_photo')</h5>
                                        <div class="row">
                                         @foreach($data['lot'] as $key4=>$value4)  
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="javascript:void(0)">
                                                    <img src="{{url('/')}}{{$value4->feature_image}}" class="img-fluid rounded" alt="avatar img"/>
                                                </a>
                                            </div>
                                          @endforeach                                   
                                        </div>
                                    </div>
                                </div>
                                <!--/ latest profile pictures -->


                            </div>
                            <!--/ right profile info section -->
                        </div>

                        <!-- reload button -->
                        <div class="row d-none">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-sm btn-primary block-element border-0 mb-1">@lang('profile.load_more')</button>
                            </div>
                        </div>
                        <!--/ reload button -->
                    </section>
                    <!--/ profile info section -->
                </div>

            </div>
@endsection

@section('js')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/js/scripts/pages/page-profile.js')}}">

@endsection