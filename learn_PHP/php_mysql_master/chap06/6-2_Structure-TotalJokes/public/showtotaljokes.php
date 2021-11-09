<?php

// $pdo 변수를 생성하고 데이터베이스로 접속하는 인클루드 파일
include_once __DIR__.'/../includes/DatabaseConnection.php';

// totalJokes() 함수가 선언된 인클루드 파일
include_once __DIR__.'/../includes/DatabaseFunctions.php';

// 함수 호출
echo totalJokes($pdo);
