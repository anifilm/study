<?php

interface WebApp {
    public function register($id, $password, $name);
    public function login($id, $password);
    public function logout($id);
}

interface CMS {
    public function post($subject);
}

class WebSite implements WebApp, CMS {
    public function register($id, $password, $name) {
        echo '사용자 등록: 아이디='.$id.', 이름='.$name.'<br>';
    }

    public function login($id, $password) {
        echo '로그인: '.$id.'<br>';
    }

    public function logout($id) {
        echo '로그아웃: '.$id.'<br>';
    }

    public function post($subject) {
        echo '게시물 등록: '.$subject.'<br>';
    }
}

$website = new WebSite();

$id = 'hong';
$password = 'hong1234';
$name = '홍길동';
$subject = '게시물 제목입니다.';

$website->register(id: $id, password: $password, name: $name);
$website->login(id: $id, password: $password);
$website->post(subject: $subject);
$website->logout(id: $id);
