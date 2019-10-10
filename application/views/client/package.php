<?php// $title="Client Package: AMPLIFER"; ?>
<?php// require '../inc/header-client.php'; ?>
<div class="container">
	<p class="h1 red-brown text-center py-3">PRICE RATES/ PACKAGES</p>
	<div class="row">
		<div class="col-sm inbox-bg-incoming pt-5 text-center">
			<p class="h3 ">Professional</p>
			<div class=" pt-3">
				<img src="<?php echo base_url(); ?>assets/img/artist.png" height="100" width="150" alt="">
			</div>
			<p class=" pt-3"><strong class="h1">$49</strong><span class="text-muted">/month</span></p>
			<?php for($x=0; $x<5; $x++){ ?>
				<p class="text-muted"><span>[icon] </span>em ipsum dolor sit amet </p>
			<?php } ?>
		</div>

		<div class="col-sm py-1 text-center border-3">
			<p class="h3 ">Enterprise</p>
			<div class=" pt-3">
				<img src="<?php echo base_url(); ?>assets/img/artist.png" height="100" width="150" alt="">
			</div>
			<p class=" pt-3"><strong class="h1">$99</strong><span class="">/month</span></p>
			<?php for($x=0; $x<5; $x++){ ?>
				<p class="font-weight-bold"><span>[icon] </span>em ipsum dolor sit amet </p>
			<?php } ?>
		</div>

		<div class="col-sm inbox-bg-incoming pt-5 text-center">
			<p class="h3 ">Premium</p>
			<div class=" pt-3">
				<img src="<?php echo base_url(); ?>assets/img/artist.png" height="100" width="150" alt="">
			</div>
			<p class=" pt-3"><strong class="h1">$129</strong><span class="text-muted">/month</span></p>
			<?php for($x=0; $x<5; $x++){ ?>
				<p class="text-muted"><span>[icon] </span>em ipsum dolor sit amet </p>
			<?php } ?>
		</div>
	</div>

	<div class="py-3 text-center">
		<a href="#" class="btn btn-outline-dark"><span class="h3 col">Book</span></a>
	</div>

</div>
<?php// require '../inc/footer.php'; ?>