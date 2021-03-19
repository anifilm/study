<?php
/* 02
다음은 숫자로 된 월에 해당되는 계절 이름을 출력하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(예제 코드 생략...)
 */

$month = 3;

if ($month >= 3 && $month <= 5) {
  $season = '봄';
  echo "{$month}월은 {$season}입니다.";
}
else if ($month >= 6 && $month <= 8) {
  $season = '여름';
  echo "{$month}월은 {$season}입니다.";
}
else if ($month >= 9 && $month <= 11) {
  $season = '가을';
  echo "{$month}월은 {$season}입니다.";
}
else if ($month === 12 || $month === 1 || $month === 2) {
  $season = '겨울';
  echo "{$month}월은 {$season}입니다.";
}
else {
  echo '잘못 입력되었습니다!';
}
