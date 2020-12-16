<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="https://vuejs.org/images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Latihan Vue.js di Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm row">
            <a class="navbar-brand mx-4" href="{{ url('/') }}">
                <img src="https://vuejs.org/images/logo.png" height="50px">
                <span class="font-weight-bold"> Vue.js <sub class="font-weight-light">feat Laravel</sub></span>
            </a>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
    @yield("script")
</body>
</html>
