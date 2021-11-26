<?php

$msg = '예외 클래스 오류 발생';
$code = 123;
$e = new Exception($msg, $code); // 예외 처리 클래스의 인스턴스 생성

echo '예외 메시지: '.$e->getMessage().'<br>';
echo '예외 코드: '.$e->getCode();
