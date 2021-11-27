<?php

$str = [
    'www',
    'gnuwiz',
    'com',
];

echo implode($str).'<br>'; // 명명된 매개변수 사용 불가
echo implode(separator: '.', array: $str).'<br>';
echo '<br>';

echo join($str).'<br>'; // 명명된 매개변수 사용 불가
echo join(separator: '.', array: $str).'<br>';
