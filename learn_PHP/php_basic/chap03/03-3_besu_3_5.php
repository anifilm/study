<?php

$num = 32;
$result = '3의 배수도 5의 배수도 아니다.';

if ($num % 3 === 0)
  $result = '3의 배수이다.';

if ($num % 5 === 0)
  $result = '5의 배수이다.';

if ($num % 3 === 0 && $num % 5 === 0)
  $result = '3의 배수이면서 5의 배수이다.';

echo "$num: $result";
