<?php

$count = 0;
$ok = true;

for ($i = 500; $i <= 700; $i++) {
  if ($i % 4 !== 0) {
    echo $i.' ';
    $count++;
    $ok = true;
  }
  if ($count !== 0 && $count % 10 === 0 && $ok === true) {
    echo '<br>';
    $ok = false;
  }
}
