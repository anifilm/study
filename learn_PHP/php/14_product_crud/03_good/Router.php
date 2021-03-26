<?php

namespace app;

class Router {
  public array $getRoutes = [];
  public array $postRoutes = [];

  public ?Database $database = null;

  public function __construct(Database $database) {
    $this->database = $database;
  }

  public function get($url, $fn) {
    $this->getRoutes[$url] = $fn;
  }

  public function post($url, $fn) {
    $this->postRoutes[$url] = $fn;
  }

  public function resolve() {
    $method = $_SERVER['REQUEST_METHOD'];
    $url = $_SERVER['PATH_INFO'] ?? '/';

    if ($method === 'GET') {
      $fn = $this->getRoutes[$url] ?? null;
    }
    else {
      $fn = $this->postRoutes[$url] ?? null;
    }

    if (!$fn) {
      echo 'Page not found';
      exit;
    }
    // 05:20:28
    //echo call_user_func($fn, $this);
    // PHP 8.0 이상에서 다음과 같이 사용할 것!
    $controller = new $fn[0];
    echo call_user_func(array($controller, $fn[1]), $this);
  }

  public function renderView($view, $params = []) {
    foreach ($params as $key => $value) {
      $$key = $value;
    }
    ob_start();
    include __DIR__."/views/$view.php";
    $content = ob_get_clean();
    include __DIR__."/views/_layout.php";
  }
}
