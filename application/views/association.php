<div id="association">
	<div class="container">
		<div class="row text-center">
			<p class="tabs">
				<span data-target="info" class="active">Info</span>
				<span data-target="description">Description</span>
				<span data-target="goals">Goals</span>
				<span data-target="product info">Product info</span>
			</p>
		</div>
		<br class="hidden-xs"><br class="hidden-xs">
		<div class="row content">
			<div class="col-sm-4 hidden-sm hidden-md hidden-lg" style="display: table"><br>
				<div class="relation">
					<h5 class="transparent">Info</h5>
					
					<?php $items = explode('|', $item->info_list) ?>
					<?php for ($i=0; $i < count($items); $i++) { ?>
					<?php $data = explode(' - ', $items[$i]) ?>
					<div class="row col">
						<div class="content-text">
							<div class="bg-color">
								<div class="col-sm-6">
									<p><?= (isset($data[0]))? str_replace("/", "<br>", $data[0]):'' ?></p>
								</div>
								<div class="col-sm-6 text-right">
									<span><?= (isset($data[1]))? str_replace("/", "<br>", $data[1]):'' ?></span>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>

					<h5 class="transparent">Products available <img src="<?= base_url() ?>assets/img/icons/info.png" class="pull-right go-products"></h5>
					<div class="content-text">
						<?php $items = explode('|', $item->products_available_list) ?>
						<?php for ($i=0; $i < count($items); $i++) { ?>
						<p><?= $items[$i] ?></p>
						<?php } ?>
					</div>
					<button class="margin view-form-sample">Order a sample</button>
					<br>
					<a href="<?= base_url() ?>contact"><button>Contact</button></a>
					<br><br>
				</div>
			</div>

			<div class="col-sm-8">
				<h3 class="no-margin-bottom self" data-self="info">Intro</h3>
				<?= $item->intro_textarea ?>
			
				<h3 class="no-margin-bottom self" data-self="description">Description</h3>

				<?= $item->description_textarea ?>

				<div id="map"></div>

				<h3 class="no-margin-bottom self">Goals</h3>
				
				<div class="self" data-self="goals">
					<?= $item->goals_textarea ?>
				</div>
				<br>

				<div class="row">
					
					<div class="relation-carousel">
					  	<?php $items = json_decode($item->gallery_steps) ?>
                    	<?php foreach ($items as $data) { ?>
					  	<div>
							<div class="relation">
								<?= $data->content ?>
								<div class="content-text">
									<span><?= $data->title ?></span>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>

				</div>

				<h3 class="no-margin-bottom self" data-self="product info">Products info</h3>
			
				<div class="row">
					<div class="col-sm-6">
						<div class="relation">
							<h5>Production</h5>
							<?php $items = explode('|', $item->production_list) ?>
							<?php for ($i=0; $i < count($items); $i++) { ?>
							<?php $data = explode(' - ', $items[$i]) ?>
							<div class="row col">
								<div class="content-text">
									<div class="bg-color">
										<div class="col-sm-6">
											<p><?= (isset($data[0]))? str_replace("/", "<br>", $data[0]):'' ?></p>
										</div>
										<div class="col-sm-6 text-right">
											<span><?= (isset($data[1]))? str_replace("/", "<br>", $data[1]):'' ?></span>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="relation">
							<h5>Process</h5>
							<?php $items = explode('|', $item->process_list) ?>
							<?php for ($i=0; $i < count($items); $i++) { ?>
							<?php $data = explode(' - ', $items[$i]) ?>
							<div class="row col">
								<div class="content-text">
									<div class="bg-color">
										<div class="col-sm-6">
											<p><?= (isset($data[0]))? str_replace("/", "<br>", $data[0]):'' ?></p>
										</div>
										<div class="col-sm-6 text-right">
											<span><?= (isset($data[1]))? str_replace("/", "<br>", $data[1]):'' ?></span>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<br>
				<h3 class="no-margin-bottom self" data-self="product info">Products available</h3>
				
				<div class="content-products-available">
					<?= $item->products_textarea ?>
				</div>
				<br>
				<form action="" id="comment-form" class="form">
					<h3 class="no-margin-bottom">Comments</h3><br><br>
					<input type="hidden" id="association-input" name="Association" value="<?= $item->name_text  ?>">
					
					<div class="content-input">
                        <input type="email" id="email" name="Email" placeholder="Email" class="input-send validate[required, custom[email]]">
                        <label for="email" class="label-input">Email</label>
                    </div>

                    <div class="content-input">
                        <textarea id="comment" name="Comment" placeholder="Comments" class="commets input-send validate[required]"></textarea>
                        <label for="comment" class="textarea label-input">Comments</label>
                    </div>

					<button class="pull-right commets">send it</button>
					
				</form>
				
			</div>

			<div class="col-sm-4 hidden-xs">
				<div class="relation">
					<h5 class="transparent">Info</h5>
					
					<?php $items = explode('|', $item->info_list) ?>
					<?php for ($i=0; $i < count($items); $i++) { ?>
					<?php $data = explode(' - ', $items[$i]) ?>
					<div class="row col">
						<div class="content-text">
							<div class="bg-color">
								<div class="col-sm-6">
									<p><?= (isset($data[0]))? str_replace("/", "<br>", $data[0]):'' ?></p>
								</div>
								<div class="col-sm-6 text-right">
									<span><?= (isset($data[1]))? str_replace("/", "<br>", $data[1]):'' ?></span>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>

					<h5 class="transparent">Products available <img src="<?= base_url() ?>assets/img/icons/info.png" class="pull-right go-products"></h5>
					<div class="content-text">
						<?php $items = explode('|', $item->products_available_list) ?>
						<?php for ($i=0; $i < count($items); $i++) { ?>
						<p><?= $items[$i] ?></p>
						<?php } ?>
					</div>
					<button class="margin view-form-sample">Order a sample</button>
					<br>
					<a href="<?= base_url() ?>contact"><button>Contact</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content-popup sample"></div>
<div class="popup sample">
	<h3 class="text-center">order a sample</h3>
	<p class="text-center">Thank you for you interest in ordering a sample.</p>
	<p class="text-center">Just fill out the form below and we will send you a confirmation email shortly!</p>
	<span class="text-center">Contact details</span>

	<div class="continer">
		<div class="row form">
			<div class="col-sm-12">
				<form action="" id="order-a-simple-form">
					<input type="text" placeholder="Name" name="Name" class="input-send validate[required]" data-prompt-position="topRight:-100">
					<div class="row">
						<div class="col-sm-6">
							<input type="text" placeholder="Company" name="Company" class="input-send validate[required]" data-prompt-position="topRight:-100">
						</div>
						<div class="col-sm-6">
							<input type="email" placeholder="Email" name="Email" class="input-send validate[required, custom[email]]" data-prompt-position="topRight:-100">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" placeholder="Telephone (Optional)" name="Telephone" class="input-send" data-prompt-position="topRight:-100">
						</div>
						
						<div class="col-sm-6">
							<input type="text" placeholder="Address" name="Address" class="input-send validate[required]" data-prompt-position="topRight:-100">
						</div>
					</div>
					
						

					<span class="text-center">Sample details</span>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" placeholder="Association" name="Association" value="<?= $item->name_text ?>" readonly class="input-send validate[required]" data-prompt-position="topRight:-100"> 
						</div>
						<div class="col-sm-6">
							<input type="text" placeholder="Product" name="Product" class="input-send validate[required]" data-prompt-position="topRight:-100"> 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<input type="text" placeholder="Sample size required" name="Sample size" class="input-send validate[required, max[3]]" data-prompt-position="topRight:-100">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<select name="" id="select-delivery-method" class="validate[required]" data-prompt-position="topRight:-100">
								<option value="0" disabled selected>Prefered delivery method</option>
								<option value="Courier (Fedex, DPS)">Courier (Fedex, DPS)</option>
								<option value="Registered mail">Registered mail</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<input type="text" placeholder="Additional notes" name="Aditional" class="input-send">
						</div>
					</div>
					<button>Send it</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php if ($required_login) { ?>
<div class="content-popup signup"></div>
<div class="popup signup">
	<h3 class="text-center">sign up here</h3><br>
	<div class="continer">
		<div class="row form">
			<div class="col-sm-12">
				<form action="" id="signup-form">
					<input type="text" placeholder="First Name" name="name_text" class="input-send validate[required]" data-prompt-position="topRight:-100">
					<input type="text" placeholder="Last Name" data-prompt-position="topRight:-100" name="lastname_text" class="input-send validate[required]">
					<input type="email" placeholder="Email" data-prompt-position="topRight:-100" name="email_text" class="input-send validate[required,custom[email]]">
					<select class="validate[required]" data-prompt-position="topRight:-100">
						<option value="0" disabled selected>Tell us if you are a</option>
						<option value="Buyer">Buyer</option>
						<option value="Seller">Seller</option>
						<option value="Other">Other</option>
					</select>
					<div class="checkbox" style="margin-top: -5px; margin-bottom: 20px">
					    <label>
					      <input type="checkbox" id="check-terms" name="check-terms" class="validate[required]" value="1"> <p class="check">I accept <a href="<?= base_url() ?>admin/uploads/files/<?= $data_footer->terms_and_conditions_pdf_file ?>" target="_blank" style="color:#8c7676;"><strong>terms and conditions</strong></a></p>
					    </label>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<p style="margin-top: 10px; display: inline-block;">Already registered?</p>
						</div>
						<div class="col-sm-6">
							<input type="text" placeholder="Tell us your email" class="input-send" name="email_registered" id="email_registered">
						</div>
					</div>
					
					<button>Check in</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>

 <script>

	function initMap() {
		<?php $coords = explode(',', $item->map_map ); ?>
	  var myLatLng = {lat: <?= $coords[0] ?>, lng: <?= $coords[1] ?>};

	  var map = new google.maps.Map(document.getElementById('map'), {
	    zoom: 12,
	    center: myLatLng
	  });

	  var marker = new google.maps.Marker({
	    position: myLatLng,
	    map: map,
	    title: 'Hello World!'
	  });
	}	

	$(window).load(function() {
		initMap();
	});

</script>