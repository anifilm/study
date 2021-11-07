<?php

$roll = rand(1, 6);

echo '주사위를 굴려서 나온 숫자: '.$roll;

if ($roll == 6) {
    echo '이겼다!';
}
