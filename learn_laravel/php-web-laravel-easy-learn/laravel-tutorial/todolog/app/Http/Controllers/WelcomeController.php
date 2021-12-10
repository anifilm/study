<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct() {
        // 5.2.27 이하 버전을 사용할 경우 세션 정보를 사용하기 위해  web 미들웨어 그룹을 지정
        //$this->middleware('web');
    }

    /**
     * 사이트 웰컴 화면
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // 3 사용자, 프로젝트, 태스크 수 가져오기. 아직 모들을 생성하지 않았으므로 0으로 설정
        $userCount = 0; // User::count();
        $projectCount = 0; // Project::count();
        $taskCount = 0; // Task::count();

        $total = [
            'user' => $userCount,
            'project' => $projectCount,
            'task' => $taskCount,
        ];

        return view('welcome')->with('total', $total);
    }
}
