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

<!-- Start content -->
@yield('content')
<!-- content -->

@include('layouts.vendor-scripts')

</body>

</html>
