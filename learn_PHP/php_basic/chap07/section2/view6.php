<html>
<head>
  <meta charset="UTF-8">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
  $email1 = $_POST["email1"];
  $email2 = $_POST["email2"];
?>
  <ul>
    <li>이메일: <?php echo $email1.'@'.$email2; ?></li>
  </ul>
</body>
</html>
