<?php

$mysql_host = "localhost";
$mysql_user = "gnuwiz";
$mysql_password = "test1234";
$mysql_db = "php_mysql_web_gnuwiz";

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db); // MySQL 데이터베이스 연결

if (!$conn) { // 연결 오류 발생시 스크립트 종료
    die("연결 실패: ".mysqli_connect_error());
}

session_start(); // 세션 시작
