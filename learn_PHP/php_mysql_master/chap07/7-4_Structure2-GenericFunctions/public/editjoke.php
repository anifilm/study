<?php

include __DIR__.'/../includes/DatabaseConnection.php';
include __DIR__.'/../includes/DatabaseFunctions.php';

try {
    if (isset($_POST['joketext'])) {
        update($pdo, 'joke', 'id', [
            'id' => $_POST['jokeid'],
            'joketext' => $_POST['joketext'],
            'authorId' => 1
        ]);

        header('location: jokes.php');

    } else {
        $title = '유머 글 수정';
        $joke = findById($pdo, 'joke', 'id', $_GET['id']);

        ob_start();

        include __DIR__.'/../templates/editjoke.html.php';

        $output = ob_get_clean();
    }

} catch (PDOException $e) {
    $title = '오류가 발생했습니다';

    $output = '데이터베이스 오류: '.$e->getMessage().', 위치: '.$e->getFile().': '.$e->getLine();
}

include __DIR__.'/../templates/layout.html.php';
