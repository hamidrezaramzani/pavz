<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/master.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/fullpage.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/all.min.css') }}">
</head>

<body>
    @yield('content')
</body>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fullpage.min.js') }}"></script>
<script src="{{ asset('js/fullpage.extensions.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</html>
