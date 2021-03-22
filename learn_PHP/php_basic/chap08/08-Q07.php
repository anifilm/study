<?php
/* 07
다음은 등록된 세션을 웹 페이지에서 사용하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(예제 코드 생략...)
 */

  session_start();
  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];
?>
<html>
<head>
  <meta charset="UTF-8">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <h3>등록된 세션의 사용</h3>
  <ul>
    <li>등록된 세션(userid): <?= $userid ?></li>
    <li>등록된 세션(username): <?= $username ?></li>
  </ul>
</body>
</html>
