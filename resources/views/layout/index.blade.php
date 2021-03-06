<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    @include('icons.preloader')
    @include('layout.header')
    @include('layout.burger_menu')

    <div class="main-content">
        @yield('content')
    </div>

    @include('layout.footer')
<script src="{{ mix('/js/app.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/manifest.js') }}"></script>

@stack('footer-scripts')

</body>
</html>
