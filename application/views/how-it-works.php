<div id="works">
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-12">
				<h3>How it works</h3>
			</div>
		</div>

		<div class="row text-center hidden-sm hidden-xs">
			<?php $i=1; foreach ($work as $item) { 
				$icon = "icon-left";

				if ($i == count($work)) $icon = "";
			?>
			<div class="col-sm-4 items <?= $icon; ?>" data-target="item-<?= $i; ?>">
				<img src="<?= base_url() ?>admin/uploads/files/<?= $item->icon_file  ?>" alt="" class="center">
				<span><?= $item->title_text ?></span>
			</div>
			<?php $i++; } ?>
		</div>
		<br class="hidden-sm hidden-xs"><br class="hidden-sm hidden-xs">
		<div class="row">
			
			<?php $i=1; foreach ($work as $item){ ?>
			<div class="col-sm-12 item-context" data-self="item-<?= $i; ?>">
				<div class="row">
					<?php if($i%2 != 0){ ?>
					<div class="col-sm-5 hidden-xs">
						<img src="<?= base_url() ?>admin/uploads/files/<?= $item->image_file ?>" alt="<?= $item->title_text ?> - YNASU" class="img-responsiv">
					</div>
					<?php } ?>
					<div class="col-sm-7">
						<span class="date"><?= $i; ?>. <?= $item->title_text ?></span>
						<?= $item->description_textarea ?>

						<a href="<?= base_url() ?>meet">>> read more</a>
					</div>

					<?php if($i%2 == 0){ ?>
					<div class="col-sm-5 hidden-xs">
						<img src="<?= base_url() ?>admin/uploads/files/<?= $item->image_file ?>" alt="<?= $item->title_text ?> - YNASU" class="img-responsiv">
					</div>
					<?php } ?>

					<div class="col-sm-5 hidden-sm hidden-md hidden-lg"><br>
						<img src="<?= base_url() ?>admin/uploads/files/<?= $item->image_file ?>" alt="<?= $item->title_text ?> - YNASU" class="img-responsiv">
					</div>
				</div>
			</div>
			<?php $i++; } ?>
	
		</div>
	</div>
</div>