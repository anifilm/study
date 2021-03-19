<?php
/* 04
다음은 물건 구매액의 할인율에 따라 지불액을 게산하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(물건 구매액의 할인율, 예제 코드 생략...)
 */

$buy = 80000;

if ($buy >= 10000 && $buy < 50000)
  $rate = 5.0;
else if ($buy >= 50000 && $buy < 300000)
  $rate = 7.5;
else if ($buy >= 300000)
  $rate = 10.0;
else
  $rate = 0;

$discount = $buy * $rate / 100;
$pay = $buy - $discount;

echo "구매액: {$buy}원 <br>";
echo "할인율: {$rate}% <br>";
echo "할인금액: {$discount}원 <br>";
echo "지불액: {$pay}원";
