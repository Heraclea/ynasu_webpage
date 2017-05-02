<br><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
<div id="meet">
	<div class="container">
		<div class="row">
			<?php if($items){ ?>
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
			<?php }else{ ?>
				<br><br><br>
				<h3 class="text-center">Not found results</h3>
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

<script>
	$(document).ready(function() {
		$(".pagination a").each(function() {
		   $(this).attr("href", $(this).attr('href') + "?keyword=<?= $this->input->get('keyword') ?>");
		});
	});
</script>