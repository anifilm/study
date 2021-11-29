<?php

$str = 'hello gnuwiz.com';

// 해당 문자열을 포함하는가?
$result = str_contains(haystack: $str, needle: 'gnuwiz');
echo $result.'<br>';

// 해당 문자열로 시작하는가?
$result2 = str_starts_with(haystack: $str, needle: 'hello');
echo $result2.'<br>';

// 해당 문자열로 끝나는가?
$result3 = str_ends_with(haystack: $str, needle: 'com');
echo $result3.'<br>';
