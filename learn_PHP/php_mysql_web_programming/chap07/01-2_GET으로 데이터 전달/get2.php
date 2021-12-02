<?php
$name = '홍길동';
$id = 'gildong';
$email = 'hong@test.com';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Get</title>
</head>
<body>
    <h1>Get Example</h1>
    <a href="./get_result.php?name=<?= $name ?>&id=<?= $id ?>&email=<?= $email ?>">전송</a>
</body>
</html>
