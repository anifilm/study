@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>포럼 글 목록</h1>
        <hr />
        <ul>
            @forelse($articles as $article)
                <li>{{ $article->title }}</li>
                <small>
                    by {{ $article->user->name }}
                </small>
            @empty
                <p>글이 없습니다.</p>
            @endforelse
        </ul>

        @if($articles->count())
            <div class="pagination">
                {!! $articles->render() !!}
            </div>
        @endif
    </div>
@stop
