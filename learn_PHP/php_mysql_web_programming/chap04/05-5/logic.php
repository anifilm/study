<?php

$a = true;
$b = false;

echo '논리연산자'.'<br>';
echo 'a and b : '.($a and $b).'<br>'; // false
echo 'a or b : '.($a or $b).'<br>';   // true
echo 'a xor b : '.($a xor $b).'<br>'; // true
echo '!a : '.(!$a).'<br>';          // false
echo 'a && b : '.($a && $b).'<br>'; // false
echo 'a || b : '.($a || $b).'<br>'; // true
