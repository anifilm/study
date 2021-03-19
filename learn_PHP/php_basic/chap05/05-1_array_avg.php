<?php

// 배열을 이용하여 합계, 평균 구하기. 배열 요소는 0부터 시작한다.

$score[0] = 90; // 영어
$score[1] = 80; // 컴퓨터 개론
$score[2] = 85; // 기초 프로그래밍
$score[3] = 95; // 기초 수학
$score[4] = 93; // 알고리즘

$sum = 0;

for ($i = 0; $i < count($score); $i++) {
  $sum += $score[$i];
}
$avg = $sum / count($score);

echo '과목 점수: ';
foreach ($score as $s) {
  echo $s.', ';
}
echo '<br>';

echo '합계: '.$sum.', 평균: '.$avg.'<br>';
