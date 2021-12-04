<?php
$mysql_host = 'localhost';
$mysql_user = 'gnuwiz';
$mysql_password = 'test1234';

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password);

if (!$conn) {
    die('연결 실패: '.mysqli_connect_error());
}

$sql = "CREATE DATABASE php_mysql_web_mydb";

if (mysqli_query($conn, $sql)) {
    echo '데이터베이스 생성 완료';
}
else {
    echo '데이터베이스를 생성하는 중 오류가 발생했습니다: '.mysqli_error($conn);
}

mysqli_close($conn);
