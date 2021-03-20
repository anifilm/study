<?php

$scores = [87, 76, 98, 87, 87, 93, 79, 85, 88, 63, 74, 84, 93, 89, 63, 99, 81, 70, 80, 95];

$sum = 0;

for ($i = 0; $i < count($scores); $i++) {
  $sum += $scores[$i]; // 학생 20명의 성적 누적 합계
}

$avg = $sum / count($scores); // 평균 구하기

echo '합계: '.$sum.', 평균: '.$avg;
