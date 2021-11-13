<?php

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

//function totalJokes($pdo) {
//    $query = query($pdo, 'SELECT COUNT(*) FROM `joke`');
//    $row = $query->fetch();
//    return $row[0];
//}

function total($pdo, $table) {
    $query = query($pdo, "SELECT COUNT(*) FROM `{$table}`");
    $row = $query->fetch();
    return $row[0];
}

//function getJoke($pdo, $id) {
//    $parameters = [':id' => $id];
//    $query = query($pdo, 'SELECT * FROM `joke` WHERE `id` = :id', $parameters);
//    return $query->fetch();
//}

function findById($pdo, $table, $primaryKey, $value) {
    $query = "SELECT * FROM `{$table}` WHERE `{$primaryKey}` = :value";
    $parameters = [
        'value' => $value
    ];
    $query = query($pdo, $query, $parameters);
    return $query->fetch();
}

function insert($pdo, $table, $fields) {
    $query = "INSERT INTO `${table}` (";

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

function update($pdo, $table, $primaryKey, $fields) {
    $query = "UPDATE `${table}` SET ";

    foreach ($fields as $key => $value) {
        $query .= "`{$key}` = :{$key},";
    }

    $query = rtrim($query, ',');
    $query .= " WHERE `{$primaryKey}` = :primaryKey";

    // :primaryKey 변수 설정
    $fields['primaryKey'] = $fields['id'];

    $fields = processDates($fields);

    query($pdo, $query, $fields);
}

//function deleteJoke($pdo, $id) {
//    $parameters = [':id' => $id];
//    query($pdo, 'DELETE FROM `joke` WHERE `id` = :id', $parameters);
//}

function delete($pdo, $table, $primaryKey, $id) {
    $parameters = [':id' => $id];
    query($pdo, "DELETE FROM `{$table}` WHERE `{$primaryKey}` = :id", $parameters);
}

//function allJokes($pdo) {
//    $jokes = query($pdo, 'SELECT `joke`.`id`, `joketext`, `jokedate`, `name`, `email`
//        FROM `joke` INNER JOIN `author` ON `authorid` = `author`.`id`');
//    return $jokes->fetchAll();
//}

function findAll($pdo, $table) {
    $result = query($pdo, "SELECT * FROM `{$table}`");
    return $result->fetchAll();
}

function processDates($fields) {
    foreach ($fields as $key => $value) {
        if ($value instanceof DateTime) {
            $fields[$key] = $value->format('Y-m-d H:i:s');
        }
    }
    return $fields;
}

function save($pdo, $table, $primaryKey, $record) {
    try {
        if ($record[$primaryKey] == '') {
            $record[$primaryKey] = null;
        }
        // 새로운 글 등록시, 이미 등록된 글 데이터가 있다면 '중복 키' 오류 발생
        insert($pdo, $table, $record);

    } catch (PDOException $e) {
        // 중복 키가 있다면 글 데이터를 수정한다.
        update($pdo, $table, $primaryKey, $record);
    }
}
