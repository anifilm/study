<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>File Upload Form</title>
</head>
<body>
    <h1>File Upload Example</h1>
    <form action="./file_upload.php" enctype="multipart/form-data" method="POST">
        <input type="file" name="myfile">
        <button type="submit">보내기</button>
    </form>
</body>
</html>
