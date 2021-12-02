<?php
$name = '홍길동';
$id = 'gildong';
$email = 'hong@test.com';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Hidden</title>
</head>
<body>
    <h1>Hidden Example</h1>
    <form action="./post_result.php" method="POST">
        <input type="hidden" name="name" value="<?= $name ?>">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="email" value="<?= $email ?>">
        <input type="submit" value="전송">
    </form>
</body>
</html>
