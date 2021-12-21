<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<?php
	// CSRF 적용
	$attributes = array('class' => 'my-4', 'id' => 'upload_action');
	echo form_open_multipart('/sns/modify_photo/'.$views->id, $attributes);
	?>
		<fieldset>
			<legend class="border-bottom my-4">SNS 수정</legend>
			<div class="form-group">
				<label for="input01">제목</label>
				<input type="text" class="form-control" id="input01" name="subject" value="<?= $views->subject ?? set_value('subject') ?>">
				<small class="text-danger"><?= form_error('subject') ?: '&nbsp;' ?></small>
			</div>
			<div class="form-group">
				<label for="input02">내용</label>
				<textarea class="form-control" id="input02" name="contents" rows="8"><?= $views->contents ?? set_value('contents') ?></textarea>
				<small class="text-danger"><?= form_error('contents') ?: '&nbsp;' ?></small>
			</div>
			<div class="form-group">
				<label for="input03">사진 미리보기</label><br>
				<img src="/static/uploads/<?= $views->file_name ?>" width="300px"><br>
				파일명: <?= $views->original_name ?>
			</div>
			<div class="form-group">
				<label for="input04">사진 수정</label>
				<input type="file" class="form-control-file" id="input04" name="userfile" value="<?= set_value('userfile') ?>">
				<small class="text-danger"><?= form_error('userfile') ?: '&nbsp;' ?></small>
			</div>
			<div class="form-group mt-3">
				<a href="/sns/view/<?= $this->uri->segment(3) ?>" class="btn btn-outline-secondary" style="width: 90px">취소</a>
				<button type="submit" class="btn btn-primary ml-1" id="write_btn" style="width: 90px">수정</button>
			</div>
		</fieldset>
	</form>
</article>
