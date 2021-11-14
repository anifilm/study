<?php

$sep = ', ';

function myFunc() {
    global $sep;
    $wor = 'World';

    return fn ($hel) => $hel.$sep.$wor.'!';
}

$hello = myFunc();
echo $hello('Hello');
