<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="jokes.css">
</head>
<body>
    <header>
        <h1>인터넷 유머 세상</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?action=list">유머 글 목록</a></li>
            <li><a href="index.php?action=edit">유머 글 등록</a></li>
        </ul>
    </nav>

    <main>
        <?= $output ?>
    </main>

    <footer>
        &copy; IJDB <?= date('Y') ?>
    </footer>
</body>
</html>
