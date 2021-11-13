<?php

include __DIR__.'/../includes/DatabaseConnection.php';
include __DIR__ . '/../classes/DatabaseTable.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

try {
    if (isset($_POST['joke'])) {
        $joke = $_POST['joke'];
        $joke['jokedate'] = new DateTime();
        $joke['authorId'] = 1;

        $jokesTable->save($joke);

        header('location: jokes.php');

    } else {
        // id가 있는 경우에만 글 데이터를 가져온다.
        if (isset($_GET['id'])) {
            $joke = $jokesTable->findById($_GET['id']);
            $title = '유머 글 수정';
            $button = '수정';
        } else {
            $title = '유머 글 등록';
            $button = '등록';
        }

        ob_start();

        include __DIR__.'/../templates/editjoke.html.php';

        $output = ob_get_clean();
    }

} catch (PDOException $e) {
    $title = '오류가 발생했습니다';

    $output = '데이터베이스 오류: '.$e->getMessage().', 위치: '.$e->getFile().': '.$e->getLine();
}

include __DIR__.'/../templates/layout.html.php';
