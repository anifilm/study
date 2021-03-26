{{--<h1><?= isset($greeting) ? "{$greeting} " : 'hello '; ?><?= $name; ?></h1>--}}
<h1>{{ $greeting ?? 'Hello ' }} {{ $name ?? '' }}</h1>

@if($itemCount = count($items))
    <p>{{ $itemCount }} 종류의 과일이 있습니다.</p>
@else
    <p>엥~ 아무것도 없는데요!</p>
@endif

<ul>
    @foreach($items as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>

<ul>
    @forelse($items as $item)
        <li>{{ $item }}</li>
    @empty
        <li>엥~ 아무것도 없는데요!</li>
    @endforelse
</ul>

@extends('layouts.master')

@section('style')
    <style>
        body {background: green; color: white;}
    </style>
@endsection

@section('content')
    <p>저는 자식 뷰의 'content' 섹션입니다.</p>
    @include('partials.footer')
@endsection

@section('script')
    <script>
        alert("저는 자식뷰의 'script' 섹션입니다.");
    </script>
@endsection
