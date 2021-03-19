<?php
/* 05
다음은 음식점에서 고객의 서비스 만족에 따라 팁을 계산하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(서비스 만족도에 따른 팁, 예제 코드 생략...)
 */

$price = 30000; // 음식값

$service = '매우 만족'; // 서비스 만족도: 매우 만족, 만족, 불만족
echo "서비스 만족도: $service <br>";

if ($service === '매우 만족')
  $tip = $price * 0.2;
else if ($service === '만족')
  $tip = $price * 0.1;
else
  $tip = $price * 0.05;

echo "팁: {$tip}원";
