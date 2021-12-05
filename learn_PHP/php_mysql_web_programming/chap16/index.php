<?php
include('./dbconn.php'); // DB연결을 위한 dbconn.php 파일을 인클루드

// project_todo 테이블에 등록되어 있는 목록을 조회
$sql = "SELECT * FROM $table ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Todo List</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container" id="todo">
        <div class="row justify-content-sm-center">
            <div class="col-8">
                <form action="./app/add.php" method="POST" class="add_section">
                    <div class="card">
                        <h2 class="card-header text-center">Todo List</h2>
                        <div class="gw-example">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="할 일을 추가하세요.">
                            </div>
                            <button type="submit" class="btn btn-primary">일정 추가</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-sm-center">
            <div class="col-8">
                <section class="show-todo-section mt-3">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="card card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" onclick="location.href='./app/check.php?id=<?= $row['id'] ?>'" <?= $row['checked'] ? 'checked' : '' ?>>
                                </div>
                                <h5 class="ml-1 <?= $row['checked'] ? 'gw-checked' : '' ?>">
                                    <?= $row['title'] ?>
                                </h5>
                            </div>
                            <a href="./app/remove.php?id=<?= $row['id'] ?>" id="<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger">삭제</a>
                        </div>
                        <small class="ml-4 text-secondary">등록일자 : <?= $row['datetime'] ?></small>
                    </div>
                    <?php endwhile ?>
                    <?php if(mysqli_num_rows($result) <= 0): ?>
                    <div class="card gw-example">
                        <div class="card-body box-shadow border-radius-1">
                            등록된 일정이 없습니다.
                        </div>
                    </div>
                    <?php endif ?>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
