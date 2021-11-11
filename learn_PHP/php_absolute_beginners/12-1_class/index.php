<?php

// What is class and instance
class Person {
  public $name;
  public $surname;
  private $age;
}

$p = new Person(); // 객체 자료형으로서의 클래스
$p->name = 'Brad';
$p->surname = 'Traversy';

echo '<pre>';
var_dump($p);
echo '</pre>';

echo $p->name.'<br>';

$p2 = new Person();
$p2->name = 'John';
$p2->surname = 'Smith';

