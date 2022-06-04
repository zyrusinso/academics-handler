
            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Toggle Mini Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                        <!-- END Toggle Mini Sidebar -->

                        <!-- Open Search Section (visible on smaller screens) -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        {{-- <button type="button" class="btn btn-sm btn-dual d-md-none" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i>
                        </button> --}}
                        <!-- END Open Search Section -->

                        <!-- Search Form (visible on larger screens) -->
                        {{-- <form class="d-none d-md-inline-block" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-body border-0">
                                        <i class="fa fa-fw fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form> --}}
                        <!-- END Search Form -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual d-flex align-items-center" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            @if (!empty(auth()->user()->getFirstMediaUrl('profile')))
                                <img class="rounded-circle" src="{{ auth()->user()->getFirstMediaUrl('profile') }}" alt="Profile Image" height="21px" width="21px">
                            @else
                                <img class="rounded-circle" src="{{ asset('dash-assets/media/avatars/avatar0.jpg') }}" alt="Profile Image" width="21px">

                            @endif

                                <span class="d-none d-sm-inline-block ml-2">{{ auth()->user()->name }}</span>

                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-primary-dark rounded-top">

                                @if (!empty(auth()->user()->getFirstMediaUrl('profile')))
                                    <img class="rounded-circle" src="{{ auth()->user()->getFirstMediaUrl('profile') }}" alt="Profile Image" height="48px" width="48px">
                                @else
                                    <img class="rounded-circle" src="{{ asset('dash-assets/media/avatars/avatar0.jpg') }}" alt="Profile Image">
                                @endif

                                    <p class="mt-2 mb-0 text-white font-w500">{{ auth()->user()->name }}</p>
                                    {{-- <p class="mb-0 text-white-50 font-size-sm">Web Developer</p> --}}
                                </div>
                                @auth
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('welcome') }}">
                                        <span class="font-size-sm font-w500">Home</span>
                                        {{-- <span class="badge badge-pill badge-primary ml-2">3</span> --}}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('profile.index') }}">
                                        <span class="font-size-sm font-w500">Settings</span>
                                        {{-- <span class="badge badge-pill badge-primary ml-2">1</span> --}}
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-account').submit();" class="dropdown-item d-flex align-items-center justify-content-between">
                                            <span class="font-size-sm font-w500">Log Out</span>
                                        </a>
                                        <form id="logout-account" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                {{-- <div id="page-header-search" class="overlay-header bg-white">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div> --}}
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-white">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->
