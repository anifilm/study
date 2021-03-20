<?php

// 일반 입장권 요금 구하기
function cal_fee1($day, $age) {
  if ($day === '주간') {
    if ($age > 12 && $age < 65)
      $money = 26000;
    else
      $money = 19000;
  }
  else {
    if ($age > 12 && $age < 65)
      $money = 21000;
    else
      $money = 16000;
  }

  return $money;
}

// 자유 이용권 요금 구하기
function cal_fee2($day, $age) {
  if ($day === '주간') {
    if ($age > 12 && $age < 65)
      $money = 33000;
    else
      $money = 24000;
  }
  else {
    if ($age > 12 && $age < 65)
      $money = 28000;
    else
      $money = 21000;
  }

  return $money;
}

// 2일 자유 이용권 요금 구하기
function cal_fee3($day, $age) {
  if ($age > 12 && $age < 65)
    $money = 55000;
  else
    $money = 40000;

  return $money;
}

// 콤비권 요금 구하기
function cal_fee4($day, $age) {
  if ($age > 12 && $age < 65)
    $money = 54000;
  else
    $money = 40000;

  return $money;
}

// $category: 1 => 일반 입장권,
//            2 => 자유 이용권,
//            3 => 2일 자유 이용권,
//            4 => 콤비권
$category = 1; // 입장권 종류
$age = 13;
$day = '야간';

if ($category === 1) {
  $cat = '일반 입장권';
  $fee = cal_fee1($day, $age);
}
else if ($category === 2) {
  $cat = '자유 이용권';
  $fee = cal_fee2($day, $age);
}
else if ($category === 3) {
  $cat = '2일 자유 이용권';
  $fee = cal_fee3($day, $age);
}
else {
  $cat = '콤비권';
  $fee = cal_fee4($day, $age);
}

echo "- 구분: $cat <br>";

if ($category === 1 || $category === 2)
  echo "- 주야간: $day <br>";

echo "- 나이: {$age}세 <br>";
echo "- 입장료: {$fee}원";
