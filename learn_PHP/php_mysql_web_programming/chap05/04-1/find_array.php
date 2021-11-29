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

$find_key = 'kiwi';
// array_key_exists() 배열에 해당 키(또는 인덱스)가 있는가?
if (array_key_exists(key: $find_key, array: $fruits)) {
    echo '$fruits 배열에 '.$find_key.' 키가 있음'.'<br>';
}
else {
    echo '$fruits 배열에 '.$find_key.' 키가 없음'.'<br>';
}

$find_value = '바나나';
// in_array() 배열에 해당 값이 있는가?
if (in_array(needle: $find_value, haystack: $fruits)) {
    echo '$fruits 배열에 '.$find_value.' 값이 있음'.'<br>';
}
else {
    echo '$fruits 배열에 '.$find_value.' 값이 없음'.'<br>';
}

$find_value2 = '망고';
// array_search() 배열에 값을 검색하고 해당 값의 키를 반환
$finded_key = array_search(needle: $find_value2, haystack: $fruits);
echo $finded_key.'<br>';

// array_keys() 해당 배열의 키를 반환
$keys = array_keys(array: $fruits);
echo '<pre>';
var_dump($keys);
echo '</pre>';

// array_values() 해당 배열의 값을 반환
$values = array_values(array: $fruits);
echo '<pre>';
var_dump($values);
echo '</pre>';
