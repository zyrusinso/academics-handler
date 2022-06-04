    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="font-w600 text-dual" href="{{ route('welcome') }}">
                <span class="smini-visible">
                    <i class="fa fa-circle-notch text-primary"></i>
                </span>
                <span class="smini-hide tracking-wider">
                   Academic Handler</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Extra -->
            <div>
                <!-- Options -->
                <div class="dropdown d-inline-block ml-2">
                   
                    <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                        <div class="dropdown-divider"></div>

                        <!-- Sidebar Styles -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_light" href="#">
                            <span>Sidebar Light</span>
                        </a>
                        <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                            <span>Sidebar Dark</span>
                        </a>
                        <!-- Sidebar Styles -->

                        <div class="dropdown-divider"></div>

                        <!-- Header Styles -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_light" href="#">
                            <span>Header Light</span>
                        </a>
                        <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_dark" href="#">
                            <span>Header Dark</span>
                        </a>
                        <!-- Header Styles -->
                    </div>
                </div>
                <!-- END Options -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-fw fa-times"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Extra -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('dashboard.index') }}">
                            <i class="nav-main-link-icon si si-speedometer"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>

                    <?php 
                        if(Request::url() == route('home.index') || Request::url() == route('dashboard.services') || Request::url() == route('dashboard.dissertation') || Request::url() == route('dashboard.other') || Request::url() == route('dashboard.package') || Request::url() == route('event.index')){
                            echo "
                            <li class='nav-main-item open'>
                                <a class='nav-main-link nav-main-link-submenu' data-toggle='submenu' aria-haspopup='true' aria-expanded='true' href='#'>
                                    <i class='nav-main-link-icon si si-energy'></i>
                                    <span class='nav-main-link-name '>Content</span>
                                </a>
                                "; 
                                //Home
                                if(Request::url() == route('home.index')){
                                    echo "<ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link active' href=".route('home.index').">
                                                <span class='nav-main-link-name'>Home</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('dashboard.services').">
                                                <span class='nav-main-link-name'>Services</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('dashboard.package').">
                                                <span class='nav-main-link-name'>Package</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('event.index').">
                                                <span class='nav-main-link-name'>Events</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('about.index').">
                                                <span class='nav-main-link-name'>About</span>
                                            </a>
                                        </li>
                                    </ul>";

                                //Content
                                }else if(Request::url() == route('dashboard.services') || Request::url() == route('dashboard.dissertation') || Request::url() == route('dashboard.other')){
                                    echo "<ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('home.index').">
                                                <span class='nav-main-link-name'>Home</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link active' href=".route('dashboard.services').">
                                                <span class='nav-main-link-name'>Services</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('dashboard.package').">
                                                <span class='nav-main-link-name'>Package</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link ' href=".route('event.index').">
                                                <span class='nav-main-link-name'>Events</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('about.index').">
                                                <span class='nav-main-link-name'>About</span>
                                            </a>
                                        </li>
                                    </ul>";

                                //Package
                                }else if(Request::url() == route('dashboard.package')){
                                    echo "<ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('home.index').">
                                                <span class='nav-main-link-name'>Home</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('dashboard.services').">
                                                <span class='nav-main-link-name'>Services</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link active' href=".route('dashboard.package').">
                                                <span class='nav-main-link-name'>Package</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link ' href=".route('event.index').">
                                                <span class='nav-main-link-name'>Events</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('about.index').">
                                                <span class='nav-main-link-name'>About</span>
                                            </a>
                                        </li>
                                    </ul>";

                                //Events
                                }else if(Request::url() == route('event.index')){
                                    echo "<ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('home.index').">
                                                <span class='nav-main-link-name'>Home</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('dashboard.services').">
                                                <span class='nav-main-link-name'>Services</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('dashboard.package').">
                                                <span class='nav-main-link-name'>Package</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link active' href=".route('event.index').">
                                                <span class='nav-main-link-name'>Events</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('about.index').">
                                                <span class='nav-main-link-name'>About</span>
                                            </a>
                                        </li>
                                    </ul>";

                                //About
                                }else if(Request::url() == route('about.index')){
                                    echo "<ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('home.index').">
                                                <span class='nav-main-link-name'>Home</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('dashboard.services').">
                                                <span class='nav-main-link-name'>Services</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('dashboard.package').">
                                                <span class='nav-main-link-name'>Package</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link active' href=".route('event.index').">
                                                <span class='nav-main-link-name'>Events</span>
                                            </a>
                                        </li>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('about.index').">
                                                <span class='nav-main-link-name'>About</span>
                                            </a>
                                        </li>
                                    </ul>";
                                } 
                                
                            echo "</li>";
                        }else{
                            echo "
                            <li class='nav-main-item'>
                                <a class='nav-main-link nav-main-link-submenu' data-toggle='submenu' aria-haspopup='true' aria-expanded='false' href='#'>
                                    <i class='nav-main-link-icon si si-energy'></i>
                                    <span class='nav-main-link-name'>Content</span>
                                </a>
                                
                                <ul class='nav-main-submenu'>
                                    <li class='nav-main-item'>
                                        <a class='nav-main-link' href=".route('home.index').">
                                            <span class='nav-main-link-name'>Home</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class='nav-main-submenu'>
                                    <li class='nav-main-item'>
                                        <a class='nav-main-link' href=".route('dashboard.services').">
                                            <span class='nav-main-link-name'>Services</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class='nav-main-submenu'>
                                    <li class='nav-main-item'>
                                        <a class='nav-main-link' href=".route('dashboard.package').">
                                            <span class='nav-main-link-name'>Package</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class='nav-main-submenu'>
                                    <li class='nav-main-item'>
                                        <a class='nav-main-link' href=".route('event.index').">
                                            <span class='nav-main-link-name'>Events</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class='nav-main-submenu'>
                                    <li class='nav-main-item'>
                                        <a class='nav-main-link' href=".route('about.index').">
                                            <span class='nav-main-link-name'>About</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>";
                        }            
                    ?>

                    <?php 
                        if(Request::url() == route('category.index') || Request::url() == route('post.index') || Request::url() == route('blog.settings')){
                            echo "
                            <li class='nav-main-item open'>
                                <a class='nav-main-link nav-main-link-submenu' data-toggle='submenu' aria-haspopup='true' aria-expanded='true' href='#'>
                                    <i class='nav-main-link-icon si si-pencil'></i>
                                    <span class='nav-main-link-name'>Blog</span>
                                </a>";
                                if(Request::url() == route('category.index')){
                                    echo "<ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link active' href=".route('category.index').">
                                                <span class='nav-main-link-name'>Category</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('post.index').">
                                                <span class='nav-main-link-name'>Post</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('blog.settings').">
                                                <span class='nav-main-link-name'>Settings</span>
                                            </a>
                                        </li>
                                    </ul>";
                                }elseif(Request::url() == route('post.index')){
                                    echo "
                                    <ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('category.index').">
                                                <span class='nav-main-link-name'>Category</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link active' href=".route('post.index').">
                                                <span class='nav-main-link-name'>Post</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('blog.settings').">
                                                <span class='nav-main-link-name'>Settings</span>
                                            </a>
                                        </li>
                                    </ul>";
                                }elseif(Request::url() == route('blog.settings')){
                                    echo "
                                    <ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('category.index').">
                                                <span class='nav-main-link-name'>Category</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link' href=".route('post.index').">
                                                <span class='nav-main-link-name'>Post</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class='nav-main-submenu'>
                                        <li class='nav-main-item'>
                                            <a class='nav-main-link active' href=".route('blog.settings').">
                                                <span class='nav-main-link-name'>Settings</span>
                                            </a>
                                        </li>
                                    </ul>";
                                }
                            echo "</li>";
                        }else{
                            echo "
                            <li class='nav-main-item'>
                                <a class='nav-main-link nav-main-link-submenu' data-toggle='submenu' aria-haspopup='false' aria-expanded='false' href='#'>
                                    <i class='nav-main-link-icon si si-pencil'></i>
                                    <span class='nav-main-link-name'>Blog</span>
                                </a>
                                <ul class='nav-main-submenu'>
                                    <li class='nav-main-item'>
                                        <a class='nav-main-link' href=".route('category.index').">
                                            <span class='nav-main-link-name'>Category</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class='nav-main-submenu'>
                                    <li class='nav-main-item'>
                                        <a class='nav-main-link' href=".route('post.index').">
                                            <span class='nav-main-link-name'>Post</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class='nav-main-submenu'>
                                    <li class='nav-main-item'>
                                        <a class='nav-main-link' href=".route('blog.settings').">
                                            <span class='nav-main-link-name'>Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>";
                        }            
                    ?>

                    <?php 

                    if(Request::url() == url('/dashboard/profile')){
                        echo '
                        <li class="nav-main-item open">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                <i class="nav-main-link-icon si si-fire"></i>
                                <span class="nav-main-link-name">Settings</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link active" href="/dashboard/profile">
                                        <span class="nav-main-link-name">Edit Profile</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a href="{{ route("logout") }}"
                                    onclick="event.preventDefault(); document.getElementById("logout-account").submit();" class="nav-main-link">
                                    <span class="nav-main-link-name">Logout</span>
                                    </a>
                                    <form id="logout-account" action='.route("logout").' method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>';
                    }else{
                        echo '
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-fire"></i>
                                <span class="nav-main-link-name">Settings</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link " href="/dashboard/profile">
                                        <span class="nav-main-link-name">Edit Profile</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a href="{{ route("logout") }}"
                                    onclick="event.preventDefault(); document.getElementById("logout-account").submit();" class="nav-main-link">
                                    <span class="nav-main-link-name">Logout</span>
                                    </a>
                                    <form id="logout-account" action='. route("logout") .' method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>';
                    }
                        
                    ?>

                    
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->
