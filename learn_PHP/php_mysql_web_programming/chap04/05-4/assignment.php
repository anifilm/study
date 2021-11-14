<?php

$a = 5;

$r1 = 10;
$r2 = 10;
$r3 = 10;
$r4 = 10;
$r5 = 10;
$r6 = 10;
$r7 = 10;

$r1 = $a;
$r2 += $a;
$r3 -= $a;
$r4 *= $a;
$r5 /= $a;
$r6 %= $a;
$r7 .= $a;

echo '대입연산자와 복합대입연산자'.'<br>';
echo 'r1 = a : '.$r1.'<br>';
echo 'r2 += a : '.$r2.'<br>';
echo 'r3 -= a : '.$r3.'<br>';
echo 'r4 *= a : '.$r4.'<br>';
echo 'r5 /= a : '.$r5.'<br>';
echo 'r6 %= a : '.$r6.'<br>';
echo 'r7 .= a : '.$r7.'<br>';
