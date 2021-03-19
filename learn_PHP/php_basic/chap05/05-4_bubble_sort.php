<?php

$num = [15, 13, 9, 7, 6, 12, 19, 30, 28, 26];

$count = count($num); // 10, 배열 요소의 개수

echo '정렬 전: '.'<br>';
foreach ($num as $n) {
  echo $n.' '; // 정렬되기 전 배열의 요소 출력
}
echo '<br>';

for ($i = $count - 2; $i >= 0; $i--) { // $i는 8부터 0까지 1씩 감소
  for ($j = 0; $j <= $i; $j++) {   // $j는 0부터 $i까지 1씩 증가
    if ($num[$j] > $num[$j + 1]) { // 인접한 두 수를 비교
//    $tmp = $num[$j];         // 앞의 값을 $tmp에 저장
//    $num[$j] = $num[$j + 1]; // 뒤의 데이터를 앞의 배열에 저장
//    $num[$j + 1] = $tmp;     // $tmp를 뒤의 배열에 저장
      // 배열 요소값 스왑
      list($num[$j], $num[$j + 1]) = array($num[$j + 1], $num[$j]);
    }
  }
}
echo '<br>';

echo '버블 정렬(오름차순) 후: '.'<br>';
foreach ($num as $n) {
  echo $n.' '; // 버블 정렬 후 배열의 요소 출력
}
