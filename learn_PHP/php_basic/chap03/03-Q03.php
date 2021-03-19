<?php
/* 03
다음은 시험 점수가 90~100점이면 수, 80~89점이면 우, 70~79점이면 미, 60~69점이면 양, 0~59점이면 가,
그 외 점수가 입력되면 '점수를 잘못 입력하셨습니다!'라는 메시지를 출력하는 프로그램이다. 빈칸을 채워 프로그램
을 완성하시오.
(예제 코드 생략...)
 */

$score = 90;
echo "시험 점수: {$score}점 <br>";

if ($score >= 90 and $score <= 100)
  echo '등급: 수';
else if ($score >= 80)
  echo '등급: 우';
else if ($score >= 70)
  echo '등급: 미';
else if ($score >= 60)
  echo '등급: 양';
else if ($score >= 0)
  echo '등급: 가';
else
  echo '점수를 잘못 입력하셨습니다!';
