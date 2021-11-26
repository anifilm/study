<?php

class MyException extends Exception { // 사용자 정의 MyException 예외 처리 클래스 생성
    public function myMessage($my_msg) { // 사용자 정의 메서드
        return $my_msg;
    }
}

$msg = '예외 클래스 오류 발생';
$code = 123;
$e = new MyException($msg, $code); // 사용자 정의 예외 처리 클래스의 인스턴스 생성

echo $e->myMessage('Exception 클래스를 상속 받았습니다.').'<br>';
echo '예외 메시지: '.$e->getMessage().'<br>';
echo '예외 코드: '.$e->getCode();
