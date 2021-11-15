<div class="col-9">
	<form class="mt-4 ml-4" action="/topic/add" method="POST">
		<?php echo validation_errors(); ?>
		<div class="form-group">
			<label for="title">제목</label>
			<input class="form-control" id="title" name="title">
		</div>
		<div class="form-group">
			<label for="description">본문</label>
			<textarea class="form-control" id="description" rows="10" name="description"></textarea>
		</div>
		<input type="submit" class="btn btn-primary">
	</form>
</div>
