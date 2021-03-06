<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
  
<meta name="google-site-verification" content="80Dy3X7vUH1Zk5c7NKmt0i0pdNGhZ7qyvbNxjaQyaC8" />
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <meta name="theme-color" content="#0470dc">
    <meta name="description" content="{{ isset($description) ? $description : '' }}">
</head>
<body>
    @yield('content')
</body>
<link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('styles/master.css') }}">
<link rel="stylesheet" href="{{ asset('styles/slick.css') }}">
<link rel="stylesheet" href="{{ asset('styles/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('styles/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('styles/star-rating-svg.css') }}">
<link rel="stylesheet" href="{{ asset('styles/chart.min.css') }}">
<link rel="stylesheet" href="{{ asset('styles/leaflet.css') }}">
<link rel="stylesheet" href="{{ asset('styles/RBSlideshow.css') }}" />
<link rel="stylesheet" href="{{ asset('styles/bootstrap-datepicker.css') }}" />
<link href="{{ asset('styles/responsive.css') }}" rel="stylesheet" />
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>
@stack('scripts')

</html>
