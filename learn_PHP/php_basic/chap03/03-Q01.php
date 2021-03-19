<?php
/* 01
자신의 이름, 휴대폰 번호, 주소, 이메일 주소를 출력하는 프로그램을 작성하시오.
(출력 포맷, 예제 코드 생략...)
 */

echo '시간당 급여 <br>';
echo '- 주간 근무: 9,500원 <br>';
echo '- 야간 근무: 주간 시급 * 1.5 <br>';
echo '<br>';

$hour_rate = 9500;

$day_night = '주간';
$work_time = 8;

if ($day_night === '주간') {
  $pay = $hour_rate * $work_time;
}
else {
  $pay = $hour_rate * $work_time * 1.5;
}

echo "{$work_time}시간 동안 일한 $day_night 급여는 {$pay}원 입니다.";
