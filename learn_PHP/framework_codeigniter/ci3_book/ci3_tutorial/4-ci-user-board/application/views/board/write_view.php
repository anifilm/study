<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<?php
	// CSRF 적용
	$attributes = array('class' => 'my-4', 'id' => 'write_action');
	echo form_open('board/write', $attributes);
	?>
		<fieldset>
			<legend class="border-bottom my-4"><?= $label ?></legend>
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
			<div>
				<a href="/board/lists" class="btn btn-outline-secondary" style="width: 90px">취소</a>
				<button type="submit" class="btn btn-primary ml-2" id="write_btn"><?= $button ?></button>
			</div>
		</fieldset>
	</form>
</article>

<script>
	// 폼 검증으로 변경
	//window.onload = function () {
	//	$(document).ready(function () {
	//		$('#write_btn').click(function () {
	//			if ($('#input01').val() == '') {
	//				alert('제목을 입력해주세요.');
	//				$('#input01').focus();
	//				return false;
	//			}
	//			else if ($('#input02').val() == '') {
	//				alert('내용을 입력해주세요.');
	//				$('#input02').focus();
	//				return false;
	//			}
	//			else {
	//				$('#write_action').submit();
	//			}
	//		});
	//	});
	//}
</script>
