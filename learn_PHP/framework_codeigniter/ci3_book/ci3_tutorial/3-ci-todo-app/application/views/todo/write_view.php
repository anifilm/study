<article id="board_area">
	<header>
		<h1><?= $label ?></h1>
	</header>
	<form action="" method="POST" id="write_action" class="my-4">
		<div class="form-group row">
			<label for="input01" class="col-sm-1 col-form-label text-center">내용</label>
			<div class="col-sm-11">
				<input type="text" class="form-control" id="input01" name="content" value="<?= $views->content ?? '' ?>" placeholder="할 일을 작성하세요.">
			</div>
		</div>
		<div class="form-group row">
			<label for="input02" class="col-sm-1 col-form-label text-center">시작일</label>
			<div class="col-sm-11">
				<input type="date" class="form-control" id="input02" name="created_on" value="<?= $views->created_on ?? date("Y-m-d", time()) ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="input03" class="col-sm-1 col-form-label text-center">종료일</label>
			<div class="col-sm-11">
				<input type="date" class="form-control" id="input03" name="due_date" value="<?= $views->due_date ?? date("Y-m-d", time()) ?>">
			</div>
		</div>
		<a href="/main/lists/" class="btn btn-outline-secondary ml-1" style="width: 90px">취소</a>
		<button type="submit" id="write_btn" class="btn btn-primary ml-2" style="width: 90px"><?= $button ?></button>
	</form>
</article>
