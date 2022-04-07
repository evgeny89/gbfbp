<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} admin-panel</title>
    <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
</head>
<body>
@yield('content')

<script src="{{ mix('/js/app.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/manifest.js') }}"></script>

@stack('footer-scripts')

</body>
</html>
