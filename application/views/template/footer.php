<footer>
    <div class="container">
        <div class="row form">
            <div class="col-sm-12">
                <h3 class="text-center">Contact</h3>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                <div class="row info">
                    <div class="col-sm-4"><img src="<?= base_url() ?>assets/img/icons/tel.png"> <?= $data_footer->telephone_1_text ?></div>
                    <div class="col-sm-4"><img src="<?= base_url() ?>assets/img/icons/tel.png"> <?= $data_footer->telephone_2_text ?> </div>
                    <div class="col-sm-4"><img src="<?= base_url() ?>assets/img/icons/mail.png"> <?= $data_footer->email_text ?></div>
                </div>
            </div>
            <div class="col-sm-12">
                <form action="" id="contact-form">
                    <div class="content-input">
                        <input type="text" id="name" name="Name" placeholder="Name" class="input-send validate[required]">
                        <label for="name" class="label-input">Name</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" id="work-email" name="Email" placeholder="Email" class="input-send validate[required,custom[email]]">
                            <label for="work-email" class="label-input">Email</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" id="company" name="Company" placeholder="Company" class="input-send validate[required]">
                            <label for="company" class="label-input">Company</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" id="phone" name="Telephone" placeholder="Telephone (optional)" class="input-send">
                            <label for="phone" class="label-input">Telephone (optional)</label>
                        </div>
                        <div class="col-sm-6">
                            <select id="select-type" class="validate[required]">
                                <option value="0" disabled selected>Tell us if you are a</option>
                                <option value="Buyer">Buyer</option>
                                <option value="Seller">Seller</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="content-input">
                        <textarea id="message" name="Message" placeholder="Message" class="input-send validate[required]"></textarea>
                        <label for="message" class="label-input textarea">Message</label>
                    </div>
                    
                    <button>Send it</button>
                </form>
            </div>
        </div>

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