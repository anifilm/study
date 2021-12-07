<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<?php
	// CSRF 적용
	$attributes = array('class' => 'my-4', 'id' => 'upload_action');
	echo form_open_multipart('/controlls/upload_photo', $attributes);
	?>
		<fieldset>
			<legend class="border-bottom my-4">SNS 쓰기</legend>
			<div class="form-group">
				<label class="control-label" for="input01">사진 업로드</label>
				<input type="file" class="input-xlarge" id="input01" name="userfile" value="<?= $views->file_name ?? set_value('userfile') ?>">
				<small class="text-danger"><?= form_error('userfile') ?: '&nbsp;' ?></small>
			</div>
			<div class="form-group">
				<label for="input02">제목</label>
				<input type="text" class="form-control" id="input02" name="subject" value="<?= $views->subject ?? set_value('subject') ?>">
				<small class="text-danger"><?= form_error('subject') ?: '&nbsp;' ?></small>
			</div>
			<div class="form-group">
				<label for="input03">내용</label>
				<textarea class="form-control" id="input03" name="contents" rows="8"><?= $views->contents ?? set_value('contents') ?></textarea>
				<small class="text-danger"><?= form_error('contents') ?: '&nbsp;' ?></small>
			</div>
			<div>
				<a href="/controlls/lists" class="btn btn-outline-secondary" style="width: 90px">취소</a>
				<button type="submit" class="btn btn-primary ml-2" id="write_btn">작성</button>
			</div>
		</fieldset>
	</form>
</article>

<script>
	// 폼 검증으로 변경
	window.onload = function () {
		$(document).ready(function () {
			$("#write_btn").click(function () {
				if ($("#input01").val() == '') {
					alert('업로드할 파일을 선택해주세요.');
					$("#input01").focus();
					return false;
				} else {
					$("#upload_action").submit();
				}
			});
		});
	}
</script>
