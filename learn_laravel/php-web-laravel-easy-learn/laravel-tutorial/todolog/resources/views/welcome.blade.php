@extends('layouts.app')

@section('title')
웰컴 페이지
@endsection

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">라라벨 Todo 사이트</h5>
        <div class="col-md-12">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">총 가입자 수: {{ $total['user'] }}</li>
                <li class="list-group-item">프로젝트 수: {{ $total['project'] }}</li>
                <li class="list-group-item">Task 수: {{ $total['task'] }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
