<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>Ok</title>
</head>
<body>
    <h1>할일 정보</h1>
    @foreach($tasks as $task)
    <p>할일: {{ $task['name'] }}, 기한: {{ $task['due_date'] }}</p>
    @endforeach
</body>
</html>
