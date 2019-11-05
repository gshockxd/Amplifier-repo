<div class="container" <?php if($packages): ?> style="background-image: url('<?php echo base_url(); ?>assets/img/website/card_postal.svg');" <?php endif; ?> >

<?php echo $this->session->flashdata('success_message') ? $this->message_model->success_message() : '' ?>
<?php echo $this->session->flashdata('danger_message') ? $this->message_model->danger_message() : '' ?>


<?php if($packages): ?>
	<p class="h3 pt-2 yellow-brown text-center">Your Packages</p>
	<div class="card-columns">
		<?php foreach($packages as $p): ?>
		<div class="card">
			<div class="card-header bg-primary">
				<p class="h5 text-center text-white"><?php echo $p['package_name'] ?></p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><?php echo $p['details'] ?></li>
				<li class="list-group-item">₱ <?php echo $p['price'] ?></li>
				<li class="list-group-item">
					<div class="row">
						<div class="col-md-8 ">
							<small>Created: <?php echo date('h:i:s a M d, y', strtotime($p['created_at'])) ?></small>
							<small>Updated: <?php echo date('h:i:s a M d, y', strtotime($p['updated_at'])) ?></small>
						</div>
						<div class="col-md-4 ">
							<a href="p_package_edit_page/<?php echo $p['package_id'] ?>" class="btn btn-primary text-white"><i class="fas fa-pen"></i></a>
							<a href="p_package_delete/<?php echo $p['package_id'] ?>" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<!-- <div class="alert alert-secondary my-3">
		<p class="h3 text-center">No Package/s Found</p>
	</div> -->
	<div class="text-center mt-5">
		<img src="<?php echo base_url(); ?>assets/img/website/empty.svg" height="50%" width="50%" alt="">
		<p class="h4 mt-3 yellow-brown">No Package Found</p>
	</div>

<?php endif; ?>

</div>