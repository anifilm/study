<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>라라벨 입문</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        {{--블레이드 주석 안에서 {{ $name }}을(를) 출력합니다.--}}
        <h1>{{ $greeting ?? 'Hello ' }} {{ $name ?? '' }}</h1>

        @if($itemCount = count($items))
            <p>{{ $itemCount }} 종류의 과일이 있습니다.</p>
        @else
            <p>엥~ 아무것도 없는데요!</p>
        @endif

        {{--@foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach--}}

        @forelse($items as $item)
            <li>{{ $item }}</li>
        @empty
            <li>엥~ 아무것도 없는데요!</li>
        @endforelse

        @extends('layouts.master')

        @section('style')
            <style>
                body { background: #498f49; color: white; }
            </style>
        @endsection

        @section('content')
            <p>저는 자식 뷰의 'content' 섹션입니다.</p>

            @include('partials.footer')
        @endsection

        @section('script')
            <script>
                alert('저는 자식 뷰의 \'script\' 섹션입니다.');
            </script>
        @endsection

    </body>
</html>
