<?php
include('./dbconn.php'); // DB연결을 위한 dbconn.php 파일을 인클루드

$mode = $_POST['mode'];

// 아무런 모드가 없다면 중단
switch ($mode) {
    case 'insert':
        $mb_id = trim($_POST['mb_id']);
        $title = '회원가입';
        $href = './index.php';
        break;
    case 'modify':
        $mb_id = trim($_SESSION['ss_mb_id']);
        $title = '회원수정';
        $href = './member_list.php';
        break;
    default:
        echo "<script>alert('mode 값이 제대로 넘어오지 않았습니다.');</script>";
        echo "<script>location.replace('./register.php');</script>";
        break;
}

if (!$_POST['mb_id']) {
    echo "<script>alert('아이디가 입력되지 않았습니다.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

if ($mode == 'insert') {
    // 회원가입일 때 비밀번호 입력 확인
    if (!$_POST['mb_password']) {
       echo "<script>alert('비밀번호가 입력되지 않았습니다.');</script>";
       echo "<script>location.replace('./register.php');</script>";
       exit;
    }
    // 회원가입일 때 비밀번호 일치 확인
    if ($_POST['mb_password'] != $_POST['mb_password_re']) {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
        echo "<script>location.replace('./register.php');</script>";
        exit;
    }
}
else if ($mode == 'modify') {
    if ($_POST['mb_password']) {
        // 회원수정일 때 비밀번호 입력이 있다면 일치 확인
        if ($_POST['mb_password'] != $_POST['mb_password_re']) {
            echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
            echo "<script>location.replace('./register.php');</script>";
            exit;
        }
    }
}

if (!$_POST['mb_name']) {
    echo "<script>alert('이름이 입력되지 않았습니다.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

if (!$_POST['mb_email']) {
    echo "<script>alert('이메일이 입력되지 않았습니다.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

// POST로 넘어온 데이터를 가공
$mb_password = trim($_POST['mb_password']);
$mb_password_re = trim($_POST['mb_password_re']);
$mb_name = trim($_POST['mb_name']);
$mb_email = trim($_POST['mb_email']);
$mb_job = $_POST['mb_job'] ?? '';
$mb_gender = $_POST['mb_gender'] ?? '';
$mb_language = isset($_POST['mb_language']) ? implode(',', $_POST['mb_language']) : '';
$mb_datetime = date('Y-m-d H:i:s', time());
// 입력한 비밀번호를 MySQL password() 함수를 사용해 암호화해서 가져옴
$sql = "SELECT PASSWORD('$mb_password') AS pass";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$mb_password = $row['pass'];

if ($mode == 'insert') { // 신규 회원등록
    // 회원가입을 시도하는 이이디가 사용중인 아이디인지 확인
    $sql = "SELECT * FROM $table WHERE mb_id='$mb_id'";
    $result = mysqli_query($conn, $sql);
    // 만약 사용중인 아이디라면 알림창을 띄우고 회원가입 페이지로 이동
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('이미 사용중인 회원아이디 입니다.');</script>";
        echo "<script>location.replace('./register.php');</script>";
        exit;
    }

    $sql = "INSERT INTO $table
                SET mb_id='$mb_id',
                    mb_password='$mb_password',
                    mb_name='$mb_name',
                    mb_email='$mb_email',
                    mb_job='$mb_job',
                    mb_gender='$mb_gender',
                    mb_language='$mb_language',
                    mb_datetime='$mb_datetime'
           ";
    $result = mysqli_query($conn, $sql);
}
else if ($mode == 'modify') { // 회원 수정모드
    if ($mb_password == '') { // 비밀번호 입력이 없다면
        // 수정 항목에서 비밀번호 제외
        $sql = "UPDATE $table
                    SET mb_name='$mb_name',
                        mb_email='$mb_email',
                        mb_job='$mb_job',
                        mb_gender='$mb_gender',
                        mb_language='$mb_language'
                    WHERE mb_id='$mb_id'
               ";
    }
    else {
        $sql = "UPDATE $table
                    SET mb_password='$mb_password',
                        mb_name='$mb_name',
                        mb_email='$mb_email',
                        mb_job='$mb_job',
                        mb_gender='$mb_gender',
                        mb_language='$mb_language'
                    WHERE mb_id='$mb_id'
               ";
    }
    echo $sql;
    $result = mysqli_query($conn, $sql);
}

// 회원가입 또는 회원수정 SQL문이 정상 실행되었다면
if ($result) {
    echo "<script>alert('$title이 완료 되었습니다.');</script>";
    echo "<script>location.replace('$href');</script>";
    exit;
}
else {
    echo "생성 실패: ".mysqli_error($conn);
    mysqli_close($conn);
}
