<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>Ok</title>
</head>
<body>
    <h1>할일 정보</h1>
    <p>작업 : {{ $task['name'] }}</p>
    <p>기한 : {{ $task['due_date'] }}</p>
    <p>commnet: {{ $task['comment'] }}</p>
</body>
</html>
