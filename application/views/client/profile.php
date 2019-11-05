<?php print_r($package) ?>
<div class="container">

	<?php $this->session->flashdata('success_message') ? $this->message_model->success_message() : '';  ?>
	<?php $this->session->flashdata('danger_message') ? $this->message_model->danger_message() : '';  ?>
	
	<div class="row py-3">

		<div class="col-sm-8">
			<img src="<?php echo base_url(); ?>assets/img/client.png" height="100%" width="100%" alt="">	
		</div>
		<div class="col-sm-4">
			<p class="h1 red-brown">On going Best lowest price and latest date</p>
			<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown p</p>
			<p class="text-muted py-3">Source Link</p>
		</div>
	</div>

	<div class="row py-3">
		<div class="col-sm">
			<p class="h2 d-flex justify-content-center">Latest</p>
			<div class="row">
				<div class="col-sm">
					<img src="<?php echo base_url(); ?>assets/img/client.png" height="150" width="100%" alt="">
				</div>
				<div class="col-sm">
					<p class="text-muted">Lowest price</p>
					<p class="red-brown font-weight-bold">g established fact that a reader will be distracted by the readable content of a page </p>
					<div class="d-flex justify-content-center">
						<a href="" class="btn btn-outline-dark">View</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm">
			<p class="h2 d-flex justify-content-center">PHOTOGRAPHER AVAILABLE</p>
			<div class="row">
				<div class="col-sm">
					<img src="<?php echo base_url(); ?>assets/img/client.png" height="150" width="100%" alt="">
				</div>
				<div class="col-sm">
					<p class="text-muted">OPISINA PRODUCTIONS</p>
					<p class="red-brown font-weight-bold">g established fact that a reader will be distracted by the readable content of a page </p>
					<div class="d-flex justify-content-center">
						<a href="" class="btn btn-outline-dark">View</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
