<?php

do {
    $roll = rand(1, 6);
    echo '<p>주사위를 굴려서 나온 숫자: '.$roll.'</p>';

    if ($roll == 6) {
        echo '<p>이겼다!</p>';
    } else {
        echo '<p>아쉽지만 \'꽝\'이네요. 다음 기회를 노려보세요!</p>';
    }
} while ($roll != 6);

echo '<p>게임에 참여해 주셔서 감사합니다.</p>';
