<div class="col-2 mt-4">
	<div class="list-group" id="list-tab" role="tablist">
	<?php foreach($topics as $entry): ?>
		<a class="list-group-item list-group-item-action" href="/topic/get/<?= $entry->id ?>"><?= $entry->title ?></a>
	<?php endforeach ?>
	</div>
</div>
