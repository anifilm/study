<?php

$a = 5;
$b = 3;

echo '비교연산자'.'<br>';
echo 'a < b : '.($a < $b).'<br>';   // false
echo 'a <= b : '.($a <= $b).'<br>'; // false
echo 'a > b : '.($a > $b).'<br>';   // true
echo 'a >= b : '.($a >= $b).'<br>'; // true
echo 'a == b : '.($a == $b).'<br>'; // false, 타입 체크 안함
echo 'a != b : '.($a != $b).'<br>'; // true,  타입 체크 안함
echo 'a <> b : '.($a <> $b).'<br>'; // true, != 과 동일 / 연산자 우선순위 차이
echo 'a === b : '.($a === $b).'<br>'; // false
echo 'a !== b : '.($a !== $b).'<br>'; // true
echo '<br>';

$a = 5;
$b = 5;

echo 'a < b : '.($a < $b).'<br>';   // false
echo 'a <= b : '.($a <= $b).'<br>'; // true
echo 'a > b : '.($a > $b).'<br>';   // false
echo 'a >= b : '.($a >= $b).'<br>'; // false
echo 'a == b : '.($a == $b).'<br>'; // true,  타입 체크 안함
echo 'a != b : '.($a != $b).'<br>'; // false, 타입 체크 안함
echo 'a <> b : '.($a <> $b).'<br>'; // false, != 과 동일 / 연산자 우선순위 차이
echo 'a === b : '.($a === $b).'<br>'; // true
echo 'a !== b : '.($a !== $b).'<br>'; // false
echo '<br>';

$a = 5;
$b = '5';

echo 'a < b : '.($a < $b).'<br>';   // false
echo 'a <= b : '.($a <= $b).'<br>'; // true
echo 'a > b : '.($a > $b).'<br>';   // false
echo 'a >= b : '.($a >= $b).'<br>'; // true
echo 'a == b : '.($a == $b).'<br>'; // true,  타입 체크 안함
echo 'a != b : '.($a != $b).'<br>'; // false, 타입 체크 안함
echo 'a <> b : '.($a <> $b).'<br>'; // false, != 과 동일 / 연산자 우선순위 차이
echo 'a === b : '.($a === $b).'<br>'; // true
echo 'a !== b : '.($a !== $b).'<br>'; // false
