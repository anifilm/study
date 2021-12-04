<?php
$mysql_host = 'localhost';
$mysql_user = 'gnuwiz';
$mysql_password = 'test1234';
$mysql_db = 'php_mysql_web_gnuwiz';

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if (!$conn) {
    die('연결 실패: '.mysqli_connect_error());
}
echo '연결 성공';
