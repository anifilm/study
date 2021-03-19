<?php

$grade = 5;

if ($grade === 1)
  echo "{$grade}학년 급식비: 3만원";
else if ($grade === 2)
  echo "{$grade}학년 급식비: 3만 5천원";
else if ($grade === 3)
  echo "{$grade}학년 급식비: 4만원";
else if ($grade === 4)
  echo "{$grade}학년 급식비: 4만 5천원";
else if ($grade === 5)
  echo "{$grade}학년 급식비: 5만원";
else if ($grade === 6)
  echo "{$grade}학년 급식비: 5만 5천원";
else
  echo "학년이 잘못 입력되었어요!";
