<?php
/* 05
다음은 setcookie()에 의해 등록된 userid, username 쿠키를 사용하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(예제 코드 생략...)
 */

if (isset($_COOKIE['userid']) && isset($_COOKIE['username'])) {
  $userid = $_COOKIE['userid'];
  $username = $_COOKIE['username'];

  echo 'userid 쿠키: '.$userid.'<br>';
  echo 'username 쿠키: '.$username.'<br>';
}
else {
  echo '쿠키가 생성되지 않았습니다.';
}
