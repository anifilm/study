<?php

$age = null;
$my_age = $age ?: 18;
echo $my_age;

/*
엘비스 연산자 ?:
$age 값이 null이 아니면 원래의 값, null이라면 지정된 값을 가진다.
*/
