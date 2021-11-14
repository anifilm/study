<?php

$str1 = 'Hello World';
$str2 = 'PHP';
$result1 = $str1 ?? $str2;

echo $result1.'<br>';

$str1 = 'Hello World';
$str2 = null;
$result2 = $str1 ?? $str2;

echo $result2.'<br>';

$str1 = null;
$str2 = 'PHP';
$result3 = $str1 ?? $str2;

echo $result3.'<br>';

/*
null 병합 연산자 ??
두 값중 null이 아닌 값을 기본값으로 반환
*/
