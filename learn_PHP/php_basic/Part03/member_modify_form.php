<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP 프로그래밍 입문</title>
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <link rel="stylesheet" type="text/css" href="css/member.css">
  <script type="text/javascript" src="js/member_modify.js"></script>
</head>
<body>
  <header>
    <?php include 'header.php'; ?>
  </header>
  <?php
    $con = mysqli_connect('localhost', 'root', 'lcy0200', 'php_basic');
    $sql = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $pass = $row['pass'];
    $name = $row['name'];

    $email = explode('@', $row['email']);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close($con);
  ?>
  <section>
    <div id="main_img_bar">
      <img src="img/main_img.png">
    </div>
    <div id="main_content">
      <div id="join_box">
        <form name="member_form" method="post" action="member_modify.php?id=<?= $userid ?>">
          <h2>회원 정보수정</h2>
          <div class="form id">
            <div class="col1">아이디</div>
            <div class="col2">
              <?= $userid ?>
            </div>
          </div>
          <div class="clear"></div>

          <div class="form">
            <div class="col1">비밀번호</div>
            <div class="col2">
              <input type="password" name="pass" value="">
            </div>
          </div>
          <div class="clear"></div>
          <div class="form">
            <div class="col1">비밀번호 확인</div>
            <div class="col2">
              <input type="password" name="pass_confirm" value="">
            </div>
          </div>
          <div class="clear"></div>
          <div class="form">
            <div class="col1">이름</div>
            <div class="col2">
              <input type="text" name="name" value="<?= $name ?>">
            </div>
          </div>
          <div class="clear"></div>
          <div class="form email">
            <div class="col1">이메일</div>
            <div class="col2">
              <input type="text" name="email1" value="<?= $email1 ?>">@<input type="text" name="email2" value="<?= $email2 ?>">
            </div>
          </div>
          <div class="clear"></div>
          <div class="bottom_line"></div>
          <div class="buttons">
            <img id="reset_button" style="cursor:pointer" src="img/button_reset.gif" onclick="document.location.href='index.php'">&nbsp;
            <img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
          </div>
        </form>
      </div> <!-- join_box -->
    </div> <!-- main_content -->
  </section>
  <footer>
    <?php include 'footer.php'; ?>
  </footer>
</body>
</html>

