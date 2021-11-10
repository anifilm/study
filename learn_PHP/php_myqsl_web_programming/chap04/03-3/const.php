<?php

const HELLO = '안녕하세요. ';

function myFunc() {
    // 함수 내에서는 const 키워드로 상수를 선언할 수 없다.
    //const MESSAGE = '저는 PHP를 공부합니다.';
    echo '함수 실행'.'<br>';
}

myFunc();

class MyClass {
    public const MESSAGE = '저는 PHP를 공부합니다.';

    public static function foo() {
        // 클래스 메서드 내에서도 const 키워드로 상수를 선언할 수 없다.
        //const BYE = '안녕히가세요.';
    }
}

echo HELLO;
echo MyClass::MESSAGE; // 범위 지정 연산자 ::를 사용하여 클래스의 속성(프로퍼티)에 접근
