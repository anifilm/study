<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<title>CI3 Todo App</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<style>
		nav > ul li {
			/*list-style-type: none;*/
			display: inline-block;
			margin-right: 20px;
		}
	</style>
</head>
<body>
	<div id="main" class="container">
		<!-- Header Start -->
		<header id="header" data-role="header" data-position="fixed" class="mt-4">
			<blockquote>
				<p>만들면서 배우는 CodeIgniter</p>
				<small>실행 예제</small>
			</blockquote>
		</header>
		<!-- Header End -->

		<!-- gnb Start -->
		<nav id="gnb">
			<ul>
				<li><a rel="external" href="/board/lists/">게시판 프로젝트</a></li>
				<li><a rel="external" href="/test/">폼 검증 테스트</a></li>
				<li><span>&nbsp;|&nbsp;</span></li>
				<?php if($this->session->userdata('logged_in') == TRUE): ?>
				<li><a href="/auth/logout"><?= $this->session->userdata('username') ?>님 (로그아웃)</a></li>
				<?php else: ?>
				<li><a href="/auth/login">회원가입</a></li>
				<li><a href="/auth/login">로그인</a></li>
				<?php endif ?>
			</ul>
		</nav>
		<!-- gnb End -->
