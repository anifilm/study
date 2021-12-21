<div class="col-9">
	<form class="mt-4 ml-4" action="/topic/update/<?= $topic->id ?>" method="POST">
		<?= validation_errors(); ?>
		<div class="form-group">
			<label for="title">제목</label>
			<input class="form-control" id="title" name="title" value="<?= $topic->title ?>">
		</div>
		<div class="form-group">
			<label for="description">본문</label>
			<textarea class="form-control" id="description" rows="10" name="description"><?= $topic->description ?></textarea>
		</div>
		<input type="submit" class="btn btn-primary float-right" value="수정">
	</form>
</div>

<script>
	CKEDITOR.replace('description', {
		'filebrowserUploadMethod': 'form',
		'filebrowserUploadUrl': '/topic/upload_receive_from_ck'
	});
</script>
