@extends('admin.layouts.master')
@section('content')
<!-- page-wrapper start -->
{{-- <div class="page-wrapper default-version">
    @include('admin.components.sidenav')
    <div class="top-nav-bg">
        @include('admin.components.topnav')
        <div class="breadcrumb-wrapper">
            @include('admin.components.breadcrumb')
        </div>
    </div>

    <div class="body-wrapper">
        <div class="bodywrapper__inner">


            @yield('panel')


        </div><!-- bodywrapper__inner end -->
    </div><!-- body-wrapper end -->
</div> --}}

<div class="container-scroller">
    @include('admin.components.topnav')

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        @include('admin.components.sidenav')
        @yield('panel')
    </div>
</div>

<footer class="footer">
    <div class="d-sm-flex justify-content-center ">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a href="{{route('home')}}" target="_blank"> {{$general->site_name}} - </a> - </span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> @lang('Copyright © 2023. All rights reserved.') </span>
    </div>
</footer>
@endsection