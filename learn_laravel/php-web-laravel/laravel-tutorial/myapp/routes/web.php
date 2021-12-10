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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/hello', function () {
//    return '<h1>Hello Foo</h1>';
//});

//Route::get('/{foo?}', function ($foo='bar') {
//    return $foo;
//})->where('foo', '[0-9a-zA-Z]{3}');

//Route::get('/', [
//    'as' => 'home',
//    function () {
//        return '제 이름은 "home" 입니다.';
//    }
//]);

//Route::get('/home', function () {
//    return redirect(route('home'));
//});

//Route::get('/', function () {
//    return view('errors.503');
//});

//Route::get('/', function () {
//    return view('welcome')->with('name', 'Foo');
//});

//Route::get('/', function () {
//    return view('welcome')->with([
//        'name' => 'Foo',
//        'greeting' => '안녕하세요',
//    ]);
//});

//Route::get('/', function () {
//    $items = ['apple', 'banana', 'tomato'];

//    return view('welcome')->with([
//        'name' => 'Foo',
//        'greeting' => '안녕하세요',
//        'items' => $items,
//    ]);
//});

// 컨트롤러를 통한 메서드 호출 App\Http\Controllers\WelcomeController->index()
Route::get('/', 'WelcomeController@index');

Route::resource('articles', 'ArticlesController');

Route::get('auth/login', function () {
    $credentials = [
        'email' => 'john@example.com',
        'password' => 'password'
    ];

    if (!auth()->attempt($credentials)) {
        return '로그인 정보가 정확하지 않습니다.';
    }

    return redirect('protected');
});

Route::get('protected', function () {
    dump(session()->all());

    if (!auth()->check()) {
        return '누구세요?';
    }

    return '어서오세요 '.auth()->user()->name;
});

Route::get('auth/logout', function () {
    auth()->logout();

    return '또 봐요~';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//DB::listen(function ($query) {
//    var_dump($query->sql);
//});

Route::get('mail', function () {
    $article = App\Article::with('user')->find(1);

    return Mail::send(
        'emails.articles.created',
        compact('article'),
        function ($message) use ($article) {
            $message->to('richdad02@naver.com');
            $message->subject('새 글이 등록되었습니다. - '.$article->title);
        }
    );
});

Route::get('markdown', function () {
    $text =<<<EOT
# 마크다운 예제 1

이 문서는 [마크다운][1]으로 썼습니다. 화면에는 HTML로 변환되어 출력됩니다.

## 순서 없는 목록

- 첫 번째 항목
- 두 번째 항목[^1]

[1]: http://daringfireball.net/projects/markdown

[^1]: 두 번째 항목_ http://google.com
EOT;

    return app(ParsedownExtra::class)->text($text);
});

//Route::get('docs/{file?}', function ($file=null) {
//    $text = (new App\Documentation)->get($file);

//    return app(ParsedownExtra::class)->text($text);
//});

Route::get('docs/{file?}', 'DocsController@show');
Route::get('docs/images/{image}', 'DocsController@image')
    ->where('image', '[\pL-\pN\._-]+-img-[0-9]{2}.png');
