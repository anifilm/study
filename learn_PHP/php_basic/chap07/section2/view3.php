<html>
<head>
  <meta charset="UTF-8">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
  $content = $_POST['content'];
?>
  <ul>
    <li>글 내용: <?= $content ?></li>
  </ul>
</body>
</html>