<?php

class Example {
    public readonly $str;

    public function say(string $str) {
        $this->say = $str;
    }
}

$str = 'Hello World';
$example = new Example();

$example->say(str: 'Hello World'); // 정상 실행, 한번 초기화 가능 (읽기 전용 속성)
//$example->say(str: 'PHP'); // 오류 발생
