<?php
/* 01
다음은 함수를 이용하여 두 수의 최대공약수를 구하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(출력 포맷, 예제 코드 생략...)
 */

function computeMaxGong($x, $y) {
  if ($x > $y)
    $small = $y;
  else
    $small = $x;

  $result = 0;
  for ($i = 1; $i <= $small; $i++) {
    if ($x % $i === 0 && $y % $i === 0)
      $result = $i;
  }

  return $result;
}

$num1 = 9;
$num2 = 33;

$max_gong = computeMaxGong($num1, $num2);

echo "{$num1}와 {$num2}의 최대공약수: $max_gong";
