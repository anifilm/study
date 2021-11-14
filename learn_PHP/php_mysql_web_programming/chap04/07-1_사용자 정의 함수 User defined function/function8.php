<?php

// 매개변수의 기본값
function say($str = 'Hello World') {
    echo $str;
}

say();

// 가변 길이의 인수를 배열로 받음
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);

// 매개변수의 데이터 타입을 지정
function myFunc(
    string $str,
    int $int,
    float $float,
    array $array,
    object $object,
    mixed $mixed
) {
    return;
}

// 유니언 형(union type), 여러 가지 유형을 한 번에 선언
function myFunc2(string|int|float|array|object $data) {
    return;
}

// 반환값의 데이터 타입을 지정
function myFunc3(mixed $number) : int|string {
    return $number;
}

echo myfunc3(1.1); // 1, int형으로 변환됨
