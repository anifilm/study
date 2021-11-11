<?php

$pdo = new PDO('mysql:host=localhost;dbname=php_ijdb;charset=utf8', 'ijdbuser', 'mypassword');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
