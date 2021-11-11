<?php

// while
//while (true) { // Infinite loop: DON'T run this
  // Do something constantly
//}

// Loop with $counter
$counter = 0;
while ($counter < 10) {
  echo $counter.' ';
//if ($counter === 5) break;
  $counter++;
}
echo '<br>';

// do - while
$counter = 0;
do {
  echo $counter.' ';
  $counter++;
} while ($counter < 10);
echo '<br>';

// for
for ($i = 0; $i < 10; $i++) {
  echo $i.' ';
}
echo '<br>';

// foreach
$fruits = ["Banana", "Apple", "Orange"];
foreach ($fruits as $i => $fruit) {
  echo $i.' '.$fruit.'<br>';
}

// Iterate Over associative array.
$person = [
  'name' => 'Brad',
  'surname' => 'Traversy',
  'age' => '30',
  'hobbies' => ['Tennis', 'Video Games'],
];

foreach ($person as $key => $value) {
  if ($key === 'hobbies') {
    break;
  }
  echo $key.' '.$value.'<br>';
}
