<?php
include('./dbconn.php'); // DB연결을 위한 dbconn.php 파일을 인클루드

// member 테이블에 등록되어 있는 회원의 수를 구함
$sql = "SELECT COUNT(*) AS `cnt` FROM $table";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_count = $row['cnt'];

// 회원 목록을 조회
$sql = "SELECT * FROM $table ORDER BY mb_datetime DESC";
$result = mysqli_query($conn, $sql);

if (!$_SESSION['ss_mb_id']) {
    echo "<script>alert('로그인 후 사용 가능합니다.');</script>";
    echo "<script>location.replace('./index.php');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>회원목록</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <div class="display-4 mb-3 text-center">회원목록</div>
        <div class="box">
            <table class="table table-striped">
                <caption>Total <?= number_format($total_count) ?>명</caption>
                <thead>
                    <tr>
                        <th class="text-center" scope="col">번호</th>
                        <th scope="col">아이디</th>
                        <th class="text-center" scope="col">이름</th>
                        <th scope="col">이메일</th>
                        <th class="text-center" scope="col">직업</th>
                        <th class="text-center" scope="col">성별</th>
                        <th scope="col">관심언어</th>
                        <th scope="col">가입일</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $row=mysqli_fetch_assoc($result); $i++): ?>
                    <tr>
                        <td class="text-center" scope="row"><?= $i+1 ?></td>
                        <td><?= $row['mb_id'] ?></td>
                        <td class="text-center"><?= $row['mb_name'] ?></td>
                        <td><?= $row['mb_email'] ?></td>
                        <td class="text-center"><?= $row['mb_job'] ?></td>
                        <td class="text-center"><?= $row['mb_gender'] ?></td>
                        <td><?= $row['mb_language'] ?></td>
                        <td><?= $row['mb_datetime'] ?></td>
                    </tr>
                    <?php endfor ?>
                    <?php if ($total_count == 0): ?>
                    <tr>
                        <td colspan="8">등록된 회원이 없습니다.</td>
                    </tr>
                    <?php endif ?>
                </tbody>
            </table>
            <div class="text-right">
                <a href="/logout.php" class="btn btn-secondary mr-2">로그아웃</a>
                <a href="/register.php" class="btn btn-primary">회원정보 수정</a>
            </div>
        </div>
    </div>
<?php
    mysqli_close($conn); // 데이터베이스 접속 종료
?>
</body>
</html>
