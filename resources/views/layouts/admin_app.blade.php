<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('resources/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}"
          rel="stylesheet">
    <!-- toast CSS -->

    <link href="{{ asset('resources/assets/css/toastr.min.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('resources/assets/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('resources/assets/plugins/bower_components/chartist-js/dist/chartist.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('resources/assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}"
          rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('resources/assets/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('resources/assets/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">


    <!-- color CSS -->

</head>
<body class="fix-header">

<div id="wrapper">

    <!-- Preloader -->
    <!-- ============================================================== -->

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>

    <!-- Topbar header - style you can find in pages.scss -->

    <!-- ============================================================== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="{{action('Admin\User_CT@index')}}">
                    {{ config('app.name', 'Laravel') }} Admin Panel
                   </a>
            </div>
            <!-- /Logo -->
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>

    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span>
                </h3>
            </div>
            <ul class="nav" id="side-menu">
                <li style="padding: 70px 0 0;">
                    <a href="{{action('Admin\User_CT@index')}}" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>DashBoard</a>
                </li>
                <li>
                    <a href="{{action('Admin\User_Profile_CT@create')}}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
                </li>
                <li>
                    <a href="{{action('Admin\User_Add_CT@index')}}" class="waves-effect"><i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i>Advertisement</a>
                </li>
                <li>
                    <a href="{{action('Admin\User_Event_CT@index')}}" class="waves-effect"><i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i>Events</a>
                </li>
                <li>
                    <a href="{{action('Admin\User_Article_CT@index')}}" class="waves-effect"><i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i>Articles</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
        @yield('content')
    </div>

</div>

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}


</body>
<script src="{{ asset('resources/assets/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('resources/assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/custom.js') }}"></script>
<script src="{{ asset('resources/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('resources/assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
<script src="{{ asset('resources/assets/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('resources/assets/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('resources/assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('resources/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/js/dashboard1.js') }}"></script>
<script src="{{ asset('resources/assets/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

    $('.date').datepicker({

        format: 'yyyy-mm-dd'

    });

    @if(Session::has('success'))
        toastr.success('{{Session::get('success')}}')
    @endif
    @if(Session::has('error'))
        toastr.error('{{Session::get('error')}}');
    @endif

</script>
</html>
