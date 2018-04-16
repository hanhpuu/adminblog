<!DOCTYPE html>
<html lang="en">
<head>
    <title>Puu's blog @yield('title')</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">

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
@yield('frontend.layouts.footer')
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
@section('js')
        @show
</body>
</html>