<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<div class="row my-3">
		<div class="mr-auto"></div>
		<form id="bd_search" method="POST" class="form-inline my-2 my-lg-0">
			<input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);" placeholder="Search..." class="form-control mr-sm-2">
			<input type="button" value="검색" id="search_btn" class="btn btn-outline-success my-2 mr-3 my-sm-0" >
		</form>
	</div>
	<table cellspacing="0" cellpadding="0" class="table table-striped">
		<thead>
			<tr>
				<th scope="col" class="text-center">번호</th>
				<th scope="col">제목</th>
				<th scope="col" class="text-center">작성자</th>
				<th scope="col" class="text-center">조회수</th>
				<th scope="col" class="text-center">작성일자</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($list as $lt): ?>
				<tr>
					<th scope="row" class="text-center">
						<?= $lt->board_id ?>
					</th>
					<td class="col-md-6">
						<a rel="external" href="/board/view/<?= $lt->board_id ?>"><?= $lt->subject ?></a>
					</td>
					<td class="text-center"><?= $lt->username ?></td>
					<td class="text-center"><?= $lt->hits ?></td>
					<td class="text-center">
						<time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->reg_date)) ?>"><?= date('Y-m-d H:i', human_to_unix($lt->reg_date)) ?></time>
					</td>
				</tr>
			<?php endforeach ?>

			<?php if (!$list): ?>
				<tr>
					<th colspan="5">
						검색 결과가 없습니다.
					</th>
				</tr>
			<?php endif ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="5">
					<div class="pagination justify-content-center"><?= $pagination ?></div>
				</th>
			</tr>
			<tr>
				<th colspan="5">
					<?php if($this->session->userdata('logged_in') == TRUE): ?>
					<a href="/board/write" class="btn btn-primary">새로운 글 작성</a>
					<?php else: ?>
					<a href="/board/write" class="btn btn-secondary">새로운 글 작성</a>
					<?php endif ?>
				</th>
			</tr>
		</tfoot>
	</table>
</article>

<script>
	function board_search_enter(form) {
		var keycode = window.event.keyCode;
		if (keycode == 13) $('#search_btn').click();
	}

	// 하위의 스크립트를 모두 로드한 이후에 다음을 실행하도록 구성
	// 부트스트랩 제이쿼리 스크립트가 Footer에 위치하기 때문
	window.onload = function () {
		$(document).ready(function () {
			$('#search_btn').click(function () {
				if ($('#q').val() == '') {
					alert('검색어를 입력하세요.');
					return false;
				} else {
					// 특수문자 제거
					var regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi;
					var word = $('#q').val().replace(regExp, '');

					var act = '/board/lists/q/' + word + '/page/1';
					$('#bd_search').attr('action', act).submit();
				}
			});
		});


	}
</script>
