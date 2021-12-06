<?php

try {
	include __DIR__.'/../includes/DatabaseConnection.php';
	include __DIR__.'/../classes/DatabaseTable.php';
	include __DIR__.'/../classes/controllers/JokeController.php';

	$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
	$authorsTable = new DatabaseTable($pdo, 'author', 'id');

	$jokeController = new JokeController($jokesTable, $authorsTable);

	//if (isset($_GET['edit'])) {
	//	$page = $jokeController->edit();
	//}
	//else if (isset($_GET['delete'])) {
	//	$page = $jokeController->delete();
	//}
	//else if (isset($_GET['list'])) {
	//	 $page = $jokeController->list();
	//}
	//else {
	//	$page = $jokeController->home();
	//}

	$action = $_GET['action'] ?? 'home';

	$page = $jokeController->$action();

	$title = $page['title'];
	$output = $page['output'];

} catch (PDOException $e) {
	$title = '오류가 발생했습니다';

	$output = '데이터베이스 오류: '.$e->getMessage().', 위치: '.$e->getFile().':'.$e->getLine();
}

include __DIR__.'/../templates/layout.html.php';
