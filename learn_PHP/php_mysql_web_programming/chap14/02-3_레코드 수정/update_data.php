<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'test1234';
$mysql_db = 'php_mysql_web_gnuwiz';

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if (!$conn) {
    die('연결 실패: '.mysqli_connect_error());
}

$sql = "UPDATE movie_director SET name='홍길동' WHERE id=9";

if (mysqli_query($conn, $sql)) {
    echo '레코드가 성공적으로 수정되었습니다.';
}
else {
    echo '수정 실패: '.mysqli_error($conn);
}

mysqli_close($conn);
