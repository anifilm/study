<?php

class Example {
    private $property = 'property';

    private function myFunc() {
        return 'Hello World';
    }
}

$example = new Example();

//echo $example->property; // 직접 접근 불가, private
//echo $example->myFunc(); // 직접 접근 불가, private
