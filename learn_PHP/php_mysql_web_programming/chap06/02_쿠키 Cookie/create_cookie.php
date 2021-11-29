<?php
$cookie_name = 'myCookie';
$cookie_value = '홍길동';
setcookie($cookie_name, $cookie_value, time() + 3600);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Create Cookie</title>
    </head>
    <body>
        <h1>Cookie Example</h1>
        쿠키를 만듭니다.<br>
        쿠키 내용은 <a href="./result_cookie.php">여기로</a>!!!
    </body>
</html>
