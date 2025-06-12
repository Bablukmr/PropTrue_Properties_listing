<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>
    <base href="{{ asset('admincss') }}/" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- @yield('extraCss') -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.form') }}" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown">
                        <i class="far fa-bell"></i>
                        <!-- <i class="fa-solid fa-user"></i> -->

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}" role="button"> <i
                            class="fas fa-sign-out-alt"></i>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/sico.png" alt="PropTrue" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">PropTrue</span>
            </a>
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    @php
                        $admin = Auth::guard('admin')->user();
                    @endphp



                    @if ($admin->permission->all_property)
                        <li class="nav-item">
                            <a href="{{ route('admin.properties.list') }}"
                                class="nav-link {{ Request::is('admin/properties') ? 'active' : '' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>All Properties</p>
                            </a>
                        </li>
                    @endif


                    @if ($admin->permission->featured_image)
                        <li class="nav-item">
                            <a href="{{ route('admin.properties.indexfetured') }}"
                                class="nav-link {{ Request::is('admin/propertiesfeatured') ? 'active' : '' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Featured Properties</p>
                            </a>
                        </li>
                    @endif

                    @if ($admin->permission->add_now)
                        <li class="nav-item">
                            <a href="{{ route('admin.propertylisting') }}"
                                class="nav-link {{ Request::is('admin/propertylisting') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add New Property</p>
                            </a>
                        </li>
                    @endif




                    {{-- @if ($admin->permission->blog) --}}
                        <!-- ====BLOG Master ==== -->
                        <li
                            class="nav-item {{ Request::is('admin/sell*','admin/contact*','admin/enquiryformlist*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/timeslot*', 'admin/prices*', 'admin/disabled_dates*', 'admin/booking_dates*') ? 'active' : '' }}">
                                <i class="fas fa-envelope-open-text nav-icon"></i>
                                <p>
                                    Sell & Contact Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
<<<<<<< HEAD
                                  <li class="nav-item">
                            <a href="{{ route('admin.enquiryformlist') }}"
                                class="nav-link {{ Request::is('admin/enquiryformlist') ? 'active' : '' }}">
                                <i class="fas fa-envelope-open-text nav-icon"></i>
                                <p>Property Enquiry</p>
                            </a>
                        </li>
=======
>>>>>>> 5920c52aed519dcafc7d8809b6fe0a3d306ac77d
                                <li class="nav-item">
                                    <a href="{{ route('admin.property.sell') }}"
                                        class="nav-link {{ Request::is('admin/sell') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sell Enquiry List</p>
                                    </a>
                                </li>
                                  {{-- @if ($admin->permission->property_image) --}}
<<<<<<< HEAD

=======
                        <li class="nav-item">
                            <a href="{{ route('admin.enquiryformlist') }}"
                                class="nav-link {{ Request::is('admin/enquiryformlist') ? 'active' : '' }}">
                                <i class="fas fa-envelope-open-text nav-icon"></i>
                                <p>Property Enquiry</p>
                            </a>
                        </li>
>>>>>>> 5920c52aed519dcafc7d8809b6fe0a3d306ac77d
                    {{-- @endif --}}
                                <li class="nav-item">
                                    <a href="{{ route('admin.property.indexcontact') }}"
                                        class="nav-link {{ Request::is('admin/contact') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact Us List</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.property.sell.create') }}"
                                        class="nav-link {{ Request::is('admin/sell/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Sell</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    {{-- @endif --}}
                    @if ($admin->permission->our_team)
                        <li class="nav-item">
                            <a href="{{ route('our_team.index') }}"
                                class="nav-link {{ Request::is('admin/ourteam') ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Our Team</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user_permission.index') }}"
                                class="nav-link {{ Request::is('admin/user-permission') ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>User Permission</p>
                            </a>
                        </li>
                    @endif


                    <!--<li class="nav-item">-->
                    <!--    <a href=""-->
                    <!--        class="nav-link {{ Request::is('admin/blog') ? 'active' : '' }}">-->
                    <!--      <i class="fas fa-newspaper nav-icon"></i>-->

                    <!--        <p>Blog</p>-->
                    <!--    </a>-->
                    <!--</li>-->


                    @if ($admin->permission->blog)
                        <!-- ====BLOG Master ==== -->
                        <li
                            class="nav-item {{ Request::is('admin/blogs*', 'admin/prices*', 'admin/disabled_dates*', 'admin/booking_dates*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/timeslot*', 'admin/prices*', 'admin/disabled_dates*', 'admin/booking_dates*') ? 'active' : '' }}">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>
                                    Blog
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.blogs.index') }}"
                                        class="nav-link {{ Request::is('admin/blogs') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blog List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blogs.indexhome') }}"
                                        class="nav-link {{ Request::is('admin/blogs/home') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blog List For Home Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blogs.create') }}"
                                        class="nav-link {{ Request::is('admin/blogs/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Blog</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endif

                    @if ($admin->permission->blog)
                        <!-- ==== Careers Master ==== -->
                        <li
                            class="nav-item {{ Request::is('admin/career*', 'admin/prices*', 'admin/disabled_dates*', 'admin/booking_dates*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/timeslot*', 'admin/prices*', 'admin/disabled_dates*', 'admin/booking_dates*') ? 'active' : '' }}">
                                <i class="fas fa-briefcase nav-icon"></i>

                                <p>
                                    Careers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.career.opening.create') }}"
                                        class="nav-link {{ Request::is('admin/career/opening/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Openings</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.career.opening') }}"
                                        class="nav-link {{ Request::is('admin/career/opening') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Openings</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.career.joinussubmitionlist') }}"
                                        class="nav-link {{ Request::is('admin/career/joinussubmitionlist') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Join Us Submition</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.career.associateussubmitionlist') }}"
                                        class="nav-link {{ Request::is('admin/career/associateussubmitionlist') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Associates Us Submition </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endif


                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" class="nav-link">
                            <i class="fas fa-sign-out-alt nav-icon"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    <!-- Add other nav-items similarly -->
                </ul>
            </nav>

            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->

    @yield('content')
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2025 <a href="/">PropTrue</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    @yield('extraJs')
</body>

</html>
