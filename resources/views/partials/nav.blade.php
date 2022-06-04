<div class="site-header-inner">
    <div class="container">

        @if (in_array(request()->route()->getName(),$arr2))
         <div class="menu-bar-wrap clearfix">
        @endif

        <div id="logo" class="logo">
            <a href="{{ route('welcome') }}"><img src="{{ asset('assets') }}/images/logo/02.png" alt="images"></a>
        </div>
        <div class="mobile-button"><span></span></div>
        <div class="header-menu">
            <nav id="main-nav" class="main-nav">
                <ul class="menu">
                    <li><a href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="services-item"><a href="{{ route('home.services') }}" class="services-item-link">Services
                        @if (request()->routeIs('welcome'))
                        <i class="ml-1 fa fa-angle-down"></i>
                        @endif
                    </a>

                        @if (request()->routeIs('welcome'))
                        <ul class="services-item-inner">
                            <ul class="container">
                                <li class="row services-item-inner-li">
                                   
                                    <ul class="col-4">
                                        <li>ESSAY SERVICES</li>
                                        @foreach($essays as $essay)
                                            <li><a href="#">{{ $essay->service_title }}</a></li>
                                        @endforeach
                                    </ul>
                                    
                                    <ul class="col-4">
                                        <li>DISSERTATION SERVICES</li>
                                        @foreach($dissertations as $dissertation)
                                            <li><a href="#">{{ $dissertation->service_title }}</a></li>
                                        @endforeach
                                    </ul>
                                    <ul class="col-4">
                                        <li>OTHER SERVICES</li>
                                        @foreach($others as $other)
                                            <li><a href="#">{{ $other->service_title }} </a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <!-- Container -->
                        </ul><!-- sub-menu -->
                        @endif
                    </li>

                    <li>
                        <a href="{{ route('reference.index') }}">Reference</a>
                    </li>

                    <li><a href="{{ route('home.about') }}">About</a></li>


                    @if (!in_array(request()->route()->getName(),$arr2))
                    @auth
                    <li>

                        <div class="dropdown my-3 ml-3 ml-lg-0 my-lg-0">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (!empty(auth()->user()->getFirstMediaUrl('profile')))
                                <img class="rounded-circle" src="{{ auth()->user()->getFirstMediaUrl('profile') }}" alt="Profile Image" style="height:40px;width:40px">
                                @else
                                    <img class="rounded-circle" src="{{ asset('dash-assets/media/avatars/avatar0.jpg') }}" alt="Profile Image" style="height:40px;width:40px">
                                @endif
                                <span class="ml-2">{{ auth()->user()->name }}</span>
                            </a>

                            <div class="dropdown-menu profile-dropdown" style="background-color: #333" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="{{ route('dashboard.index') }}" <?php if(auth()->user()->isAdmin() != 1){ echo "hidden";} ?>>Dashboard</a>
                              <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>

                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-account').submit();" class="dropdown-item">Logout</a>

                                <form id="logout-account" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </li>
                    @else
                    <li class="nav-sing">
                        <a class="sing-in" href="{{ route('login') }}">Sign In</a>
                        <a class="sing-up" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    @endauth
                    @endif

                </ul>
            </nav>
        </div>

        @if (in_array(request()->route()->getName(),$arr2))
         </div>
        @endif

    </div>
</div>

