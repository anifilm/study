<?php

$str = 'PHP'; // 전역 변수

function myFunc() {
    $str = 'Hello';
    echo "<p>변수 str의 값은: {$str}</p>";
}

myfunc();

echo "<p>변수 str의 값은: {$str}</p>";

/*
    변수명은 같은 $str이지만 하나는 전역 변수이고 함수 안에서 선언된 $str은 지역 변수 이다.
    다른 값이 할당 되더라도 서로 영향을 주지 않는다.
 */
