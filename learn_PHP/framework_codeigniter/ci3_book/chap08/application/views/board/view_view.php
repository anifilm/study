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
				<td colspan="4"><?= $views->contents ?></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">
					<a href="/board/lists" class="btn btn-outline-secondary">목록으로</a>
					<?php if($this->session->userdata('logged_in') == TRUE && $writer): ?>
					<a href="/board/modify/<?= $this->uri->segment(3) ?>" class="btn btn-primary ml-2">게시글 수정</a>
					<div style="display: inline-block; position: absolute; right: 142px;">
						<a href="/board/delete/<?= $this->uri->segment(3) ?>" class="btn btn-outline-danger">글 삭제</a>
					</div>
					<?php else: ?>
					<a href="#" class="btn btn-secondary ml-2 disabled">게시글 수정</a>
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
				<td><small>
					<time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->reg_date)) ?>"><?= date('Y-m-d H:i', human_to_unix($lt->reg_date)) ?></time>
				</small></td>
				<?php if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('username') == $lt->username): ?>
				<td><small><a href="#" onclick="commentDelete('<?= $lt->board_id ?>')"><i class="icon-trash"></i>삭제</a></small></td>
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
		<input type="button" class="btn btn-primary" onclick="commentAdd()" value="댓글 작성">
	</form>
</article>

<script src="/include/js/httpRequest.js"></script>
<script>
	function commentAdd() {
		var csrf_token = getCookie('csrf_cookie_name');
		var name = 'comment_contents=' + encodeURIComponent(document.comment_add.comment_contents.value) + '&csrf_test_name=' + csrf_token + '&table=ci_board&board_id=<?= $this->uri->segment(3) ?>';
		sendRequest('/ajax_board/ajax_comment_add', name, addAction, 'POST');
	}

	function addAction() {
		if (httpRequest.readyState == 4) {
			if (httpRequest.status == 200) {
				if (httpRequest.responseText == 1000) {
					alert('댓글 내용을 입력하세요.');
				}
				else if (httpRequest.responseText == 2000) {
					alert('다시 입력하세요.');
				}
				else if (httpRequest.responseText == 9000) {
					alert('로그인해야 합니다.');
				}
				else {
					var contents = document.getElementById('comment_area');
					contents.innerHTML = httpRequest.responseText;

					var textareas = document.getElementById('input01');
					textareas.value = '';
				}
			}
		}
	}

	function commentDelete(id) {
		var csrf_token = getCookie('csrf_cookie_name');
		var name = 'csrf_test_name=' + csrf_token + '&table=ci_board&board_id=' + id;
		sendRequest('/ajax_board/ajax_comment_delete', name, deleteAction, 'POST');
	}

	function deleteAction() {
		if (httpRequest.readyState == 4 ) {
			if (httpRequest.status == 200) {
				if (httpRequest.responseText == 2000) {
					alert('다시 삭제하세요.');
				}
				else if (httpRequest.responseText == 8000) {
					alert('자신이 작성한 댓글만 삭제할 수 있습니다.');
				}
				else if (httpRequest.responseText == 9000) {
					alert('로그인해야 합니다.');
				}
				else {
					var no = httpRequest.responseText;
					var delete_tr = document.getElementById('row_num_' + no);

					delete_tr.parentNode.removeChild(delete_tr);
					alert('댓글이 삭제 되었습니다.');
				}
			}
		}
	}

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
</script>
