<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return 'Hello!';
});
//Route::get('hello/world', function () {
//    return 'Hello World!';
//});
//Route::get('hello/world/{name?}', function ($name='lesstif') {
//    return 'Hello World! ' . $name;
//});

use Illuminate\Http\Response;

//Route::get('hello/world/{name}', function ($name) {
//    $response = new Response('Hello World '. $name, 200);
//    $response->header('Content-Type', 'text/plain');
//    return $response;
//});
Route::get('hello/world/{name}', function ($name) {
    return response('Hello World '. $name, 200)->header('Content-Type', 'text/plain');
});

Route::get('hello/json', function () {
    $data = [
        'name' => 'Iron Man',
        'gender' => 'Man',
    ];

    return response()->json($data);
});

//Route::get('hello/html', function () {
//    $content = <<<HTML
//<!DOCTYPE html>
//<html lang="ko">
//<head>
//    <meta charset="utf-8">
//    <title>Ok</title>
//</head>
//<body>
//    <h1>라라벨이란?</h1>
//    <h3>라라벨은 가장 모던하고 세련된 PHP 프레임워크이며, 유연하고 세련된 기능을 제공합니다.</h3>
//</body>
//</html>
//HTML;

//    return $content;
//});

Route::get('hello/html', function () {
    return view('hello.html');
});

Route::get('task/view', function () {
    $task = [
        'name' => 'Task 1',
        'due_date' => '2015-06-01 12:00:11'
    ];

    return view('task.view')->with('task', $task);
});

Route::get('task/alert', function () {
    $task = [
        'name' => '라라벨 예제 작성',
        'due_date' => '2015-06-01 12:00:11',
        'comment' => '<script>alert("Welcome");</script>',
    ];

    return view('task.alert')->with('task', $task);
});

Route::get('task/list', function () {
    $tasks = [
        [
            'name' => 'Response 클래스 분석',
            'due_date' => '2015-06-01 12:00:11',
        ],
        [
            'name' => '라라벨 예제 작성',
            'due_date' => '2015-06-01 15:21:13',
        ],
    ];

    return view('task.list')->with('tasks', $tasks);
});
