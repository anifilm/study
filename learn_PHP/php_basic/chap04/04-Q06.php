<?php
/* 06
다음은 정수 1~500 중 5의 배수를 출력하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(출력 포맷, 예제 코드 생략...)
 */

$count = 0;

for ($num = 1; $num <= 500; $num++) {
  if ($num % 5 === 0) {
    echo $num.' ';
    $count++;
    if ($count % 10 === 0)
      echo '<br>';
  }
}