<?php
/* 07
다음은 길이의 단위인 야드를 미터로 변환하는 프로그램이다.(10~300야드, 10씩 증가) 빈칸을 채워 프로그램을
완성하시오.

 미터 = 야드 x 0.9144

(출력 포맷, 예제 코드 생략...)
 */

echo '---------- <br>';
echo '야드 미터 <br>';
echo '---------- <br>';

for ($yard = 10; $yard <= 300; $yard += 10) {
  $meter = $yard * 0.9144;
  echo $yard.' '.$meter.'<br>';
}
echo '---------- <br>';
