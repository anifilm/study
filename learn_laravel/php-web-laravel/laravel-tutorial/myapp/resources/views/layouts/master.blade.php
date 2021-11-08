<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>라라벨 입문</title>
    </head>
    <body>

        @yield('style')
        @yield('content')
        @yield('script')

    </body>
</html>
