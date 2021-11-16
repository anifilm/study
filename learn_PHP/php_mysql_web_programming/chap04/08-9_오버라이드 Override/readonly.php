<?php

class Example {
    public readonly $str;

    public function say(string $str) {
        $this->str = $str;
    }
}

$str = 'Hello World';
$example = new Example();

$example->say(str: 'Hello World');
$example->say(str: 'PHP');
