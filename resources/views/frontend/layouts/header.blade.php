



   <!-- Loader -->
        {{-- <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div> --}}
 <!-- Navigation Bar-->
 <header id="topnav">
    @if(Auth::check())


    @if(Auth::user()->usertype == 'employee')
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <a href="#" class="logo">
                Grow
                </a>
                <!-- Image Logo -->

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input" type="search" placeholder="Search" />
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <ul class="list-inline float-right mb-0">
                    <!-- Search -->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                            <i class="mdi mdi-magnify noti-icon"></i>
                        </a>
                    </li>

                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                           <div>{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="dripicons-user text-muted"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="dripicons-exit text-muted"></i> Log Out
                            </a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ route('home') }}"><i class="ti-home"></i>Dashboard</a>
                    </li>

                    <li class="has-submenu">
                        <a href="{{ route('empCourse.index', ['id' => auth()->id()]) }}"><i class="fa fa-book"></i>My Courses</a>

                            <ul class="submenu">
                                <li><a href="advanced-animation.html">Animation</a></li>
                                <li><a href="advanced-highlight.html">Highlight</a></li>
                                <li><a href="advanced-rating.html">Rating</a></li>
                                <li><a href="advanced-nestable.html">Nestable</a></li>
                                <li><a href="advanced-alertify.html">Alertify</a></li>
                                <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                                <li><a href="advanced-sessiontimeout.html">Session Timeout</a></li>
                            </ul>

                    </li>
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->


    @elseif(Auth::user()->usertype == 'organization')
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <a href="#" class="logo">
                Grow
                </a>
                <!-- Image Logo -->

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input" type="search" placeholder="Search" />
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <ul class="list-inline float-right mb-0">

                    <!-- Search -->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                            <i class="mdi mdi-magnify noti-icon"></i>
                        </a>
                    </li>

                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                           <div>{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="dripicons-user text-muted"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="dripicons-exit text-muted"></i> Log Out
                            </a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>



                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ route('home') }}"><i class="ti-home"></i>Dashboard</a>
                    </li>

                    <li class="has-submenu">
                        <a href="{{ route('orgCourse.index', ['id' => auth()->id()]) }}">
                            <i class="fa fa-book"></i> My Courses
                        </a>



                    </li>

                    <li class="has-submenu">
                        <a href="{{route('user.index') }}"><i class="fa fa-user"></i>Employee</a>

                    </li>











                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->


    @else

    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <a href="{{ route('home') }}" class="logo">
                Grow
                </a>
                <!-- Image Logo -->

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                       <!-- Search input -->
                       <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">

                            <input id="searchInput" class="search-input" type="search" placeholder="Search" />
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div>

                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-email-outline noti-icon"></i>
                                <span class="badge badge-danger noti-icon-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">745</span>Messages</h5>
                                </div>

                                <!-- item-->
                                <a href="{{ url('chat/user') }}" class="dropdown-item notify-item">
                                    <div class="notify-icon"><img src="{{ asset('frontend/assets/images/users/avatar-2.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                    <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>



                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    View All
                                </a>

                            </div>
                        </li>
                        <!-- Search -->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                                <i class="mdi mdi-magnify noti-icon"></i>
                            </a>
                        </li>

                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                           <div>{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="dripicons-user text-muted"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="dripicons-exit text-muted"></i> Log Out
                                </button>
                            </form>
                        </div>
                    </li>




                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ route('home') }}"><i class="ti-home"></i>Dashboard</a>
                    </li>

                    <li class="has-submenu">
                        <a href="{{ route('course.index') }}"><i class="fa fa-book"></i>Courses</a>

                            {{-- <ul class="submenu">
                                <li><a href="advanced-animation.html">Animation</a></li>
                                <li><a href="advanced-highlight.html">Highlight</a></li>
                                <li><a href="advanced-rating.html">Rating</a></li>
                                <li><a href="advanced-nestable.html">Nestable</a></li>
                                <li><a href="advanced-alertify.html">Alertify</a></li>
                                <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                                <li><a href="advanced-sessiontimeout.html">Session Timeout</a></li>
                            </ul> --}}

                    </li>

                    <li class="has-submenu">
                        <a href="{{ route('category.index') }}"><i class="fa fa-plus"></i>Categories</a>

                    </li>


                    <li class="has-submenu">
                        <a href="{{ route('user.index') }}"><i class="fa fa-user"></i>Employee</a>

                    </li>


                    <li class="has-submenu">
                        <a href="{{ route('organization.index') }}"><i class="fa fa-building"></i>Organizations</a>
                       </li>

                </ul>

                <!-- End navigation menu -->

            </div> <!-- end #navigation -->

        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
    @endif

    @else
    @include('auth.login')
    @endif
</header>
<!-- End Navigation Bar-->











