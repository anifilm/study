<?php

$sep = ', ';

function myFunc() {
    global $sep;
    $wor = 'World';

    return function ($hel) use ($sep, $wor) {
        $exc = '!';
        return $hel.$sep.$wor.$exc;
    };
}

$hello = myFunc();
echo $hello('Hello');
