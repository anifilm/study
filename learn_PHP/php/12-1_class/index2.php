<?php

// What is class and instance
class Person {
  public $name;
  public $surname;
  private $age;
  public static $counter = 0;

  public function __construct($name, $surname) {
    $this->name = $name;
    $this->surname = $surname;
    self::$counter++;
  }

  public function setAge($age) {
    $this->age = $age;
  }

  public function getAge() {
    return $this->age;
  }

  public static function getCounter() {
    return self::$counter;
  }
}

$p = new Person("Brad", "Traversy"); // 객체 자료형으로서의 클래스
$p->setAge(30);

echo '<pre>';
var_dump($p);
echo '</pre>';

echo $p->getAge();

$p2 = new Person('John', 'Smith');

echo '<pre>';
var_dump($p2);
echo '</pre>';

//echo Person::$counter;   // 정적 변수에 직접 접근
echo Person::getCounter(); // 정적 함수를 통한 정적 변수 값 출력
