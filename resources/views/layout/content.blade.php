<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/master.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/star-rating-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/RBSlideshow.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/persian-datepicker.min.css') }}" />
    <link href="{{ asset('styles/mobiscroll.jquery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('styles/responsive.css') }}" rel="stylesheet" />


</head>

<body>
    @yield('content')

</body>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/multi-animated-counter.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>
@stack('scripts')

</html>
