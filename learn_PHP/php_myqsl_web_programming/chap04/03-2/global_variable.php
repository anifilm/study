<?php

$str = 'PHP'; // 전역 변수

function myFunc() {
    global $str; // global 키워드를 사용하여 전역 변수 $str을 사용하도록 함
    echo "<p>변수 str의 값은: {$str}</p>";
}

myFunc();
echo "<p>변수 str의 값은: {$str}</p>";
