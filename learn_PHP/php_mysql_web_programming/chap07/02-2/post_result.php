<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Checkbox Result</title>
</head>
<body>
    <h1>Checkbox Example</h1>
    <?php
    if (isset($_POST['fruit'])) { // 배열에 값이 있으면 출력
        echo '선택한 과일은 ';
        for ($i=0; $i < count($_POST['fruit']); $i++) {
            $fruit = $_POST['fruit'][$i];
            echo $fruit.', ';
        }
        echo '입니다.';
    }
    else {
        echo '선택한 과일이 없습니다.';
    }
    ?>
</body>
</html>
