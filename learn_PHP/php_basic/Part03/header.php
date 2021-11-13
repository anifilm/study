<?php
  session_start();

  if (isset($_SESSION['userid']))
    $userid = $_SESSION['userid'];
  else
    $userid = '';

  if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
  else
    $username = '';

  if (isset($_SESSION['userlevel']))
    $userlevel = $_SESSION['userlevel'];
  else
    $userlevel = '';

  if (isset($_SESSION['userpoint']))
    $userpoint = $_SESSION['userpoint'];
  else
    $userpoint = '';
?>
  <div id="top">
    <h3>
      <a href="index.php">PHP 프로그래밍 입문</a>
    </h3>
    <ul id="top_menu">
<?php
  if (!$userid) {
?>
      <li><a href="login_form.php">로그인</a></li>
      <li> | </li>
      <li><a href="member_form.php">회원 가입</a></li>
<?php
  }
  else {
      $logged = $username.'('.$userid.')님 [Level: '.$userlevel.', Point: '.$userpoint.']';
?>
      <li><?= $logged ?> </li>
      <li> | </li>
      <li><a href="member_modify_form.php">정보 수정</a></li>
      <li> | </li>
      <li><a href="logout.php">로그아웃</a> </li>
<?php
  }

  if ($userlevel == 1) {
?>
      <li> | </li>
      <li><a href="admin.php">관리자 모드</a></li>
<?php
  }
?>
    </ul>
  </div>
  <div id="menu_bar">
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="board_list.php">게시판 보기</a></li>
      <li><a href="message_box.php">쪽지 보내기</a></li>
      <!-- <li><a href="index.php">사이트 완성</a></li> -->
    </ul>
  </div>

