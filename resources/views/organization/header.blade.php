 <!-- Navigation Bar-->
 <header id="topnav">
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
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="dripicons-user text-muted"></i> Profile</a>

                            <div class="dropdown-divider"></div>
                           <a href="dropdown-item" class=""> <div class="dropdown-item" >
                             <i class="dripicons-exit text-muted" ></i>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                          
                        </div>
                    </a>
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
                        <a href="#"><i class="fa fa-book"></i>My Courses</a>
                        
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

                    <li class="has-submenu">
                        <a href="{{route('employee.index') }}"><i class="fa fa-user"></i>Employee</a>
                        
                    </li>



                    <li class="has-submenu">
                        <a href="#"><i class="fa fa-plus"></i>Assign Course</a>
                        
                    </li>


                  

                    <li class="has-submenu">
                        <a href="#"><i class="fa fa-building"></i>Employee Courses</a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="#">Employe 1</a>
                                <ul class="submenu">
                                    <li><a href="form-elements.html">Course 1</a></li>
                                    <li><a href="form-validation.html">Course 2</a></li>
                                    <li><a href="form-advanced.html">Form Advanced</a></li>
                                    <li><a href="form-editors.html">Form Editors</a></li>
                                    <li><a href="form-uploads.html">Form File Upload</a></li>
                                    <li><a href="form-mask.html">Form Mask</a></li>
                                    <li><a href="form-summernote.html">Summernote</a></li>
                                    <li><a href="form-xeditable.html">Form Xeditable</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#">Employe 2</a>
                                <ul class="submenu">
                                    <li><a href="icons-material.html">Material Design</a></li>
                                    <li><a href="icons-ion.html">Ion Icons</a></li>
                                    <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                    <li><a href="icons-themify.html">Themify Icons</a></li>
                                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                                    <li><a href="icons-typicons.html">Typicons Icons</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="calendar.html">Employe 3</a>
                            </li>
                            <li class="has-submenu">
                                <a href="#">emp 4</a>
                                <ul class="submenu">
                                    <li><a href="charts-morris.html">Morris Chart</a></li>
                                    <li><a href="charts-chartist.html">Chartist Chart</a></li>
                                    <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                                    <li><a href="charts-flot.html">Flot Chart</a></li>
                                    <li><a href="charts-c3.html">C3 Chart</a></li>
                                    <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                                </ul>
                            </li>
                          
                       
                    </li>


                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->











