<?php

$str = 'PHP'; // 전역 변수

function myFunc() {
    global $str;    // global 키워드를 사용하여 전역 변수 $str을 사용하도록 함
    $str = 'Hello';
    echo "<p>변수 str의 값은: {$str}</p>";
}

echo "<p>변수 str의 값은: {$str}</p>";

myfunc();
echo "<p>변수 str의 값은: {$str}</p>";

/*
    global 키워드를 사용하여 전역 변수 $str을 함수 안에서 사용하도록 선언 하였다.
    해당 변수의 값을 다른 값으로 재할당하게 되는 경우 전역 변수 $str의 값은 변경된다.
 */
