<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title> @yield('title') | @if(getSetting()) {{getSetting()->title}} @else OTCM @endif</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
    @include('layouts.head-css')
</head>

@section('body')
    <body data-sidebar="dark">
    @include('layouts.preloader')
    @show

    <!-- Begin page -->
    <div id="layout-wrapper">
    @include('layouts.topbar_secondry')
    @include('layouts.sidebar_secondry')
    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                    @include('components.help_section')
                </div> <!-- content -->
            </div>
            @include('layouts.footer')
            @include('components.modals')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <!-- END Right Sidebar -->

    @include('layouts.vendor-scripts')
    </body>

</html>
