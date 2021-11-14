<?php

function say($lambda) {
    echo $lambda();
}

say(function () { return 'Hello World'; });
say(fn () => 'Hello World');


function say2() {
    return function () {
        return 'Hello World';
    };
}

$lambda = say2();
echo $lambda();


$x = 1;

$fn = fn () => $x++; // 지역 변수이기 때문에 전역 변수 $x에 영향을 주지 않는다.

$fn();

echo $x; // 1
