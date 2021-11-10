<?php

$str = 'PHP'; // 전역 변수

function myFunc() {
    echo "<p>변수 str의 값은: {$str}</p>"; // 함수 내에서 전역 변수 사용시 오류 발생
}

myFunc();
echo "<p>변수 str의 값은: {$str}</p>";
