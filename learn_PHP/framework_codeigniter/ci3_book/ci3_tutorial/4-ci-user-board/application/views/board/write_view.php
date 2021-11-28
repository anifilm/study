<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<form class="my-4" id="wrtie_action" method="POST">
		<fieldset>
			<legend class="border-bottom my-4"><?= $label ?></legend>
			<div class="form-group">
				<label for="input01">제목</label>
				<input type="text" class="form-control" id="input01" name="subject" value="<?= $views->subject ?? '' ?>">
			</div>
			<div class="form-group">
				<label for="input02">내용</label>
				<textarea class="form-control" id="input02" name="contents" rows="8"><?= $views->contents ?? '' ?></textarea>
			</div>
			<div>
				<a href="/board/lists" class="btn btn-outline-secondary" style="width: 90px">취소</a>
				<button type="submit" class="btn btn-primary ml-2" id="write_btn"><?= $button ?></button>
			</div>
		</fieldset>
	</form>
</article>

<script>
	// 하위의 스크립트를 모두 로드한 이후에 다음을 실행하도록 구성
	// 부트스트랩 제이쿼리 스크립트가 Footer에 위치하기 때문
	window.onload = function () {
		$(document).ready(function () {
			$('#write_btn').click(function () {
				if ($('#input01').val() == '') {
					alert('제목을 입력해주세요.');
					$('#input01').focus();
					return false;
				}
				else if ($('#input02').val() == '') {
					alert('내용을 입력해주세요.');
					$('#input02').focus();
					return false;
				}
				else {
					$('#write_action').submit();
				}
			});
		});
	}
</script>
