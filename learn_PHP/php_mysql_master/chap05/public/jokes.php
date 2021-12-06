<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=php_mysql_master_ijdb;charset=utf8', 'ijdbuser', 'mypassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$sql = 'SELECT `joketext`, `id` FROM `joke`';
    $sql = 'SELECT `joke`.`id`, `joketext`, `name`, `email`
            FROM `joke` INNER JOIN `author`
            ON `authorid` = `author`.`id`';
    $jokes = $pdo->query($sql);

    $title = '유머 글 목록';

    ob_start();

    include  __DIR__.'/../templates/jokes.html.php';

    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = '오류가 발행했습니다.';

    $output = '데이터베이스 오류: '.$e->getMessage().', 위치: '.$e->getFile().': '.$e->getLine();
}

include __DIR__.'/../templates/layout.html.php';
