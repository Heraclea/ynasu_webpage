<footer>
	<div class="container">
		<div class="row network">
			<?php if(!empty($data_footer->facebook_link_text)){ ?>
                <a href="<?= $data_footer->facebook_link_text ?> " target="_blank"><img src="<?= base_url() ?>assets/img/icons/face.png" alt="facebook"></a>
            <?php } ?>

            <?php if(!empty($data_footer->twitter_link_text)){ ?>
                <a href="<?= $data_footer->twitter_link_text ?>" target="_blank"><img src="<?= base_url() ?>assets/img/icons/twitter.png" alt="twitter"></a>
            <?php } ?>

            <?php if(!empty($data_footer->instagram_link_text)){ ?>
                <a href="<?= $data_footer->instagram_link_text ?>" target="_blank"><img src="<?= base_url() ?>assets/img/icons/instagram.png" alt="instagram"></a>
            <?php } ?>

            <?php if(!empty($data_footer->linkedin_link_text)){ ?>
                <a href="<?= $data_footer->linkedin_link_text ?>" target="_blank"><img src="<?= base_url() ?>assets/img/icons/linkedin.png" alt="linkedin"></a>
            <?php } ?>
		</div>

		<div class="row copy">
            <p><span><?= $data_footer->address_text ?></span><span><?= $data_footer->fax_or_pbx_text ?></span><span><?= $data_footer->city_text ?></span></p>
            <p>Copyright &copy; <strong>Ynasu.</strong> All rights reserved.</p>
        </div>
	</div>
</footer>
