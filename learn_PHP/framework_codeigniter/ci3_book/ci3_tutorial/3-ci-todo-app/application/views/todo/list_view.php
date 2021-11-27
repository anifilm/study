<article id="board_area">
	<header>
		<h1>일정 목록</h1>
	</header>
	<table cellspacing="0" cellpadding="0" class="table table-striped">
		<thead>
			<tr>
				<th scope="col">번호</th>
				<th scope="col">내용</th>
				<th scope="col">시작일</th>
				<th scope="col">종료일</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($list as $todo): ?>
				<tr>
					<th scope="row">
						<?= $todo->id; ?>
					</th>
					<td>
						<a rel="external" href="/main/view/<?= $todo->id; ?>"><?= $todo->content; ?></a>
					</td>
					<td>
						<time datetime="<?= mdate("%Y-%M-%j", human_to_unix($todo->created_on)); ?>"><?= $todo->created_on; ?></time>
					</td>
					<td>
						<time datetime="<?= mdate("%Y-%M-%j", human_to_unix($todo->due_date)); ?>"><?= $todo->due_date; ?></time>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4"><a href="/main/write/" class="btn btn-primary">일정 추가</a></th>
			</tr>
		</tfoot>
	</table>
</article>
