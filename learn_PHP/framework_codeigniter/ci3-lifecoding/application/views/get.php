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
</div>
