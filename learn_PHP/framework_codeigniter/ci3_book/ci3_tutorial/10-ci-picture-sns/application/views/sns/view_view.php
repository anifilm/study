<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<div class="mt-3">&nbsp;</div>
	<table cellspacing="0" cellpadding="0" class="table">
		<thead>
			<tr>
				<th scope="col" width="50%"><?= $views->subject ?></th>
				<th scope="col">작성자: <?= $views->username ?></th>
				<th scope="col">조회수: <?= $views->hits ?></th>
				<th scope="col">작성일자: <?= $views->reg_date ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan="4">
					<img src="/static/uploads/<?= $views->file_name ?>"><br>
					<?= $views->contents;?><br><br>
					파일명: <?= $views->original_name ?>
				</th>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">
					<a href="/sns/lists" class="btn btn-outline-secondary">목록으로</a>
					<?php if($this->session->userdata('logged_in') == TRUE && $writer): ?>
					<a href="/sns/modify_photo/<?= $this->uri->segment(3) ?>" class="btn btn-primary ml-2">게시물 수정</a>
					<div style="display: inline-block; position: absolute; right: 142px;">
						<a href="/sns/delete/<?= $this->uri->segment(3) ?>" class="btn btn-outline-danger">게시물 삭제</a>
					</div>
					<?php else: ?>
					<a href="#" class="btn btn-secondary ml-2 disabled">게시물 수정</a>
					<?php endif ?>
				</th>
			</tr>
		</tfoot>
	</table>

	<div id="comment_area">
		<table cellspacing="0" cellpadding="0" class="table">
		<?php foreach ($comment_list as $lt): ?>
			<tr id="row_num_<?= $lt->board_id ?>">
				<td width="54%"><small><?= $lt->contents ?></small></td>
				<td width="26%"><small><?= $lt->username ?></small></td>
				<td>
					<small>
					<time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->reg_date)) ?>"><?= date('Y-m-d H:i', human_to_unix($lt->reg_date)) ?></time></small>
				</td>
				<?php if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('username') == $lt->username): ?>
				<td><small><a href="#" class="comment_delete" vals="<?= $lt->board_id ?>"><i class="icon-trash"></i>삭제</a></small></td>
				<?php endif ?>
			</tr>
		<?php endforeach ?>
		</table>
	</div>
	<form name="comment_add" method="POST" class="my-4">
		<div class="form-group">
			<label for="input01">댓글</label>
			<textarea class="form-control" id="input01" name="comment_contents" rows="3"></textarea>
		</div>
		<input type="button" class="btn btn-primary" id="comment_add" value="댓글 작성">
	</form>
</article>

<script src="/include/js/httpRequest.js"></script>
<script>
	function getCookie(name) {
		var nameOfCookie = name + '=';
		var x = 0;

		while (x <= document.cookie.length) {
			var y = (x + nameOfCookie.length);

			if (document.cookie.substring(x, y) == nameOfCookie) {
				if ((endOfCookie = document.cookie.indexOf(';', y)) == -1) {
					endOfCookie = document.cookie.length;
				}

				return unescape(document.cookie.substring(y, endOfCookie));
			}

			x = document.cookie.indexOf(' ', x) + 1;

			if (x == 0) break;
		}

		return '';
	}

	// 하위의 스크립트를 모두 로드한 이후에 다음을 실행하도록 구성
	// 부트스트랩 제이쿼리 스크립트가 Footer에 위치하기 때문
	window.onload = function () {
		// Ajax 구현: jQuery
		$(function () {
			$('#comment_add').click(function () {
				$.ajax({
					url: '/ajax_board/ajax_comment_add',
					type: 'POST',
					data: {
						'comment_contents': encodeURIComponent($('#input01').val()),
						'csrf_test_name': getCookie('csrf_cookie_name'),
						'table': 'ci_board',
						'board_id': '<?= $this->uri->segment(3) ?>',
					},
					dataType: 'html',
					complete: function (xhr, textStatus) {
						if (textStatus == 'success') {
							if (xhr.responseText == 1000) {
								alert('댓글 내용을 입력하세요.');
							}
							else if (xhr.responseText == 2000) {
								alert('다시 입력하세요.');
							}
							else if (xhr.responseText == 9000) {
								alert('로그인해야 합니다.');
							}
							else {
								console.log(xhr.responseText);
								$('#comment_area').html(xhr.responseText);
								$('#input01').val('');
							}
						}
					}
				});
			});

			$('.comment_delete').click(function () {
				$.ajax({
					url: '/ajax_board/ajax_comment_delete',
					type: 'POST',
					data: {
						'csrf_test_name': getCookie('csrf_cookie_name'),
						'table': 'ci_board',
						'board_id': $(this).attr('vals'),
					},
					dataType: 'text',
					complete: function (xhr, textStatus) {
						if (textStatus == 'success') {
							if (xhr.responseText == 2000) {
								alert('다시 삭제하세요.');
							}
							else if (xhr.responseText == 8000) {
								alert('자신이 작성한 댓글만 삭제할 수 있습니다.');
							}
							else if (xhr.responseText == 9000) {
								alert('로그인해야 합니다.');
							}
							else {
								$('#row_num_' + xhr.responseText).remove();
								alert('댓글이 삭제 되었습니다.');
							}
						}
					}
				});
			});
		});
	}
</script>
