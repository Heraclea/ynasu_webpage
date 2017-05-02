<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>YNASU</title>

<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
<link rel="icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/slick.css"/>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/slick-theme.css"/>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.fancybox.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">

<input type="hidden" id="base_url" value="<?= base_url(); ?>">

<meta name="description" content="<?= $seo->website_description ?>">
<meta name="keywords" content="<?= $seo->website_keywords ?>">

<?php if(!empty($seo->google_analytics_code)){ ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', '<?= $seo->google_analytics_code ?>', 'auto');
    ga('send', 'pageview');

  </script>
<?php } ?>