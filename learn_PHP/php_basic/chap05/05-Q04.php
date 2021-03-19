<?php
/* 04
다음은 HTML의 <table> 태그와 배열을 이용하여 구구단 표를 만드는 프로그램이다. 빈칸을 채워 프로그램을
완성하시오.
(출력 포맷, 예제 코드 생략...)
 */

echo "<table border=1>";
echo "<tr align=center>";
echo "<th width=100>2단</th>";
echo "<th width=100>3단</th>";
echo "<th width=100>4단</th>";
echo "<th width=100>5단</th>";
echo "<th width=100>6단</th>";
echo "<th width=100>7단</th>";
echo "<th width=100>8단</th>";
echo "<th width=100>9단</th>";
echo "</tr>";

$result = null;

for ($i = 0; $i < 8; $i++) {   // $i+2: 2~9단
  for ($j = 0; $j < 9; $j++) { // $j+1: 1~9
    // 이차원 배열 $result에 구구단 결과를 저장
    $result[$i][$j] = ($i + 2) * ($j + 1);
  }
}

for ($j = 0; $j < 9; $j++) {
  echo "<tr align=center>";
  for ($i = 0; $i < 8; $i++) {
    $a = $i + 2;
    $b = $j + 1;
    $c = $result[$i][$j];
    echo "<td> $a x $b = $c </td>";
  }
  echo "</tr>";
}
echo "</table>";
