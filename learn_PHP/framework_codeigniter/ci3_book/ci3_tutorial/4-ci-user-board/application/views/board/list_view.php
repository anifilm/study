<article id="board_area">
	<header>
		<h1>일정 목록</h1>
	</header>
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
						<a rel="external" href="/board/<?= $lt->board_id ?>"><?= $lt->subject ?></a>
					</td>
					<td class="text-center"><?= $lt->user_name ?></td>
					<td class="text-center"><?= $lt->hits ?></td>
					<td class="text-center">
						<time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->reg_date)) ?>"><?= date('Y-m-d H:i', human_to_unix($lt->reg_date)) ?></time>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</article>
