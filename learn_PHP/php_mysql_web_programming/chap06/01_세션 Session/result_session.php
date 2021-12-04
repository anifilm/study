<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Result Session</title>
</head>
<body>
    <h1>Session Example</h1>
    세션 값은: <?= $_SESSION['mySession'] ?> 입니다.
</body>
</html>
