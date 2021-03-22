<?php
  setcookie('userid', '', time() - 3600);
  setcookie('username', '', time() - 3600);
?>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<?php
  echo 'userid와 username 쿠키가 삭제 되었습니다.';
?>
</body>
</html>
