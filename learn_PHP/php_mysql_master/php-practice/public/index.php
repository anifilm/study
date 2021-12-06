<?php

function loadTemplate($templateFileName, $variables = []) {
	extract($variables);

	ob_start();
	include __DIR__.'/../templates/'.$templateFileName;

	return ob_get_clean();
}

try {
	include __DIR__.'/../includes/DatabaseConnection.php';
	include __DIR__.'/../classes/DatabaseTable.php';
	//include __DIR__.'/../classes/controllers/JokeController.php';

	$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
	$authorsTable = new DatabaseTable($pdo, 'author', 'id');

	//$jokeController = new JokeController($jokesTable, $authorsTable);

	//$action = $_GET['action'] ?? 'home';

	// route 변수가 없으면 'joke/home' 할당
	$route = $_GET['route'] ?? 'joke/home';

	//$controllerName = $_GET['controller'] ?? 'joke';

	//if ($action == strtolower($action) && $controllerName == strtolower($controllerName)) {
	//	$className = ucfirst($controllerName).'Controller';

	//	include __DIR__.'/../classes/controllers/'.$className.'.php';

	//	$controller = new $className($jokesTable, $authorsTable);
	//	$page = $controller->$action();
	//}
	//else {
	//	http_response_code(301);
	//	header('location: index.php?controller='.strtolower($controllerName).'&action='.strtolower($action));
	//}

	if ($route == strtolower($route)) {
		if ($route === 'joke/home') {
			include __DIR__.'/../classes/controllers/JokeController.php';
			$controller = new JokeController($jokesTable, $authorsTable);
			$page = $controller->home();
		}
		else if ($route === 'joke/list') {
			include __DIR__.'/../classes/controllers/JokeController.php';
			$controller = new JokeController($jokesTable, $authorsTable);
			$page = $controller->list();
		}
		else if ($route === 'joke/edit') {
			include __DIR__.'/../classes/controllers/JokeController.php';
			$controller = new JokeController($jokesTable, $authorsTable);
			$page = $controller->edit();
		}
		else if ($route === 'joke/delete') {
			include __DIR__.'/../classes/controllers/JokeController.php';
			$controller = new JokeController($jokesTable, $authorsTable);
			$page = $controller->delete();
		}
		else if ($route === 'register') {
			include __DIR__.'/../classes/controllers/RegisterController.php';
			$controller = new RegisterController($authorsTable);
			$page = $controller->showForm();
		}
	}
	else {
		http_response_code(301);
		header('location: index.php?route=' . strtolower($route));
	}

	$title = $page['title'];

	if (isset($page['variables'])) {
		$output = loadTemplate($page['template'], $page['variables']);
	}
	else {
		$output = loadTemplate($page['template']);
	}

} catch (PDOException $e) {
	$title = '오류가 발생했습니다';

	$output = '데이터베이스 오류: '.$e->getMessage().', 위치: '.$e->getFile().':'.$e->getLine();
}

include __DIR__.'/../templates/layout.html.php';
