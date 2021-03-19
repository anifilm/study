<?php
/* 15
다음은 연결 연산자를 이용하여 주민등록번호와 이메일 주소를 하나로 묶어서 출력하는 프로그램이다.
빈칸을 채워 프로그램을 완성하시오.
(출력 포맷, 예제 코드 생략...)
 */

$num1 = '991111';
$num2 = '1010111';
$id = $num1.'-'.$num2;
echo '주민등록번호: '.$id.'<br>';

$email1 = 'master';
$email2 = 'codingschool.info';
$email = $email1.'@'.$email2;
echo '이메일 주소: '.$email;
