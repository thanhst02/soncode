<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="admin-themes-lab">
<meta name="author" content="themes-lab">
<link rel="shortcut icon" href="{{ asset('libbackend/assets/global/images/favicon.png') }}" type="image/png">
<title>
    @section('title') Admin | @show
</title>
    {{-- LINK --}}
@includeif('backend.layouts.header-link')
@yield('header-link')
<script src="{{ asset('libbackend/assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
</head>
<!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
<!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
<!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
<!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
<!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
<!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
<!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
<!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
<!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->

<!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
<!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->

<!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
<!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
<!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
<!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
<!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
<!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
<!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
<!-- BEGIN BODY -->
<body class="fixed-topbar fixed-sidebar theme-sdtl color-default">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<section>
    {{-- sildebar --}}
    @includeif('backend.layouts.slidebar')
    <!-- MAIN CONTENT -->
    <div class="main-content">
    {{-- topbar --}}
    @includeif('backend.layouts.top-bar')
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content app">
            @yield('content')
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END MAIN CONTENT -->
    {{-- builer --}}
    {{-- @includeif('backend.layouts.builer') --}}

</section>
    {{-- quickview-sidebar --}}
    {{-- @includeif('backend.layouts.quickview-sidebar') --}}
    {{-- serach-box --}}
    @includeif('backend.layouts.search-box')
    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    @includeif('backend.layouts.footer-js')
    <!-- BEGIN PAGE SCRIPT -->
    @yield('bottom-js')
    <!-- END PAGE SCRIPTS -->
    <script src="{{ asset('libbackend/assets/admin/md-layout1/material-design/js/material.js') }}"></script>
    {{-- <script src="{{ asset('libbackend/assets/admin/layout1/js/layout.js') }}"></script> --}}
    <script>
        $.material.init();
    </script>
    @php
    use Illuminate\Support\Facades\Session;
    @endphp
    @if (Session::has('status'))
        @includeif('backend.layouts.message')
    @endif
</body>
</html>