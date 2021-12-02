<?php
$text = '안녕하세요. 저는 홍길동입니다.
이렇게 여러줄을 입력하였습니다.';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Textarea</title>
</head>
<body>
    <h1>Textarea Example</h1>
    <form action="./post_result.php" method="POST">
        <textarea name="text" cols="30" rows="10"><?= $text ?></textarea>
        <input type="submit" value="전송">
    </form>
</body>
</html>
