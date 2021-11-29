<?php

is_array(array(1, 2, 3)); // true
is_array([1, 2, 3]);      // true

is_bool(true);  // true
is_bool(false); // true

is_float(1.25); // true
is_float(2);    // false

is_int(3);   // true
is_int(3.4); // false

is_null(null);   // true
is_null('null'); // false

is_numeric('3.45');  // true
is_numeric('3g.45'); // false

is_string('123'); // true
is_string(123);   // false
