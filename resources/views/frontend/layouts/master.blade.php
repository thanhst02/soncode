<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta name="description" content="EXCEPTION – Responsive Business HTML Template">
        <meta name="author" content="EXCEPTION">
        <title>
            @section('title') Do an | @show
        </title>
        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
        <link rel="shortcut icon" href="{{ asset('lib/frontend/images/favicon.ico') }}">
        {{-- link css --}}
        @includeif('frontend.layouts.link')
        @yield('top-link')
    </head>
    <body>
        
        {{-- <!-- site preloader start -->
        <div class="page-loader">
            <div class="loader-in"></div>
        </div>
        <!-- site preloader end --> --}}
        
        <div class="pageWrapper">
            @if(!Auth::check())
            <!-- login box start -->
            @includeif('frontend.layouts.header.login-box')
            <!-- login box End -->
            @endif
            <!-- Header Start -->
            @includeif('frontend.layouts.header')
            <!-- Header End -->
            
            <!-- Content Start -->
            <div id="contentWrapper">
                <!-- banner top start-->
                @yield('banner-top')
                <!-- banner top end-->
        
                @yield('content')
                
            </div>
            <!-- Content End -->
            
            <!-- Footer start -->
            @includeif('frontend.layouts.footer')
            <!-- Footer end -->
            
            <!-- Back to top Link -->
            <div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
            </div>
    {{-- js --}}
    @yield('footer-js-top')
    @includeif('frontend.layouts.footer-js')
    @yield('footer-js-bottom')
    {{-- ===== --}}
    {{-- open login erorrs --}}
    @if($errors->has('account') || $errors->has('password') || Session::has('login-status-error'))
        <script type="text/javascript">
            $('.login-btn').click(); 
        </script>
    @endif
    {{-- ===== --}}
    <script type="text/javascript">
        var clear_cart = '{{ route('frontend.cart.clear-cart') }}';
        var delete_cart = '{{ route('frontend.cart.delete-cart') }}';
        var url_cart_add = '{{ route('frontend.cart.add-cart') }}';
    </script>
    <script type="text/javascript" src="{{ asset('lib/js/script.js') }}"></script>
{{-- #E7512F --}}
    </body>
</html>