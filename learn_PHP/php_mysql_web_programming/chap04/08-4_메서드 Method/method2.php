<?php

class MyClass {
    public function say(string $string, int $number): mixed {
        $array = array($string, $number);

        return $array;
    }
}

$my_class = new MyClass();
$result = $my_class->say(string: 'Hello world', number: 1);
print_r($result);
