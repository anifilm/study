<?php

trait Animal { // 트레이트 Animal 생성
    public string $type;
    public string $name;
    public int $age;

    public function describe() {
        echo $this->type.'의 이름은 '.$this->name.' 입니다. '.$this->age.'살 입니다.'.'<br>';
    }
}

trait Say { // 트레이트 Say 생성
    abstract public function greet(); // 추상 메서드 정의
}

class Dog {
    use Animal, Say; // 트레이트 Animal, Say를 삽입

    public function greet() { // 추상 메서드를 구현
        echo '멍멍~ 안녕하세요.'.'<br>';
    }
}

$dog = new Dog();
$dog->type = '강아지';
$dog->name = '담이';
$dog->age = 6;

$dog->describe();
$dog->greet();
