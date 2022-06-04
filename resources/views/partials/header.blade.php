@php
$arr = ['login','register','password.confirm','password.request','password.reset','verification.notice'];
$arr2 = ['home.services','home.about','reference.index', 'home.package'];
@endphp

@if (!in_array(request()->route()->getName(),$arr2) || in_array(request()->route()->getName(),$arr))
<div class="wrap-header">
    <header
        class="header flat-header lh-header header-style1 {{ in_array(request()->route()->getName(),$arr) ? 'dark-header' : ''}}">

        @include('partials.nav')

    </header><!-- header -->

</div><!-- wrap-header -->

@elseif(in_array(request()->route()->getName(),$arr2))
<div class="bg-header">
    <div class="flat-header-blog">
        <div class="top-bar clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                        <ul class="information">
                            <li class="phone lt-sp003">
                                <i class="fa fa-phone" aria-hidden="true"></i> +44 7883 164244
                            </li>
                            <li class="email">
                                <i class="fa fa-envelope" aria-hidden="true"></i> contact@academicshandler.com
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">

                        @auth
                        <ul class="nav-sing">
                            <li>
                                <div class="dropdown my-3 ml-3 ml-lg-0 my-lg-0">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (!empty(auth()->user()->getFirstMediaUrl('profile')))
                                        <img class="rounded-circle"
                                            src="{{ auth()->user()->getFirstMediaUrl('profile') }}" alt="Profile Image"
                                            style="height:40px;width:40px">
                                        @else
                                        <img class="rounded-circle"
                                            src="{{ asset('dash-assets/media/avatars/avatar0.jpg') }}"
                                            alt="Profile Image" style="height:40px;width:40px">
                                        @endif
                                        <span class="ml-2">{{ auth()->user()->name }}</span>
                                    </a>

                                    <div class="dropdown-menu profile-dropdown" style="background-color: #333"
                                        aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-account').submit();"
                                            class="dropdown-item">Logout</a>

                                        <form id="logout-account" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>

                                    </div>
                                </div>
                            </li>
                        </ul>
                        @else
                        <ul class="nav-sing">
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                        </ul>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
        <header class="header menu-bar header-blog hv-menu-type2">
            @include('partials.nav')

        </header><!-- header -->
        <div class="page-title page-title-blog">
            <div class="page-title-inner">
                <div class="breadcrumbs breadcrumbs-blog text-left">
                    <div class="container">
                        <div class="breadcrumbs-wrap">
                            <ul class="breadcrumbs-inner">
                                <li><a href="{{ route('welcome') }}">Home</a></li>
                                @if (request()->routeIs('home.about'))
                                <li><a href="{{ route('home.about') }}">About</a></li>
                                @elseif(request()->routeIs('home.services'))
                                <li><a href="{{ route('home.services') }}">Services</a></li>
                                @elseif(request()->routeIs('reference.index'))
                                <li><a href="{{ route('reference.index') }}">Reference</a></li>
                                @elseif(request()->routeIs('home.package'))
                                <li><a href="{{ route('home.package') }}">Packages</a></li>
                                @endif
                            </ul>

                            @if (request()->routeIs('home.about'))

                            <div class="title">
                                About
                            </div>

                            @elseif(request()->routeIs('home.services'))

                            <div class="title">
                                Services
                            </div>

                            @elseif(request()->routeIs('reference.index'))
                            <div class="title">
                                Reference
                            </div>
                            @elseif(request()->routeIs('home.package'))
                            <div class="title">
                                Packages
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- bg-header -->
@endif