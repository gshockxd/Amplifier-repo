<div class="container my-3" <?php if($packages): ?> style="background-image: url('<?php echo base_url() ?>assets/img/website/card_postal.svg');" <?php endif; ?>>

<?php echo $this->session->flashdata('success_message') ? $this->Message_model->success_message() : '' ?>
<?php echo $this->session->flashdata('danger_message') ? $this->Message_model->danger_message() : '' ?>
<?php // echo '<pre>'; print_r($packages); echo '</pre>'; ?>

<?php if($packages): ?>
	<p class="h3 red-brown text-center">Performer Packages</p>
	<div class="card-columns">
		<?php foreach($packages as $p): ?>
			<?php if($p['booked'] == 0): ?>				
				<div class="card border-primary-3">
					<div class="card-header bg-primary">
						<p class="h5 text-center text-white"><?php echo $p['package_name'] ?></p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><?php echo $p['details'] ?></li>
						<li class="list-group-item"><p class="text-capitalize">Service Type: <?php echo $p['artist_type'] ?></p></li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-10">
									<p>₱ <?php echo number_format ($p['price'], 2) ?></p>
								</div>
								<div class="col-md-2">
									<a href="booking_book_event/<?php echo $p['package_id'] ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Book <?php echo $p['package_name']?>"><i class="fas fa-book"></i></a>
								</div>
							</div>	
						</li>				
					</ul>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php else: ?>
<div class="mt-3 text-center">
	<p class="h4 mb-3 red-brown">No Package Found</p>
	<img src="<?php echo base_url(); ?>assets/img/website/a_moment_to_relax.svg" height="50%" width="50%" alt="">
</div>
<?php endif; ?>

</div>