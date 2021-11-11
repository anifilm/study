<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=php_product_crud', 'root', 'lcy0200');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;
