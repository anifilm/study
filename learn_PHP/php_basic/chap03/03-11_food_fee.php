<?php

/* 초등학교 학년에 따른 급식비 계산 프로그램
1학년: 3만원
2학년: 3만 5천원
3학년: 4만원
4학년: 4만 5천원
5학년: 5만원
6학년: 5만 5천원
 */

$grade = 5; // 5학년

switch ($grade) {
  case 1:
    echo "{$grade}학년 급식비: 3만원";
    break;
  case 2:
    echo "{$grade}학년 급식비: 3만 5천원";
    break;
  case 3:
    echo "{$grade}학년 급식비: 4만원";
    break;
  case 4:
    echo "{$grade}학년 급식비: 4만 5천원";
    break;
  case 5:
    echo "{$grade}학년 급식비: 5만원";
    break;
  case 6:
    echo "{$grade}학년 급식비: 5만 5천원";
    break;
  default:
    echo "학년이 잘못 입력되었어요!";
}
