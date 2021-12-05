<?php
include('../dbconn.php'); // DB연결을 위한 dbconn.php 파일을 인클루드

$id = $_GET['id'];

if (empty($id)) {
    echo "<script>alert('삭제실패: 해당 ID를 알 수 없습니다.');</script>";
    echo "<script>location.replace('../index.php');</script>";
    exit;
}
else {
    $sql = "DELETE FROM $table WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('Location: ../index.php');
}
