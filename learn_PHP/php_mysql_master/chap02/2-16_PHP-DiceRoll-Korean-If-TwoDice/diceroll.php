<?php

$roll1 = rand(1, 6);
$roll2 = rand(1, 6);

if ($roll1 == 1) {
    $korean = '하나';
}
else if ($roll1 == 2) {
    $korean = '둘';
}
else if ($roll1 == 3) {
    $korean = '셋';
}
else if ($roll1 == 4) {
    $korean = '넷';
}
else if ($roll1 == 5) {
    $korean = '다섯';
}
else if ($roll1 == 6) {
    $korean = '여섯';
}

if ($roll2 == 1) {
    $koreanRoll2 = '하나';
}
else if ($roll2 == 2) {
    $koreanRoll2 = '둘';
}
else if ($roll2 == 3) {
    $koreanRoll2 = '셋';
}
else if ($roll2 == 4) {
    $koreanRoll2 = '넷';
}
else if ($roll2 == 5) {
    $koreanRoll2 = '다섯';
}
else if ($roll2 == 6) {
    $koreanRoll2 = '여섯';
}

echo '<p>주사위를 굴려서 나온 숫자 : '.$korean.' 그리고 '.$koreanRoll2.'</p>';
