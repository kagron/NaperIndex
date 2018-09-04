<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token which isn't used but hey why not -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Make our title the app name or default to Laravel if it cant find it -->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- bootstrap classes on everything on the app, with an id of app for VueJS -->
        <div class="flex-center position-ref full-height" id="app">
            @yield('content')
        </div>
    </body>
</html>
