<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- CKEditor4 -->
	<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

	<link rel="stylesheet" href="/static/css/style.css">
</head>
<body>
	<!-- 로그인 관련 메시지 출력 -->
	<?php
	if ($this->session->flashdata('message')):
	?>
	<script>
		alert('<?= $this->session->flashdata('message') ?>');
	</script>
	<?php
	// flashdata 내용이 초기화 되지 않아 강제로 초기화 시켜줌
	$this->session->set_flashdata('message');
	endif;
	?>

	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
		<div class="container">
			<a class="navbar-brand" href="/">CI3 Topic Blog</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" blank>Link</a>
					</li>
				</ul>
				<!-- 오른쪽 항목 (로그인 관련) -->
				<?php if ($this->session->userdata('is_login')): ?>
				<ul class="navbar-nav">
					<li class="nav-item">
						<!-- 로그아웃 + 사용자명 출력 -->
						<a class="nav-link" href="/auth/logout"><?= $this->session->userdata('username') ?>님 (로그아웃)</a>
					</li>
				</ul>
				<?php else: ?>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="/auth/signup">회원가입</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/auth/login">로그인</a>
					</li>
				</ul>
				<?php endif	?>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row mt-3">
