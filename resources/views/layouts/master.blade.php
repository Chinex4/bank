<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> Citi - Dashboard </title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- datepicker -->
        <link href="../plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ route('dashboard-page') }}" class="logo">
                        <span class="logo-light">
                            <img src="{{ asset('images/logo.png') }}" width="100" alt="" height="40">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="22">
                        </span>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">
                        <li class="dropdown notification-list list-inline-item">
                                    <div class="dropdown notification-list nav-pro-img">
                                        <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            @if(Auth::user()->image)
                                            <img src="{{ asset('/'.Auth::user()->image) }}" alt="user-img" title="" class="rounded-circle">
                                            @endif
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                            <!-- item-->
                                            <a class="dropdown-item" href="{{ route('profile-page') }}"><i class="mdi mdi-account-circle"></i> Profile</a>
                                            <a class="dropdown-item" href="{{ route('dashboard-page') }}"><i class="mdi mdi-wallet"></i> My Wallet</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                <i class="mdi mdi-power text-danger"></i>
                                                 {{ __('Logout') }}
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        @include('layouts.left-menu')

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            @yield('content')
</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/metismenu.min.js"></script>
<script src="/assets/js/jquery.slimscroll.js"></script>
<script src="/assets/js/waves.min.js"></script>

<!-- datepicker -->
<script src="../plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- vector map  -->
<script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- apexcharts -->
<script src="../plugins/apexcharts/apexcharts.min.js"></script>

<!-- Peity JS -->
<script src="../plugins/peity-chart/jquery.peity.min.js"></script>

<script src="/assets/pages/dashboard.js"></script>
@include('sweetalert::alert')
<!-- App js -->
<script src="/assets/js/app.js"></script>
@include('layouts.message')
@stack('scripts')
</body>

</html>
