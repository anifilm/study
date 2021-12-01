<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<!--<?= validation_errors() ?>-->
	<!--<form class="my-4" id="wrtie_action" method="POST">-->
	<?php
	// CSRF 적용
	$attributes = array('class' => 'my-4', 'id' => 'write_action');
	echo form_open('/auth/signup', $attributes);
	?>
		<fieldset>
			<legend class="border-bottom my-4">회원가입</legend>
			<div class="form-group row">
				<label for="input01" class="col-sm-2 col-form-label">이메일</label>
				<div class="col-sm-9">
					<input type="email" class="form-control" id="input01" name="email" value="<?= set_value('email') ?>">
					<small class="text-danger"><?= form_error('email') ?: '&nbsp;' ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="input02" class="col-sm-2 col-form-label">사용자명</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="input02" name="username" value="<?= set_value('username') ?>">
					<small class="text-danger"><?= form_error('username') ?: '&nbsp;' ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="input03" class="col-sm-2 col-form-label">비밀번호</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="input03" name="password" value="<?= set_value('password') ?>">
					<small class="text-danger"><?= form_error('password') ?: '&nbsp;' ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="input04" class="col-sm-2 col-form-label">비밀번호 확인</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="input04" name="passconf" value="<?= set_value('passconf') ?>">
					<small class="text-danger">&nbsp;</small>
				</div>
			</div>
			<div class="mt-4">
				<a href="/board/lists" class="btn btn-outline-secondary" style="width: 90px">취소</a>
				<button type="submit" class="btn btn-primary ml-2" id="write_btn" style="width: 90px">전송</button>
			</div>
		</fieldset>
	</form>
</article>
