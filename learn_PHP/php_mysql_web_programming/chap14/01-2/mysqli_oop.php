<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'test1234';
$mysql_db = 'php_mysql_web_gnuwiz';

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if ($conn->connect_error) {
    die('연결 실패: '.$conn->connect_error);
}
echo '연결 성공';
