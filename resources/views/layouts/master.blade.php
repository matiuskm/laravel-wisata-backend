<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title> @yield('title')| {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Taman Wisata karya anak bangsa" name="description">
    <meta name="keywords" content="taman wisata, fic 17, saiful bahri, flutter course, online course">
    <meta content="Lazycoder" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">

    @include('layouts.head-css')
</head>

@yield('body')
<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.topbar')
    @include('layouts.sidebar')

    <!-- Begin page -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- end container -->
            </div>
            <!-- end page content -->
            @include('layouts.footer')
        </div>
        <!-- end main content -->
    </div>
    <!-- END wrapper -->

    <!-- right sidebar file here  -->
    @include('layouts.right-sidebar')
    <!-- script file here -->
    @include('layouts.vendor-scripts')
    </body>

</html>
