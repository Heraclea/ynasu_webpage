<header class="scroll">
	<div id="toggle-responsive">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<nav class="left">
		<ul>
			<li><a href="<?= base_url() ?>about">About</a></li>
            <li><a href="<?= base_url() ?>howItWorks">How it works</a></li>
            <li><a href="<?= base_url() ?>meet">Meet</a></li>
		</ul>
	</nav>
	<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/ynasu-logo-header.png" alt="" class="logo"></a>
	<nav class="right">
		<ul>
			<li><a href="<?= base_url() ?>blog">Blog</a></li>
            <li><a href="<?= base_url() ?>contact">Contact</a></li>
			<li>
				<div class="content-search">	
					<form action="<?= base_url() ?>search" method="get" class="search-form">
						<input type="search" placeholder="Search for products" name="keyword" value="<?= (isset($_GET['keyword'])?$_GET['keyword']:'') ?>"> <img src="<?= base_url() ?>assets/img/icons/search.png" class="search search-form-input">
					</form>
				</div>
			</li>
		</ul>
	</nav>
</header>

<div id="nav-responsive">
	<nav class="left">
		<ul>
			<li>
				<div class="content-search">	
					<form action="<?= base_url() ?>search" method="get" class="search-form">
						<input type="search" placeholder="Search for products" name="keyword" value="<?= (isset($_GET['keyword'])?$_GET['keyword']:'') ?>"> <img src="<?= base_url() ?>assets/img/icons/search.png" class="search search-form-input">
					</form>
				</div>
			</li>
			<li><a href="<?= base_url() ?>about">About</a></li>
            <li><a href="<?= base_url() ?>howItWorks">How it works</a></li>
            <li><a href="<?= base_url() ?>meet">Meet</a></li>
            <li><a href="<?= base_url() ?>blog">Blog</a></li>
            <li><a href="<?= base_url() ?>contact">Contact</a></li>
		</ul>
	</nav>
</div>