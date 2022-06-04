<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Academics Handler</title>

     <!-- Bootstrap-->
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/bootstrap.css') }}">

     <!-- Template Style-->
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/font-awesome.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/animate.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/style.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/shortcodes.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/jquery-fancybox.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/responsive.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/flexslider.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/owl.theme.default.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/owl.carousel.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/stylesheet/jquery.mCustomScrollbar.min.css') }}">

     <link href="{{ asset('assets/icon/favicon.ico') }}" rel="shortcut icon">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    @yield('css')

</head>
<body>
    <div id="app">
        @if (request()->routeIs('welcome'))
            @include('partials.loader')
        @endif
        @include('partials.header')

        <main>
            @if (request()->routeIs('welcome'))
              @include('partials.social')
            @endif
            @yield('content')
        </main>

        @include('partials.footer');

    </div>

    @yield('scripts')

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('assets/javascript/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/javascript/rev-slider.js') }}"></script>
    <script src="{{ asset('assets/javascript/plugins.js') }}"></script>
    <script src="{{ asset('assets/javascript/jquery-countTo.js') }}"></script>
    <script src="{{ asset('assets/javascript/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/javascript/jquery-fancybox.js') }}"></script>
    <script src="{{ asset('assets/javascript/flex-slider.min.js') }}"></script>
    <script src="{{ asset('assets/javascript/scroll-img.js') }}"></script>
    <script src="{{ asset('assets/javascript/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/javascript/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/javascript/parallax.js') }}"></script>
    <script src="{{ asset('assets/javascript/jquery-isotope.js') }}"></script>
    <script src="{{ asset('assets/javascript/equalize.min.js') }}"></script>
    <script src="{{ asset('assets/javascript/main.js') }}"></script>


    <!-- slider -->
    <script src="{{ asset('assets/rev-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets/rev-slider/js/extensions/extensionsrevolution.extension.video.min.js') }}"></script>

</body>
</html>
