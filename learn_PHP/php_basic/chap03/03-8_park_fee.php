<?php

$age = 68;

$welfare = 'no';  // yes: 복지 카드 소지자, no: 미소지자
$youkong = 'yes'; // yes: 국가유공자증 소지자, no: 미소지자
$after = 'no';    // yes: 17시 이후 입장, no: 17시 이전 입장

if ($age < 3)     // 입장료 무료
  $fee = '무료';
else if (($age >= 3 and $age <= 13) or ($after === 'yes')) // 특별할인
  $fee = '4,000원';
else if (($age >= 14 and $age <= 18) or ($age >= 70) or ($welfare === 'yes') or ($youkong === 'yes')) // 할인
  $fee = '8,000원';
else
  $fee = '10,000원';

echo "복지 카드 소지: $welfare <br>";
echo "국가유공자증 소지: $youkong <br>";
echo "17시 이후 입장: $after <br>";
echo "나이: {$age}세 <br>";
echo "<br>";
echo "입장료: $fee";
