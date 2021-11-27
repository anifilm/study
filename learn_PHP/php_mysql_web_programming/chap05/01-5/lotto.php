<?php

$lotto = [];

while (count($lotto) != 6) {
    $num = rand(1, 45);
    if (in_array($num, $lotto) === false) {
        array_push($lotto, $num);
    }
}

foreach($lotto as $num) {
    echo $num.' ';
}
