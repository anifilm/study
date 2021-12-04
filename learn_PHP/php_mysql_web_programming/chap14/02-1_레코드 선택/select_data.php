<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'lcy0200';
$mysql_db = 'php_mysql_web_gnuwiz';

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if (!$conn) {
    die('연결 실패: '.mysqli_connect_error());
}

$sql = "SELECT * FROM movie_director";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo 'id: '.$row['id'].' - name: '.$row['name'].' - birthday: '.$row['birthday'].'<br>';
    }
}
else {
    echo '저장된 데이터가 없습니다.';
}

mysqli_close($conn);
