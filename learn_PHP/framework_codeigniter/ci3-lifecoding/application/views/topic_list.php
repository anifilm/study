<div class="col-3 mt-4">
	<div class="list-group" id="list-tab" role="tablist">
	<?php
	$i = 0;
	foreach($topics as $entry):
		$i++;
	?>
		<a class="list-group-item list-group-item-action" href="/topic/<?= $entry->id ?>"><?= $entry->title ?></a>
	<?php
		// 최근 항목 5개만 보이도록 수정
		if($i >= 5) break;
	endforeach
	?>
	</div>
</div>
