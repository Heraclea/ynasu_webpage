<div id="banner-home" data-vide-bg="mp4: <?= base_url() ?>admin/uploads/files/<?= $banner->video_mp4_file ?>, webm: <?= base_url() ?>admin/uploads/files/<?= $banner->video_webm_file ?>, ogv: <?= base_url() ?>admin/uploads/files/<?= $banner->video_ogv_file ?>, poster: <?= base_url() ?>admin/uploads/files/<?= $banner->background_image_file ?>" data-vide-options="position: 50% 50%" data-top="transform: translate3d(0px, 0px, 0px)" data-top-bottom="transform: translate3d(0px, -300px, 0px)" data-anchor-target="#banner-home">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <img src="<?= base_url() ?>admin/uploads/files/<?= $banner->image_file  ?>" alt="YNASU" class="logo center">
                <h2 class="text-center"><?= $banner->title_text  ?> <br><span><?= $banner->subtitle_text  ?></h2>
                <p class="text-center"><?= $banner->copy_text  ?></p>
                <img src="<?= base_url() ?>assets/img/icons/arrow-down.png" class="center arrow">
            </div>
        </div>
    </div>
</div>

<div id="what-we-do">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center"><?= $what_we_do->title_text ?></h3>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <?php foreach ($what_we_do_items as $item) { ?>
                    <div class="col-md-4">
                        <img src="<?= base_url() ?>admin/uploads/files/<?= $item->icon_file  ?>" alt="" class="center">
                        <h4 class="text-center"><?= $item->title_text ?></h4>
                        <p class="text-center"><?= $item->description_text ?></p>
                    </div>
                    <?php }  ?>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <img src="../assets/img/icons/divider.png" alt="" class="divider center">
                <?= $what_we_do->content_textarea ?>
            </div>
        </div>
    </div>
</div>

<div id="what-you-do">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 z-4 m-t-50">
                <div class="padding-50">
                    <h3><?= $what_you_do->title_text ?></h3>
                    <ul>
                        <?php 
                        $items = explode('|', $what_you_do->items_list);
                        for ($i=0; $i < count($items); $i++) { ?>
                        <li><span class="number"><?= $i+1 ?>.</span> <span class="text"><?= $items[$i]  ?><br><a href="<?= base_url() ?>howItWorks" class="bullet">>> read more</a></span></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <img src="<?= base_url() ?>admin/uploads/files/<?= $what_you_do->image_file  ?>" alt="" class="main">
            </div>
        </div>
        <div class="row">
            <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br><br>
            <div class="col-sm-12 text-center"><br><br><br>
                <?= $what_you_do->content_textarea ?>
            </div>
        </div>
    </div>
</div>

<div id="carousel">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="owl-carousel">
                    <?php foreach ($brands as $item) { ?>
                    <div>
                        <a href="<?= $item->link_text ?>" target="_blank">
                            <img class="center" src="<?= base_url() ?>admin/uploads/files/<?= $item->image_file  ?>" alt="YNASU">
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="testimonials" style="background-image: url('<?= base_url() ?>admin/uploads/files/<?= $testimonials->background_image_file  ?>')">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center"><?= $testimonials->title_text ?></h3>
            </div>
            <div class="col-sm-12">
                <div class="testimonials">
                    <?php $items = json_decode($testimonials->testimonials_steps) ?>
                    <?php foreach ($items as $item) { ?>
                    <div> 
                        <div class="center content-text text-center">
                            <?= $item->content ?>
                            <span><?= $item->title ?></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bk-grey">
    <div id="awards">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <?= $award->content_textarea ?>
                    <img src="<?= base_url() ?>admin/uploads/files/<?= $award->image_file  ?>" alt="" class="center">
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($blog) && !empty($blog)){ ?>
    <div id="last-blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?= base_url() ?>blog/show/<?= $blog->id ?>"><img src="<?= base_url() ?>admin/uploads/files/<?= $blog->background_image_file  ?>" alt="" class="img-responsiv"></a>
                </div>
                <div class="col-sm-6">
                    <a href="<?= base_url() ?>blog/show/<?= $blog->id ?>">

                        <span class="tag">Latest blog</span>
                        <p><?= $blog->title_text ?></p>
                        <span class="date">
                            
                            <?= (!empty($blog->updated_at) && $blog->updated_at != "0000-00-00 00:00:00")?
                                        date("d/m/Y", strtotime($blog->updated_at))
                                        :date("d/m/Y", strtotime($blog->created_at)) ?>

                        </span><br><br>

                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <br><br><br>
</div>