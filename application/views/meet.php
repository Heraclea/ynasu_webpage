
<div class="banner" style="background-image: url('<?= base_url() ?>admin/uploads/files/<?= $meet->background_image_file ?>')">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="text-center"><?= $meet->title_text ?></h2>
			</div>
		</div>
	</div>
</div>

<div id="meet">
	<div class="container">
		<div class="row">
			<?php foreach ($items as $item) { ?>
			<div class="col-sm-4">
				<div class="meet">
					<a href="<?= base_url() ?>meet/show/<?= $item->id ?>"><img src="<?= base_url() ?>admin/uploads/files/<?= $item->image_file ?>" alt="<?= $item->name_text ?> - YNASU" class="img-responsiv"></a>
					<div class="content-text">
						<h4><?= $item->name_text ?></h4>
						<?= $item->subtitle_text ?>
						<?= $item->short_description_textarea ?>
						<a href="<?= base_url() ?>meet/show/<?= $item->id ?>">>> read more</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="pagination">
				<?php foreach ($links as $link) { ?>
				<?= $link ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>