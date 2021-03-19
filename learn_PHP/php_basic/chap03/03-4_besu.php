<?php

$besu = 3; // 3의 배수 여부를 판별하기 위한 변수. 5의 배수를 판별하려면 5를 저장
$num = 12; // 3의 배수 여부를 판별하려는 수

if ($num % $besu == 0) {
  echo "$num: {$besu}의 배수이다.";
}
else {
  echo "$num: {$besu}의 배수가 아니다.";
}
