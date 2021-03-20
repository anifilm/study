<?php
/* 03
다음은 놀이공원 입장객의 나이와 입장권의 종류에 따라 요금을 계산하여 출력하는 프로그램이다. 빈칸을 채워 프로
그램을 완성하시오. 입장권의 종류별 요금은 다음과 같다.
(출력 포맷, 예제 코드 생략...)
 */

// 어린이 요금
function child_rate($cat) {
  if ($cat === '입장권')
    $price = 13000;
  else if ($cat === '자유 이용권 주간')
    $price = 25000;
  else if ($cat === '자유 이용권 야간')
    $price = 22000;
  else
    $price = 22000; // 빅5 이용권

  return $price;
}

// 청소년 요금
function youth_rate($cat) {
  if ($cat === '입장권')
    $price = 15000;
  else if ($cat === '자유 이용권 주간')
    $price = 28000;
  else if ($cat === '자유 이용권 야간')
    $price = 25000;
  else
    $price = 25000; // 빅5 이용권

  return $price;
}

// 성인 요금
function adult_rate($cat) {
  if ($cat === '입장권')
    $price = 18000;
  else if ($cat === '자유 이용권 주간')
    $price = 32000;
  else if ($cat === '자유 이용권 야간')
    $price = 29000;
  else
    $price = 29000; // 빅5 이용권

  return $price;
}

$age = 22;
$category = '자유 이용권 야간';
// 구분: 입장권, 자유 이용권 주간, 자유이용권 야간, 빅5 이용권

if ($age >= 0 && $age <= 3)
  $fee = 0;
else if ($age >= 4 && $age <= 10)
  $fee = child_rate($category);
else if ($age >= 11 && $age <= 17)
  $fee = youth_rate($category);
else
  $fee = adult_rate($category);

echo "입장권 종류: $category <br>";
echo "입장객 나이: {$age}세 <br>";
echo "입장료: {$fee}원";
