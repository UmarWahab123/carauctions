<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="We're a global community of free thinkers and action takers who come and work together towards building a better life for themselves and the people around them.">
    <meta name="keywords" content="Newrich, Lifestyle,Yoga,Artists,Network,Fitness,Know yourself,Build a business">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title','Global Motors')</title>
    @include('layout.css')
    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

@php
        $layoutmode="light-layout";
        if(Session::has('layoutmode')){
            $layoutmode=Session::get('layoutmode');
        }
@endphp
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  {{$layoutmode}}" data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include('layout.topbar')
        <!-- END: Header-->
@include('layout.main_navigation')
        <!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        @yield('breadcrumb')

                    </div>
                </div>
            </div>
        </div>
            @yield('content')
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@include('layout.js')


<!-- BEGIN: Footer-->
@include('layout.footer')
        <!-- END: Footer-->
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@yield('js')
@yield('subjs')
</body>
<!-- END: Body-->

</html>