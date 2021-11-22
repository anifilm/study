<div class="col-9">
	<div class="tab-content ml-4" id="v-pills-tabContent">
		<h1 class="my-4"><?= $topic->title ?></h1>
		<div class="mt-4">
			<div class="my-3 text-secondary">
				<?= kdate($topic->created) ?>
			</div>
			<!--<?= auto_link($topic->description) ?>-->
			<?= $topic->description ?>
		</div>
	</div>
	<div class="mt-5 mb-3">
		<a href="/topic" class="btn btn-secondary">목록으로</a>
		<?php if ($this->session->userdata('is_login')): ?>
		<a href="/topic" class="btn btn-outline-primary">포스트 수정</a>
		<div style="display: inline-block; position: absolute; right: 0px;">
			<a href="/topic" class="btn btn-outline-danger">포스트 삭제</a>
		</div>
		<?php endif ?>
	</div>
</div>
