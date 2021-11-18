<div class="col-9">
	<div class="list-group mt-4">
	<?php foreach($topics as $entry): ?>
		<a class="list-group-item list-group-item-action" href="/topic/<?= $entry->id ?>">
			<div class="d-flex w-100 justify-content-between">
				<h5 class="mb-1"><?= $entry->title ?></h5>
				<small class="text-secondary"><?= kdate($entry->created) ?></small>
			</div>
			<div class="mt-3">
				<small class="mulit-line-ellipsis"><?= substr(strip_tags($entry->description), 0, 200) ?></small>
			</div>
		</a>
	<?php endforeach ?>
	</div>
	<div class="mt-3 mb-3" align="right">
		<a href="/topic/add" class="btn btn-primary">포스트 추가</a>
	</div>
</div>
