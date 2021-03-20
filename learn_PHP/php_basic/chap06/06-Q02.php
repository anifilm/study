<?php
/* 02
다음은 함수를 이용하여 3개의 수 중에서 가장 큰 수를 찾는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(출력 포맷, 예제 코드 생략...)
 */

function maxTwo($i, $j) {
  if ($i > $j)
    return $i;
  else
    return $j;
}

function maxThree($x, $y, $z) {
  return maxTwo(maxTwo($x, $y), maxTwo($y, $z));
}

$a = 10;
$b = 5;
$c = 7;

$max_num = maxThree($a, $b, $c);

echo "$a, $b, $c 중 가장 큰 수: $max_num";
