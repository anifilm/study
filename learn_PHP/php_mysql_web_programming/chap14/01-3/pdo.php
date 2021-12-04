<?php
$mysql_host = 'localhost';
$mysql_user = 'gnuwiz';
$mysql_password = 'test1234';
$mysql_db = 'php_mysql_web_gnuwiz';

try {
    $conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_db", $mysql_user, $mysql_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '연결 성공';
}
catch (PDOException $e) {
    echo '연결 실패: '.$e->getMessage();
}
