토픽 메인 페이지
<ul>
<?php foreach($topics as $entry): ?>
	<li><a href="/topic/get/<?= $entry->id ?>"><?= $entry->title ?></a></li>
<?php endforeach ?>
</ul>
