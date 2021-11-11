<?php

try {
    include __DIR__.'/../includes/DatabaseConnection.php';
    include __DIR__.'/../includes/DatabaseFunctions.php';

    //$sql = 'DELETE FROM `joke` WHERE `id` = :id';

    //$stmt = $pdo->prepare($sql);

    //$stmt->bindValue(':id', $_POST['id']);
    //$stmt->execute();
    deleteJoke($pdo, $_POST['id']);

    header('location: jokes.php');

} catch (PDOException $e) {
    $title = '오류가 발생했습니다';

    $output = '데이터베이스 오류: '.$e->getMessage().
            ', 위치: '.$e->getFile(). ': '.$e->getLine();
}

include  __DIR__.'/../templates/layout.html.php';
