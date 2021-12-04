<?php
include('./dbconn.php'); // DB연결을 위한 dbconn.php 파일을 인클루드

// 세션이 있다면 회원 정보를 가져오고 회원 수정모드로 설정
if (isset($_SESSION['ss_mb_id'])) {
    $mb_id = $_SESSION['ss_mb_id'];
    // 회원 정보를 조회하는 SQL문
    $sql = "SELECT * FROM $table WHERE mb_id='$mb_id'";
    $result = mysqli_query($conn, $sql);
    $mb = mysqli_fetch_assoc($result);
    mysqli_close($conn); // 데이터베이스 접속 종료

    $mode = 'modify';
    $title = '회원정보 수정';
    $modify_mb_info = 'readonly';
    $href = './member_list.php';
}
else {
    $mode = 'insert';
    $title = '회원가입';
    $modify_mb_info = '';
    $href = './index.php';
    // 기본값 설정
    $mb['mb_job'] = '';
    $mb['mb_gender'] = '';
    $mb['mb_language'] = '';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Register</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="display-4 mb-3 text-center"><?= $title ?></div>
        <form action="./register_update.php" method="POST">
            <input type="hidden" name="mode" value="<?= $mode ?>">
            <div class="mb-3">
                <label for="mb_id">아이디</label>
                <input type="text" id="mb_id" name="mb_id" class="form-control" value="<?= $mb['mb_id'] ?? '' ?>" <?= $modify_mb_info ?>>
            </div>
            <div class="mb-3">
                <label for="mb_password">비밀번호</label>
                <input type="password" id="mb_password" name="mb_password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="mb_password">비밀번호 확인</label>
                <input type="password" id="mb_password_re" name="mb_password_re" class="form-control">
            </div>
            <div class="mb-3">
                <label for="mb_name">이름</label>
                <input type="text" id="mb_name" name="mb_name" class="form-control" value="<?= $mb['mb_name'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="mb_email">이메일</label>
                <input type="email" id="mb_email" name="mb_email" class="form-control" value="<?= $mb['mb_email'] ?? '' ?>">
            </div>
            <label>직업</label>
            <div class="mb-3">
                <select name="mb_job" class="form-select">
                    <option value="">선택하세요</option>
                    <option value="학생" <?= ($mb['mb_job'] == '학생') ? 'selected' : '' ?>>학생</option>
                    <option value="회사원" <?= ($mb['mb_job'] == '회사원') ? 'selected' : '' ?>>회사원</option>
                    <option value="공무원" <?= ($mb['mb_job'] == '공무원') ? 'selected' : '' ?>>공무원</option>
                    <option value="주부" <?= ($mb['mb_job'] == '주부') ? 'selected' : '' ?>>주부</option>
                    <option value="무직" <?= ($mb['mb_job'] == '무직') ? 'selected' : '' ?>>무직</option>
                </select>
            </div>
            <label>성별</label>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="mb_gender" id="gender1" value="남자" <?= ($mb['mb_gender'] == '남자') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="gender1">남자</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="mb_gender" id="gender2" value="여자" <?= ($mb['mb_gender'] == '여자') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="gender2">여자</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="mb_gender" id="gender3" value="성별없음" <?= ($mb['mb_gender'] == '성별없음') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="gender3">성별없음</label>
                </div>
            </div>
            <label>관심언어</label>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="mb_language1" name="mb_language[]" class="form-check-input" value="HTML" <?= str_contains($mb['mb_language'], 'HTML') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="mb_language1">HTML</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="mb_language2" name="mb_language[]" class="form-check-input" value="CSS" <?= str_contains($mb['mb_language'], 'CSS') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="mb_language1">CSS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="mb_language3" name="mb_language[]" class="form-check-input" value="PHP" <?= str_contains($mb['mb_language'], 'PHP') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="mb_language1">PHP</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="mb_language4" name="mb_language[]" class="form-check-input" value="MySQL" <?= str_contains($mb['mb_language'], 'MySQL') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="mb_language1">MySQL</label>
                </div>
            </div>
            <hr>
            <div class="mt-4 text-right">
                <a href="<?= $href ?>" class="btn btn-secondary mr-2">취소</a>
                <button type="submit" class="btn btn-primary"><?= $title ?></button>
            </div>
        </form>
    </div>
</body>
</html>
