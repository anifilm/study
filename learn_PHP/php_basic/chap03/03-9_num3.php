<?php

$a = 2;
$b = 6;
$c = 9;

if ($a > $b) { // $a가 $b보다 큰 경우
  if ($a > $c) { // $a가 $C보다 큰지 비교
    $max1 = $a; // 가장 큰 수인 $max1에 $a 저장
    if ($b > $c) { // 그 다음 큰 수를 찾기 위해 $b와 $c 비교
      $max2 = $b;  // 두 번째 큰 수인 $max2에 $b 저장
      $max3 = $c;  // 세 번재 큰 수인 $max3에 $c 저장
    } else {
      $max2 = $c;
      $max3 = $b;
    }
  } else { // $a가 $b보다 큰 상태에서 $c가 $a보다 큰 경우
    $max1 = $c; // $c가 가장 크고
    $max2 = $a; // $a가 두 번째
    $max3 = $b; // $b가 세 번째
  }
} else { // $b가 $a보다 큰 경우
  if ($a > $c) { // $a와 $c 비교
    $max1 = $b;
    $max2 = $a;
    $max3 = $c;
  } else { // $c가 $a보다 큰 경우
    if ($b > $c) { // $b와 $c 중에서 가장 큰 수를 찾음
      $max1 = $b;  // $b가 가장 크고
      $max2 = $c;  // $c가 두 번째
      $max3 = $a;  // $a가 세 번째
    } else {
      $max1 = $c;
      $max2 = $b;
      $max3 = $a;
    }
  }
}

echo "입력된 세 정수: $a $b $c <br>";
echo "입력된 정수를 큰 수대로 배열: $max1 $max2 $max3 <br>";
