<?php

$korean = [
    1 => '하나',
    2 => '둘',
    3 => '셋',
    4 => '넷',
    5 => '다섯',
    6 => '여섯'
];

$roll1 = rand(1, 6);
$roll2 = rand(1, 6);

echo '<p>주사위를 굴려서 나온 숫자: '.$korean[$roll1].' 그리고 '.$korean[$roll2].'</p>';
