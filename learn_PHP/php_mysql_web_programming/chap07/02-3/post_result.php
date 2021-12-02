<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Radio Result</title>
</head>
<body>
    <h1>Radio Example</h1>
    이름:
    <?php
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        echo $name.'<br>';
    }
    ?>
    아이디:
    <?php
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        echo $id.'<br>';
    }
    ?>
    이메일:
    <?php
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        echo $email.'<br>';
    }
    ?>

</body>
</html>
