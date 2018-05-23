<!doctype html>
<html lang="fa_IR" dir="rtl" itemscope itemtype="http://schema.org/WebPage">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/exporter/app.css')}}">
    @yield('header')
</head>
<body>

<div class="container mt-5 p-3 border border-gray bg-white">
    @yield('content')
</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
@yield('footer')
</body>
</html>