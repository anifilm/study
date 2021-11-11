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

function insertJoke($pdo, $fields) {
    //$query = 'INSERT INTO `joke` (`joketext`, `jokedate`, `authorId`)
	//    VALUES (:joketext, CURDATE(), :authorId)';

    //$parameters = [':joketext' => $joketext, ':authorId' => $authorId];

    $query = 'INSERT INTO `joke` (';

    foreach ($fields as $key => $value) {
        $query .= "`{$key}`,";
    }

    $query = rtrim($query, ',');
    $query .= ') VALUES (';

    foreach ($fields as $key => $value) {
        $query .= ":{$key},";
    }

    $query = rtrim($query, ',');
    $query .= ')';

    $fields = processDates($fields);

    query($pdo, $query, $fields);
}

function updateJoke($pdo, $fields) {
    //$parameters = [':joketext' => $joketext, ':authorId' => $authorId, ':id' => $jokeId];

    //query($pdo, 'UPDATE `joke`
    //    SET `authorId` = :authorId, `joketext` = :joketext
    //    WHERE `id` = :id', $parameters);

    $query = 'UPDATE `joke` SET ';

    foreach ($array as $key => $value) {
        $query .= "`{$key}` = :{$key}, ";
    }

    $query = rtrim($query, ', ');
    $query .= ' WHERE `id` =: primaryKey';

    // :primaryKey 변수 설정
    $fields['primaryKey'] = $fields['id'];

    $fields = processDates($fields);

    query($pdo, $query, $fields);
}

function deleteJoke($pdo, $id) {
    $parameters = [':id' => $id];

    query($pdo, 'DELETE FROM `joke` WHERE `id` = :id', $parameters);
}

function allJokes($pdo) {
    $jokes = query($pdo, 'SELECT `joke`.`id`, `joketext`, `jokedate`, `name`, `email`
        FROM `joke` INNER JOIN `author` ON `authorid` = `author`.`id`');

    return $jokes->fetchAll();
}

function processDates($fields) {
    // 배열 요소 순회
    foreach ($fields as $key => $value) {
        // $value가 DateTime 객체라면
        if ($value instanceof DateTime) {
            // Y-m-d H:i:s 형식으로 변환
            $fields[$key] = $value->format('Y-m-d H:i:s');
        }
    }

    return $fields;
}
