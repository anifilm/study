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
    'cheey' => '체리',
    'peach' => '복숭아',
];

$vagetables = [
    'celery' => '샐러리',
    'cucumber' => '오이',
    'carrot' => '당근',
    'pepper' => '후추',
    'garlic' => '마늘',
    'ginger' => '생강',
    'watermelon' => '수박',
    'tomato' => '토마토',
    'strawberry' => '딸기',
];

// 배열 합치기
$merge = array_merge($fruits, $vagetables); // 명명된 매개변수 사용불가
echo '<pre>';
print_r($merge);
echo '</pre>';

// 배열 교집합
$intersect = array_intersect($fruits, $vagetables);
echo '<pre>';
print_r($intersect);
echo '</pre>';
