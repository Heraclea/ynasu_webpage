
<div class="banner" style="background-image: url('<?= base_url() ?>admin/uploads/files/<?= $blog->background_image_file  ?>')">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="text-center"><?= $blog->title_text ?></h2>
			</div>
		</div>
	</div>
</div>

<div id="blog">
	<div class="container">
		<div class="row">
			<?php foreach ($items as $item) { ?>
			<div class="col-sm-8 col-sm-offset-2 article">
				<div class="bk-img" style="background-image: url('<?= base_url() ?>admin/uploads/files/<?= $item->background_image_file  ?>')"></div>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<a href="<?= base_url() ?>blog/show/<?= $item->id ?>">
							<h4 class="text-center"><?= $item->title_text ?></h4>
							<p class="text-center">
								<?= (!empty($item->updated_at) && $item->updated_at != "0000-00-00 00:00:00")?
                                    date("d/m/Y", strtotime($item->updated_at))
                                    :date("d/m/Y", strtotime($item->created_at)) ?>
							</p>
						</a>
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