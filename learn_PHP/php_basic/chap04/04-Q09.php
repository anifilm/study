<?php
/* 09
넓이의 단위인 제곱미터를 평으로 변환하는 프로그램을 작성하되 출력 포맷은 7번 문제를 참고 하시오.
(10~200제곱미터, 10씩 증가)

평 = 제곱미터 x 0.3025

 */

echo "<table>";
echo "<tr><td width='100'>야드</td><td width='100'>미터</td></tr>";

for ($smeter = 10; $smeter <= 200; $smeter += 10) {
  $pyeong = $smeter * 0.3025;
  echo "<tr>";
  echo "<td>$smeter</td><td>$pyeong</td>";
  echo "</tr>";
}
echo '</table>';
