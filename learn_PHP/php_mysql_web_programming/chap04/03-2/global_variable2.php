<?php

$str = 'PHP'; // 전역 변수

function myFunc() {
    echo "<p>변수 str의 값은: {$GLOBALS['str']}</p>";
}

myFunc();
echo "<p>변수 str의 값은: {$GLOBALS['str']}</p>";

/*
    전역 변수로 선언 및 할당된 $str은 $GLOBALS[] 배열에 저장되고 이름으로 호출 할 수 있다.
 */
