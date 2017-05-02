<div id="top"></div>
<div id="page" class="animsition light" data-animsition-in="fade-in" data-animsition-out="fade-out-up-sm" data-loader-type="loader2" data-page-loader-text="HeraClea" style="transform-origin: 50% 50vh;">
    <!-- page-header -->
    <div class="page-header half-height table overlay" style="background-image: url('<?= base_url() ?>admin/uploads/files/<?= $post->imagen_background_file ?>')">
        <div class="table-cell">
            <div class="container">
                <div class="row font-second">
                    <div class="col-sm-8 page-header-title-left">
                        <h1 class="hs-text-12 init-animation-4"><?= $post->title_text ?></h1>
                    </div>
                    <!--/ End col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb  text-right">
                            <li class="init-animation-3 delay0-4s"><a class="animsition-link" href="index.html">Home</a>
                            </li>
                            <li class="init-animation-3 delay0-6s"><a class="animsition-link" href="blog.html">Blog</a>
                            </li>
                            <li class="active init-animation-3 delay0-8s"><?= $post->title_text ?></li>
                        </ol>
                    </div>
                    <!--/ End col -->
                </div>
                <!--/ End row -->
            </div>
            <!--/ End container -->
        </div>
    </div>
    <!--/ page-header -->
    <!-- Navbar -->
    <?= $header ?>
    <!--/ End Navbar -->
    <!-- Do not remove the div below if you want to a sticky navbar! -->
    <div id="about-section"></div>
    <!-- section -->
    <div class="section">
        <div class="container">
            <!-- Post -->
            <section class="blog-post">
                <!-- Post Media -->
                <div class="blog-page-media">
                    <img class="img-responsiv" src="<?= base_url() ?>admin/uploads/files/<?= $post->imagen_file ?>" alt="<?= $post->title_text ?>">
                </div>
                <!-- Post Title -->
                <h1 class="blog-page-post-title font-second"><?= $post->title_text ?></h1>
                <div class="blog-item-body">
                    <?= $post->description_textarea ?>
                </div>
            </section>
            <!--/ End Post -->
            <nav class="article-nav row">
                <?php if($post_preview){ ?>
                <a href="<?= base_url() ?>blog/post/<?= $post_preview->id ?>" class="article-nav-link col-sm-6">
                    <i class="ci-icon-uniE893"></i>
                    <p><?= $post_preview->title_text ?>
                        <br /><span class="post-date">
                            <?= (!empty($post_preview->updated_at) && $post_preview->updated_at != "0000-00-00 00:00:00")?
                                date("d/m/Y", strtotime($post_preview->updated_at))
                                :date("d/m/Y", strtotime($post_preview->created_at)) ?>
                        </span></p>
                </a>
                <?php } ?>
                <?php if($post_next){ ?>
                <a href="<?= base_url() ?>blog/post/<?= $post_next->id ?>" class="article-nav-link col-sm-6">
                    <p><?= $post_next->title_text ?>
                        <br /> <span class="post-date">
                            <?= (!empty($post_next->updated_at) && $post_next->updated_at != "0000-00-00 00:00:00")?
                                date("d/m/Y", strtotime($post_next->updated_at))
                                :date("d/m/Y", strtotime($post_next->created_at)) ?>
                        </span></p>
                    <i class="ci-icon-uniE890"></i>
                </a>
                <?php } ?>
            </nav>
        </div>
        <!--/ End container -->
    </div>
    <!--/ End section -->
    <?= $footer ?>
    <!--/ End Footer Section -->
</div>