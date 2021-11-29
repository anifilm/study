<?php

$fruits = [
    'apple' => '사과',
    'banana' => '바나나',
    'strawberry' => '딸기',
    'grape' => '포도',
    'watermelon' => '수박',
    'kiwi' => '키위',
    'mango' => '망고',
    'tomato' => '토마토',
];

$fruits2 = $fruits;
$fruits3 = $fruits;

// sort() 배열의 값을 기준으로 오름차순 정렬 (키는 새로 생성)
sort(array: $fruits);
echo '<pre>';
print_r($fruits);
echo '</pre>';

// rsort() 배열의 값을 기준으로 내림차순 정렬 (키는 새로 생성)
rsort(array: $fruits);
echo '<pre>';
print_r($fruits);
echo '</pre>';

// ksort() 배열의 키를 기준으로 오름차순 정렬 (키는 보존)
ksort(array: $fruits2);
echo '<pre>';
print_r($fruits2);
echo '</pre>';

// krsort() 배열의 키를 기준으로 내림차순 정렬 (키는 보존)
krsort(array: $fruits2);
echo '<pre>';
print_r($fruits2);
echo '</pre>';

// asort() 배열의 값을 기준으로 오름차순 정렬 (키는 보존)
asort(array: $fruits3);
echo '<pre>';
print_r($fruits3);
echo '</pre>';

// arsort() 배열의 값을 기준으로 내림차순 정렬 (키는 보존)
arsort(array: $fruits3);
echo '<pre>';
print_r($fruits3);
echo '</pre>';
