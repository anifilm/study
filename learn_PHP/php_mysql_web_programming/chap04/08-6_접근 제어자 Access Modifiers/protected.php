<?php

class Example {
    protected $property = 'property';

    protected function myFunc() {
        return 'Hello World';
    }
}

$example = new Example();

//echo $example->property; // 직접 접근 불가, protected
//echo $example->myFunc(); // 직접 접근 불가, protected
