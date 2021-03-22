<html>
<head>
  <meta charset="UTF-8">
  <link href="section2/css/style.css" rel="stylesheet">
</head>
<body>
<?php
  $gender = $_POST['gender'];
  $email_ok = $_POST['email_ok'];

  if ($email_ok === '예')
    $email = '수신';
  else
    $email = '비수신';
?>
  <ul>
    <li>성별: <?= $gender ?></li>
    <li>이메일: <?= $email ?></li>
  </ul>
</body>
</html>
