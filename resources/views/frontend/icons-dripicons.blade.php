<!DOCTYPE html>
<html>
    
<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/icons-dripicons.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Mar 2018 13:17:30 GMT -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Upcube - Responsive Flat Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                        <!--Upcube-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="index-2.html" class="logo">
                            <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-small">
                            <img src="assets/images/logo.png" alt="" height="24" class="logo-large">
                        </a>

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
                            <!-- Messages-->
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
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="assets/images/users/avatar-2.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                        <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="assets/images/users/avatar-3.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                        <p class="notify-details"><b>Thomas J. Mimms</b><small class="text-muted">You have 87 unread messages</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="assets/images/users/avatar-4.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                        <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                    </a>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        View All
                                    </a>

                                </div>
                            </li>
                            <!-- notification-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                    <span class="badge badge-danger noti-icon-badge">3</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>Notification (3)</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                        <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                        <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                    </a>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        View All
                                    </a>

                                </div>
                            </li>
                            <!-- User-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                                    <a class="dropdown-item" href="#"><span class="badge badge-success pull-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted"></i> Logout</a>
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
                                <a href="index-2.html"><i class="ti-home"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-light-bulb"></i>User Interface</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="ui-buttons.html">Buttons</a></li>
                                            <li><a href="ui-cards.html">Cards</a></li>
                                            <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                            <li><a href="ui-modals.html">Modals</a></li>
                                            <li><a href="ui-images.html">Images</a></li>
                                            <li><a href="ui-alerts.html">Alerts</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                            <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                            <li><a href="ui-lightbox.html">Lightbox</a></li>
                                            <li><a href="ui-navs.html">Navs</a></li>
                                            <li><a href="ui-pagination.html">Pagination</a></li>
                                            <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="ui-badge.html">Badge</a></li>
                                            <li><a href="ui-carousel.html">Carousel</a></li>
                                            <li><a href="ui-video.html">Video</a></li>
                                            <li><a href="ui-typography.html">Typography</a></li>
                                            <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                                            <li><a href="ui-grid.html">Grid</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-crown"></i>Advanced UI</a>
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
                                <a href="#"><i class="ti-bookmark-alt"></i>Components</a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                        <a href="#">Forms</a>
                                        <ul class="submenu">
                                            <li><a href="form-elements.html">Form Elements</a></li>
                                            <li><a href="form-validation.html">Form Validation</a></li>
                                            <li><a href="form-advanced.html">Form Advanced</a></li>
                                            <li><a href="form-editors.html">Form Editors</a></li>
                                            <li><a href="form-uploads.html">Form File Upload</a></li>
                                            <li><a href="form-mask.html">Form Mask</a></li>
                                            <li><a href="form-summernote.html">Summernote</a></li>
                                            <li><a href="form-xeditable.html">Form Xeditable</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Icons</a>
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
                                        <a href="calendar.html">Calendar</a>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Charts</a>
                                        <ul class="submenu">
                                            <li><a href="charts-morris.html">Morris Chart</a></li>
                                            <li><a href="charts-chartist.html">Chartist Chart</a></li>
                                            <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                                            <li><a href="charts-flot.html">Flot Chart</a></li>
                                            <li><a href="charts-c3.html">C3 Chart</a></li>
                                            <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Tables </a>
                                        <ul class="submenu">
                                            <li><a href="tables-basic.html">Basic Tables</a></li>
                                            <li><a href="tables-datatable.html">Data Table</a></li>
                                            <li><a href="tables-responsive.html">Responsive Table</a></li>
                                            <li><a href="tables-editable.html">Editable Table</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Maps</a>
                                        <ul class="submenu">
                                            <li><a href="maps-google.html"> Google Map</a></li>
                                            <li><a href="maps-vector.html"> Vector Map</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-files"></i>Pages</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="pages-timeline.html">Timeline</a></li>
                                            <li><a href="pages-invoice.html">Invoice</a></li>
                                            <li><a href="pages-directory.html">Directory</a></li>
                                            <li><a href="pages-login.html">Login</a></li>
                                            <li><a href="pages-register.html">Register</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                            <li><a href="pages-blank.html">Blank Page</a></li>
                                            <li><a href="pages-404.html">Error 404</a></li>
                                            <li><a href="pages-500.html">Error 500</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Upcube</a></li>
                                    <li class="breadcrumb-item"><a href="#">UI</a></li>
                                    <li class="breadcrumb-item active">Dripicons</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dripicons</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Examples</h4>
                                            <p class="text-muted m-b-30 font-14">Use <code>&lt;i
                                                class="dripicons-zoom-out"&gt;&lt;/i&gt;</code>.
                                            </p>

                                            <div class="row icon-demo-content">
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-alarm"></i> dripicons-alarm
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-align-center"></i> dripicons-align-center
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-align-justify"></i> dripicons-align-justify
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-align-left"></i> dripicons-align-left
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-align-right"></i> dripicons-align-right
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-anchor"></i> dripicons-anchor
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-archive"></i> dripicons-archive
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-arrow-down"></i> dripicons-arrow-down
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-arrow-left"></i> dripicons-arrow-left
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-arrow-right"></i> dripicons-arrow-right
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-arrow-thin-down"></i> dripicons-arrow-thin-down
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-arrow-thin-left"></i> dripicons-arrow-thin-left
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-arrow-thin-right"></i> dripicons-arrow-thin-right
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-arrow-thin-up"></i> dripicons-arrow-thin-up
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-arrow-up"></i> dripicons-arrow-up
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class=" dripicons-article"></i> dripicons-article
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-backspace"></i> dripicons-backspace
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-basket"></i> dripicons-basket
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-basketball"></i> dripicons-basketball
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-battery-empty"></i> dripicons-battery-empty
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-battery-full"></i> dripicons-battery-full
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-battery-low"></i> dripicons-battery-low
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-battery-medium"></i> dripicons-battery-medium
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-bell"></i> dripicons-bell
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-blog"></i> dripicons-blog
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-bluetooth"></i> dripicons-bluetooth
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-bold"></i> dripicons-bold
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-bookmark"></i> dripicons-bookmark
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-bookmarks"></i> dripicons-bookmarks
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-box"></i> dripicons-box
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-briefcase"></i> dripicons-briefcase
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-brightness-low"></i> dripicons-brightness-low
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-brightness-max"></i> dripicons-brightness-max
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-brightness-medium"></i> dripicons-brightness-medium
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-broadcast"></i> dripicons-broadcast
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-browser"></i> dripicons-browser
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-browser-upload"></i> dripicons-browser-upload
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-brush"></i> dripicons-brush
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-calendar"></i> dripicons-calendar
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-camcorder"></i> dripicons-camcorder
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-camera"></i> dripicons-camera
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-card"></i> dripicons-card
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-cart"></i> dripicons-cart
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-checklist"></i> dripicons-checklist
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-checkmark"></i> dripicons-checkmark
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-chevron-down"></i> dripicons-chevron-down
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-chevron-left"></i> dripicons-chevron-left
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-chevron-right"></i> dripicons-chevron-right
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-chevron-up"></i> dripicons-chevron-up
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-clipboard"></i> dripicons-clipboard
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-clock"></i> dripicons-clock
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-clockwise"></i> dripicons-clockwise
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-cloud"></i> dripicons-cloud
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-cloud-download"></i> dripicons-cloud-download
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-cloud-upload"></i> dripicons-cloud-upload
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-code"></i> dripicons-code
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-contract"></i> dripicons-contract
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-contract-2"></i> dripicons-contract-2
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-conversation"></i> dripicons-conversation
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-copy"></i> dripicons-copy
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-crop"></i> dripicons-crop
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-cross"></i> dripicons-cross
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-crosshair"></i> dripicons-crosshair
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-cutlery"></i> dripicons-cutlery
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-device-desktop"></i> dripicons-device-desktop
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-device-mobile"></i> dripicons-device-mobile
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-device-tablet"></i> dripicons-device-tablet
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-direction"></i> dripicons-direction
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-disc"></i> dripicons-disc
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-document"></i> dripicons-document
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-document-delete"></i> dripicons-document-delete
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-document-edit"></i> dripicons-document-edit
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-document-new"></i> dripicons-document-new
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-document-remove"></i> dripicons-document-remove
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-dot"></i> dripicons-dot
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-dots-2"></i> dripicons-dots-2
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-dots-3"></i> dripicons-dots-3
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-download"></i> dripicons-download
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-duplicate"></i> dripicons-duplicate
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-enter"></i> dripicons-enter
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-exit"></i> dripicons-exit
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-expand"></i> dripicons-expand
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-expand-2"></i> dripicons-expand-2
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-experiment"></i> dripicons-experiment
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-export"></i> dripicons-export
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-feed"></i> dripicons-feed
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-flag"></i> dripicons-flag
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-flashlight"></i> dripicons-flashlight
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-folder"></i> dripicons-folder
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-folder-open"></i> dripicons-folder-open
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-forward"></i> dripicons-forward
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-gaming"></i> dripicons-gaming
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-gear"></i> dripicons-gear
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-graduation"></i> dripicons-graduation
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-graph-bar"></i> dripicons-graph-bar
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-graph-line"></i> dripicons-graph-line
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-graph-pie"></i> dripicons-graph-pie
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-headset"></i> dripicons-headset
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-heart"></i> dripicons-heart
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-help"></i> dripicons-help
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-home"></i> dripicons-home
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-hourglass"></i> dripicons-hourglass
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-inbox"></i> dripicons-inbox
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-information"></i> dripicons-information
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-italic"></i> dripicons-italic
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-jewel"></i> dripicons-jewel
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-lifting"></i> dripicons-lifting
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-lightbulb"></i> dripicons-lightbulb
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-link"></i> dripicons-link
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-link-broken"></i> dripicons-link-broken
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-list"></i> dripicons-list
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-loading"></i> dripicons-loading
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-location"></i> dripicons-location
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-lock"></i> dripicons-lock
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-lock-open"></i> dripicons-lock-open
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-mail"></i> dripicons-mail
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-map"></i> dripicons-map
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-media-loop"></i> dripicons-media-loop
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-media-next"></i> dripicons-media-next
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-media-pause"></i> dripicons-media-pause
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-media-play"></i> dripicons-media-play
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-media-previous"></i> dripicons-media-previous
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-media-record"></i> dripicons-media-record
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-media-shuffle"></i> dripicons-media-shuffle
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-media-stop"></i> dripicons-media-stop
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-medical"></i> dripicons-medical
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-menu"></i> dripicons-menu
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-message"></i> dripicons-message
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-meter"></i> dripicons-meter
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-microphone"></i> dripicons-microphone
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-minus"></i> dripicons-minus
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-monitor"></i> dripicons-monitor
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-move"></i> dripicons-move
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-music"></i> dripicons-music
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-network-1"></i> dripicons-network-1
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-network-2"></i> dripicons-network-2
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-network-3"></i> dripicons-network-3
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-network-4"></i> dripicons-network-4
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-network-5"></i> dripicons-network-5
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-pamphlet"></i> dripicons-pamphlet
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-paperclip"></i> dripicons-paperclip
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-pencil"></i> dripicons-pencil
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-phone"></i> dripicons-phone
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-photo"></i> dripicons-photo
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-photo-group"></i> dripicons-photo-group
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-pill"></i> dripicons-pill
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-pin"></i> dripicons-pin
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-plus"></i> dripicons-plus
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-power"></i> dripicons-power
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-preview"></i> dripicons-preview
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-print"></i> dripicons-print
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-pulse"></i> dripicons-pulse
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-question"></i> dripicons-question
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-reply"></i> dripicons-reply
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-reply-all"></i> dripicons-reply-all
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-return"></i> dripicons-return
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-retweet"></i> dripicons-retweet
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-rocket"></i> dripicons-rocket
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-scale"></i> dripicons-scale
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-search"></i> dripicons-search
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-shopping-bag"></i> dripicons-shopping-bag
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-skip"></i> dripicons-skip
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-stack"></i> dripicons-stack
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-star"></i> dripicons-star
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-stopwatch"></i> dripicons-stopwatch
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-store"></i> dripicons-store
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-suitcase"></i> dripicons-suitcase
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-swap"></i> dripicons-swap
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-tag"></i> dripicons-tag
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-tag-delete"></i> dripicons-tag-delete
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-tags"></i> dripicons-tags
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-thumbs-down"></i> dripicons-thumbs-down
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-thumbs-up"></i> dripicons-thumbs-up
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-ticket"></i> dripicons-ticket
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-time-reverse"></i> dripicons-time-reverse
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-to-do"></i> dripicons-to-do
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-toggles"></i> dripicons-toggles
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-trash"></i> dripicons-trash
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-trophy"></i> dripicons-trophy
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-upload"></i> dripicons-upload
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-user"></i> dripicons-user
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-user-group"></i> dripicons-user-group
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-user-id"></i> dripicons-user-id
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-vibrate"></i> dripicons-vibrate
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-view-apps"></i> dripicons-view-apps
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-view-list"></i> dripicons-view-list
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-view-list-large"></i> dripicons-view-list-large
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-view-thumb"></i> dripicons-view-thumb
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-volume-full"></i> dripicons-volume-full
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-volume-low"></i> dripicons-volume-low
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-volume-medium"></i> dripicons-volume-medium
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-volume-off"></i> dripicons-volume-off
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-wallet"></i> dripicons-wallet
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-warning"></i> dripicons-warning
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-web"></i> dripicons-web
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-weight"></i> dripicons-weight
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-wifi"></i> dripicons-wifi
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-wrong"></i> dripicons-wrong
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-zoom-in"></i> dripicons-zoom-in
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <i class="dripicons-zoom-out"></i> dripicons-zoom-out
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->


            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © 2018 Upcube - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/icons-dripicons.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Mar 2018 13:17:30 GMT -->
</html>