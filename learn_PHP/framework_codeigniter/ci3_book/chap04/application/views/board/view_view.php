<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<table cellspacing="0" cellpadding="0" class="table">
		<thead>
			<tr>
				<th scope="col"><?= $views->subject ?></th>
				<th scope="col">작성자: <?= $views->username ?></th>
				<th scope="col">조회수: <?= $views->hits ?></th>
				<th scope="col">작성일자: <?= $views->reg_date ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan="4"><?= $views->contents ?></th>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">
					<a href="/board/lists" class="btn btn-outline-secondary">목록으로</a>
					<a href="/board/modify/<?= $this->uri->segment(3) ?>" class="btn btn-primary ml-2">게시글 수정</a>
					<a href="/board/delete/<?= $this->uri->segment(3) ?>" class="btn btn-outline-danger" style="display: inline-block; float:right;
					">글 삭제</a>
				</th>
			</tr>
		</tfoot>
	</table>
</article>
