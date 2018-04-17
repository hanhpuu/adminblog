<!DOCTYPE html>
<html lang="en">
<head>
    <title>Puu's blog @yield('title')</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('meStyle.css') }}">

    @section('css')
        @show
</head>
<body>
<div class="outer-container">
<!-- .container -->
@include('frontend.layouts.header')
    <!-- .container -->
    @yield('content')
</div><!-- .outer-container -->

<!-- .sit-footer -->
@include('frontend.layouts.footer')
<script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/swiper.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/custom.js') }}"></script>
@section('js')
        @show
</body>
</html>