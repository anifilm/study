<?php

echo "------------ <br>";

for ($i = 2; $i <= 9; $i++) {
  for ($j = 1; $j <= 9; $j++) {
    $result = $i * $j;
    echo "$i x $j = $result <br>";
  }
  echo "------------ <br>";
}
