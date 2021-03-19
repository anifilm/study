<?php
/* 14
다음은 거스름돈을 계산하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(예제 코드 생략...)
 */

$money = 3000; // 지불액
$price = 800; // 물건 가격
$num = 3; // 구매 개수

$change = $money - $price * $num;

echo "물건 가격: $price <br>";
echo "구매 개수: $num <br>";
echo "지불액: $money <br>";
echo "거스름돈은 {$change}원 입니다.<br>";
