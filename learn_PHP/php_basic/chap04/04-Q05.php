<?php
/* 05
for문을 사용하여 10!(1*2*3*...*10)을 구하는 프로그램을 작성하시오.
(출력 포맷, 예제 코드 생략...)
 */

$f = 1;

for ($i = 1; $i <= 10; $i++) {
  $f *= $i;
  echo $i.'! = '.$f.'<br>';
}