<?php

abstract class Animal { // 추상 클래스 Animal
    public string $type;
    public string $name;
    public int $age;

    public function describe() { // 비 추상 메서드 정의
        echo $this->type.'의 이름은 '.$this->name.' 입니다. '.$this->age.'살 입니다.'.'<br>';
    }

    abstract public function greet(); // 추상 메서드 정의
}

class Dog extends Animal {
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
