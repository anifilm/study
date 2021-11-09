<?php

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);

    //foreach ($parameters as $name => $values) {
    //    $query->bindValue($name, $value);
    //}
    //$query->execute();
    $query->execute($parameters);

    return $query;
}

function totalJokes($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM `joke`');
    $row = $query->fetch();

    return $row[0];
}

function getJoke($pdo, $id) {
    // query() 함수에서 사용할 $parameters 배열 생성
    $parameters = [':id' => $id];

    // query() 함수를 호출할 때 $parameters 배열 제공
    $query = query($pdo, 'SELECT * FROM `joke` WHERE `id` = :id', $parameters);

    return $query->fetch();
}

function insertJoke($pdo, $joketext, $authorId) {
    $query = 'INSERT INTO `joke` (`joketext`, `jokedate`, `authorId`) 
	        VALUES (:joketext, CURDATE(), :authorId)';

    $parameters = [':joketext' => $joketext, ':authorId' => $authorId];

    query($pdo, $query, $parameters);
}
