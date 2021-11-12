<?php

function myFunc() {
    $str = 'PHP';
    echo "<p>변수 str의 값은: {$str}</p>";
}

myfunc();

echo "<p>변수 str의 값은: {$str}</p>"; // 오류 발생

/*
    함수 내에서 선언된 지역 변수 $str은 사용범위가 함수 내로 제한되므로 함수 밖에서는
    사용 할 수 없다.
 */
