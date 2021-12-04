<?php
include('./dbconn.php'); // DB연결을 위한 dbconn.php 파일을 인클루드
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <div class="display-4 mb-3 text-center">로그인</div>
        <form action="./login_check.php" method="POST">
            <div class="mb-3">
                <label for="mb_id">아이디</label>
                <input type="text" id="mb_id" name="mb_id" class="form-control">
            </div>
            <div class="mb-3">
                <label for="mb_password">비밀번호</label>
                <input type="password" id="mb_password" name="mb_password" class="form-control">
            </div>
            <div class="mt-4 text-right">
                <a href="./register.php" class="btn btn-secondary mr-2">회원가입</a>
                <button type="submit" class="btn btn-primary">로그인</button>
            </div>
        </form>
    </div>
</body>
</html>
