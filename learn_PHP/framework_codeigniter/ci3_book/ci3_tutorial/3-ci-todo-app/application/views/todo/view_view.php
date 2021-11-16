<article id="board_area">
	<header>
		<h1>일정 조회</h1>
	</header>
	<table cellspacing="0" cellpadding="0" class="table table-striped">
		<thead>
			<tr>
				<th scope="col"><?= $views->id ?>번 할일</th>
				<th scope="col">시작일: <?= $views->created_on ?></th>
				<th scope="col">종료일: <?= $views->due_date ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan="3"><?= $views->content ?></th>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">
					<a href="/main/lists/" class="btn btn-outline-secondary">목록 보기</a>
					<a href="/main/write/" class="btn btn-primary">일정 수정</a>
					<a href="/main/delete/<?= $views->id ?>" class="btn btn-outline-danger" style="display:inline-block; float:right;">일정 삭제</a>
				</th>
			</tr>
		</tfoot>
	</table>
	<div>
		<p></p>
	</div>
</article>
