<?php

// 사용자 정의 예외 처리 클래스 생성
class MyException1 extends Exception {}
class MyException2 extends Exception {}
class MyException3 extends Exception {}

$num = 2;

try {
    if ($num == 1) { throw new MyException1('숫자는 1입니다.'); }
    if ($num == 2) { throw new MyException1('숫자는 2입니다.'); }
    if ($num == 3) { throw new MyException1('숫자는 3입니다.'); }
}
catch (MyException1 $e) {
    echo '예외 메시지: '.$e->getMessage();
}
catch (MyException2 $e) {
    echo '예외 메시지: '.$e->getMessage();
}
catch (MyException3 $e) {
    echo '예외 메시지: '.$e->getMessage();
}
