<?php

// 2차원 배열을 이용하여 학생 3명의 5개 과목 성적 합계와 평균 구하기
$score = [
  [88, 98, 96, 77, 63],
  [86, 77, 66, 86, 93],
  [74, 83, 95, 86, 97],
];

// 입력된 성적과 배열 인덱스 출력
echo '<pre>';
var_dump($score);
echo '</pre>';
echo '<br>';

// 학생 3명의 성적 합계와 평균
for ($i = 0; $i < count($score); $i++) {
  $sum = 0;
  for ($j = 0; $j < count($score[$i]); $j++) {
    $sum += $score[$i][$j];
  }
  $avg = $sum / count($score[$i]);
  $student_num = $i + 1;
  echo "{$student_num}번 학생의 점수 => 합계: $sum, 평균: $avg <br>";
}
