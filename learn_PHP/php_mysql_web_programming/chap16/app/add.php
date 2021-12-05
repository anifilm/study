<?php
include('../dbconn.php'); // DB연결을 위한 dbconn.php 파일을 인클루드

$title = trim($_POST['title']);
$datetime = date('Y-m-d H:i:s', time());

if (empty($title)) {
    echo "<script>alert('추가실패: 내용을 입력하세요.');</script>";
    echo "<script>location.replace('../index.php');</script>";
    exit;
}
else {
    $sql = "INSERT INTO $table SET title='$title', datetime='$datetime'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('Location: ../index.php');
}
