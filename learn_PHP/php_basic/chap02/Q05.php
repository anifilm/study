<?php
/* 05
HTML의 <table> 태그를 이용하여 4번 문제의 출력 결과를 다음과 같이 나타내시오.
(출력 포맷 생략...)
 */

$name = '임채영';
$phone = '010-8731-23**';
$address = '서울시 중랑구 동일로 157길 20-7';
$email = 'anifilm02@gmail.com';
?>
<table>
  <tr>
    <td>이름</td>
    <td>휴대폰 번호</td>
    <td>주소</td>
    <td>이메일</td>
  </tr>
  <tr>
    <td><?= $name ?></td>
    <td><?= $name ?></td>
    <td><?= $name ?></td>
    <td><?= $name ?></td>
  </tr>
</table>
