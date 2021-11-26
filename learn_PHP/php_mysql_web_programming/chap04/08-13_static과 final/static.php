<?php

class MyClass {
    public static $message = 'Hello World'; // 정적 프로퍼티

    public static function say() { // 정적 메서드
        return self::$message; // 정적 프로퍼티에 접근
    }
}

echo MyClass::say(); // 범위 지정 연산자를 사용하여 클래스의 매서드 say()에 접근
