<!-- 05
게시판의 목록 보기 페이지(board_list.php)를 브라우저 화면에 가져오기 위해 사용하는 URL 주소가 다음과 같을 때,
board_view.php 소스코드의 빈칸을 채워 프로그램을 완성하시오.\

 http://localhost/board_list.php?table=free

-->
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<?php
  $table = $_GET['table'];

  if ($table === 'free')
    $board_title = '자유게시판';
  else
    $board_title = '공지사항';
?>
  <h1><?= $board_title ?></h1>
</body>
</html>
