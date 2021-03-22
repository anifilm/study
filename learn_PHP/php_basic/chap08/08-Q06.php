<?php
/* 06
다음은 세션을 시작하여 세션 변수를 등록하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(예제 코드 생략...)
 */

session_start();
echo '세션 시작!!! <br>';

$_SESSION['userid'] = 'ocella';
$_SESSION['username'] = '박영준';
echo '세션 등록 완료!!! <br>';

echo $_SESSION['userid'].'<br>';
echo $_SESSION['username'].'<br>';
