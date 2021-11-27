<?php

$str = 'hello gnuWiz.com';

echo strtoupper(string: $str).'<br>';
echo strtolower(string: $str).'<br>';
echo ucfirst(string: $str).'<br>';
echo ucwords(string: $str).'<br>';
echo lcfirst(string: $str).'<br>';

$str2 = strtr(string: $str, from: 'hello', to: 'Welcome');
echo $str2.'<br>'; // Wecco gnuWiz.com
/*
문자:문자를 1:1 매칭 변경 (문자열:문자열 아님)
h -> W
e -> e
l -> l 아래로 오버라이트
l -> c
o -> o

hello -> Wecco
*/

// str_replace 함수를 사용한 문자열을 1:1 매칭 변경
$str2_2 = str_replace(search: 'hello', replace: 'Welcome', subject: $str);
echo $str2_2.'<br>'; // Welcome gnuWiz.com

// replace_pairs를 사용한 문자열:문자열 매칭 변경
$replace_pairs = [
    'hello' => 'Welcome',
    'gnuWiz' => 'php',
    'com' => 'co.kr',
];

$str3 = strtr($str, $replace_pairs); // 명명된 매개변수 사용불가
echo $str3;
