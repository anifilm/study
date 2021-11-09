<?php

if (isset($_POST['joketext'])) {
    try {
        include __DIR__.'/../includes/DatabaseConnection.php';

        $sql = 'INSERT INTO `joke` SET
              `joketext` = :joketext,
              `jokedate` = CURDATE()';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->execute();

        header('location: jokes.php');

    } catch (PDOException $e) {
        $title = '오류가 발생했습니다';

        $output = '데이터베이스 오류: '.$e->getMessage().
                ', 위치: '.$e->getFile(). ': '.$e->getLine();
    }
} else {
    $title = '유머 글 등록';

    ob_start();

    include  __DIR__.'/../templates/addjoke.html.php';

    $output = ob_get_clean();
}

include  __DIR__.'/../templates/layout.html.php';
