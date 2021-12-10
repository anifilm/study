<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.partial.navigation')

        {{-- 13.1.3 플래시 메시지 --}}
        {{--@if(session()->has('flash_message'))
            <div class="alert alert-info" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif--}}
        <div class="container">
            @include('flash::message')
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.partial.footer')
    </div>
</body>
</html>
