<?php

class Fruit {
    public $name;
    public $color;

    public function set_fruit(string $name, string $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function get_fruit(): string {
        $string = '이 과일은 ' . $this->name . ' 입니다. 색깔은 ' . $this->color . ' 입니다.';

        return $string;
    }
}

$apple = new Fruit();
$apple->set_fruit(name: '사과', color: '빨강');

echo $apple->get_fruit();
