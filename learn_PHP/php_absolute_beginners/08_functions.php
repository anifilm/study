<?php

// Function which prints "Hello I am Zura"
function hello() {
  echo 'Hello I am Zura<br>';
}

hello();
hello();
hello();

// Function with argument
function hello2($name) {
  echo "Hello I am $name <br>";
}

hello2('Zura');
hello2('Brad');

// Create sum of two functions
function sum($a, $b) {
  return $a + $b;
}

echo sum(4, 5).'<br>';
echo sum(9, 10).'<br>';

// Create function to sum all numbers using ...$nums
function sum_args(...$nums) {
  $sum = 0;
  foreach ($nums as $num) {
    $sum += $num;
  }
  return $sum;
}

echo sum_args(1, 2, 3, 4, 5).'<br>';

// Arrow functions (PHP 7.4)
function sum_arrow(...$nums) {
  return array_reduce($nums, fn($carry, $n) => $carry + $n);
}

echo sum_arrow(1, 2, 3, 4, 5);
