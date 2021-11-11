<?php

require_once './Person.php';
require_once './Student.php';

$p = new Person('Zura', 28, null);
echo $p->name.'<br>';
echo $p->age.'<br>';
echo $p->getSalary().'<br>'; // null

$p->setSalary(100);
echo $p->getSalary().'<br>'; // 100

$s = new Student('Zura', 28, 1234);
echo $s->name.'<br>';
