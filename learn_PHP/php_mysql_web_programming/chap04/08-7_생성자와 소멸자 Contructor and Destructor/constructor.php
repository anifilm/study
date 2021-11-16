<?php

class Example {
    private $name;

    public function __construct() {
        $this->name = '홍길동';
        echo $this->name;
    }
}

$example = new Example();
