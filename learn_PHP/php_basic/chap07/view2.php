<html>
<head>
  <meta charset="UTF-8">
  <link href="section2/css/style.css" rel="stylesheet">
</head>
<body>
<?php

$id = $_POST['id'];
$pass = $_POST['pass'];

?>
  <ul>
    <li>아이디: <?= $id ?></li>
    <li>비밀번호: <?= $pass ?></li>
  </ul>
</body>
</html>
