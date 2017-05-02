<div id="about">
	<div class="container">
		<div class="row text-center">
			<p class="tabs">
				<span data-target="history" class="active">History</span>
				<span data-target="mission">Mission</span>
				<span data-target="vision">Vision</span>
				<span data-target="team">Team</span>
			</p>
		</div>
		<div class="row content active" data-self="history">
			<div class="row">
				<div class="col-sm-12"><br>
					<h3 class="text-center">History</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 cita">
					<?= $history->copy_textarea ?>
				</div>
				<div class="col-sm-8">
					<?= $history->content_textarea ?>
				</div>
			</div>
		</div>

		<div class="row content" data-self="mission">
			<div class="row">
				<div class="col-sm-12"><br>
					<h3 class="text-center">Mission</h3>
				</div>
			</div>
			<?php foreach ($mission as $item) { ?>
			<div class="row">
				<div class="col-sm-4 cita">
					<img src="<?= base_url() ?>admin/uploads/files/<?= $item->icon_file  ?>" alt="<?= $item->title_text ?> - YNASU">
					<span><?= $item->title_text ?></span>
				</div>
				<div class="col-sm-8">
					<?= $item->content_textarea ?>
					<br>
					<?php if (!empty($item->image_file)) { ?>
						<img src="<?= base_url() ?>admin/uploads/files/<?= $item->image_file  ?>" alt="<?= $item->title_text ?> - YNASU">
					<?php } ?>
				</div>
			</div><br><br>
			<?php } ?>
		</div>

		<div class="row content" data-self="vision">
			<div class="row">
				<div class="col-sm-12"><br>
					<h3 class="text-center">Vision</h3>
				</div>
			</div>
			<?php foreach ($vision as $item) { ?>
			<div class="row">
				<div class="col-sm-4 cita">
					<img src="<?= base_url() ?>admin/uploads/files/<?= $item->icon_file  ?>" alt="<?= $item->title_text ?> - YNASU">
					<span><?= $item->title_text ?></span>
				</div>
				<div class="col-sm-8">
					<?= $item->content_textarea ?>
					<br>
					<?php if (!empty($item->image_file)) { ?>
						<img src="<?= base_url() ?>admin/uploads/files/<?= $item->image_file  ?>" alt="<?= $item->title_text ?> - YNASU">
					<?php } ?>
				</div>
			</div><br><br>
			<?php } ?>
		</div>

		<div class="row content" data-self="team">
			<div class="row">
				<div class="col-sm-12"><br>
					<h3 class="text-center">Team</h3>
				</div>
			</div>
			<div class="row">
				<?php $i=0; foreach ($team as $item) { 
					$class = '';
					if($i%2 == 0) $class = "col-md-offset-1";
					?> 
				<div class="col-sm-6 col-md-5 <?= $class ?>">
					<div class="content-member text-center">
						<img src="<?= base_url() ?>admin/uploads/files/<?= $item->picture_file  ?>" alt="" class="center">
						<p class="name"><?= $item->name_text ?></p>
						<p class="position"><?= $item->position_text ?></p>
						<p class="nacionality"><?= $item->nationality_text ?></p>

						<div class="description">
							<?= $item->description_textarea ?>
						</div>
					</div>
				</div>
				<?php $i++; } ?>
			</div>
		</div>
	</div>
	
</div>