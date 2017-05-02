<div class="banner" style="background-image: url('<?= base_url() ?>admin/uploads/files/<?= $article->background_image_file  ?>')">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="text-center">
					<?= $article->title_text ?>
					<br> <small style="color: #fff">
						<?= (!empty($article->updated_at) && $article->updated_at != "0000-00-00 00:00:00")?
                                    date("d/m/Y", strtotime($article->updated_at))
                                    :date("d/m/Y", strtotime($article->created_at)) ?>
					</small></h2>
			</div>
		</div>
	</div>
</div>

<div id="content-blog">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="article">
							<?= $article->content_1_textarea ?>
							
							<div class="article-carousel">
								<?php $images = get_images_gallery($article->images_gallery) ?>
								<?php foreach ($images as $item) { ?>
								<div style="width: 100%;">
									<img src="<?= base_url() ?>admin/uploads/<?= $item->folder ?>/<?= $item->file  ?>" alt="<?= $article->title_text ?> - YNASU" class="img-responsiv">
								</div>
								<?php } ?>
							</div>

							<?= $article->content_2_textarea ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
