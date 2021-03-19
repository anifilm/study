<?php
/* 08
다음은 HTML의 <table> 태그를 이용하여 7번 문제의 출력 결과를 표로 출력하는 프로그램이다. 빈칸을 채워
프로그램을 완성하시오.
(출력 포맷, 예제 코드 생략...)
 */

echo "<table border=1>";
echo "<tr align=center><td width=150>야드</td><td width=150>미터</td></tr>";

for ($yard = 10; $yard <= 300; $yard += 10) {
  $meter = $yard * 0.9144;
  echo "<tr align=center>";
  echo "<td>$yard</td><td>$meter</td>";
  echo "</tr>";
}
echo "</table>";
