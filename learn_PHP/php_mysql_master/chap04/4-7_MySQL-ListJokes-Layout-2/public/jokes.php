<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=php_ijdb;charset=utf8', 'ijdbuser', 'mypassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT `joketext` FROM `joke`';
    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
        $jokes[] = $row['joketext'];
    }

    $title = '유머 글 목록';

    // 버퍼 저장 시작
    ob_start();

    // 템플릿을 include한다. PHP 코드가 실행되지만
    // 결과 HTML은 브라우저로 전송되지 않고 버퍼에 저장된다.
    include  __DIR__.'/../templates/jokes.html.php';

    // 출력 버퍼의 내용을 읽고 $output 변수에 저장한다.
    // $output은 layour.html.php에서 사용된다.
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = '오류가 발행했습니다.';
    
    $output = '데이터베이스 오류: '.$e->getMessage().
            ', 위치: '.$e->getFile().': '.$e->getLine();
}

include __DIR__.'/../templates/layout.html.php';
