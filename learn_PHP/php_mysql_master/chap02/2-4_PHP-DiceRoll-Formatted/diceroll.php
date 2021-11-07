<?php

$roll = rand(1, 6);

echo '<p>주사위를 굴려서 나온 숫자: '.$roll.'</p>';

if ($roll == 6) {
    echo '<p>이겼다!</p>';
}

echo '<p>게임에 참여해 주셔서 감사합니다.</p>';
