<?php

echo round(num: 11.94, precision: 1).'<br>';  // 11.9 소수점 두번째 자리를 반올림
echo round(num: 11.94, precision: 0).'<br>';  // 12   0은 생략 가능
echo round(num: 11.94, precision: -1).'<br>'; // 10   일의 자리를 반올림
