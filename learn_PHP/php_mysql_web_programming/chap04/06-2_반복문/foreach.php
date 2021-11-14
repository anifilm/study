<?php

$fruits = [
    'apple' => '사과',
    'strawberry' => '딸기',
    'banana' => '바나나'
];

echo $fruits['apple'].'<br>';
echo $fruits['strawberry'].'<br>';
echo $fruits['banana'].'<br>';
echo '<br>';

echo '값만 사용'.'<br>';
foreach($fruits as $fruit) {
    echo $fruit.'<br>';
}
echo '<br>';

echo '키와 값 모두 사용'.'<br>';
foreach($fruits as $key => $value) {
    echo $key.' => '.$value.'<br>';
}
