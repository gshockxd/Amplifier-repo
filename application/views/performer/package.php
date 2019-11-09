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
						<?php if($p['booked'] == 0): ?>							
							<div class="col-md-4 ">
								<a href="<?php if($p['booked'] == 0): echo base_url();?>p_package_edit_page/<?php echo $p['package_id'] ?><?php else: ?>#<?php endif; ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="top" title="<?php echo $p['booked'] == 0 ? 'Edit Package' : 'This package is currently in booked' ?>"><i class="fas fa-pen"></i></a>
								<a href="<?php if($p['booked'] == 0): echo base_url();?>p_package_delete/<?php echo $p['package_id'] ?><?php else: ?>#<?php endif; ?>" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="top" title="<?php echo $p['booked'] == 0 ? 'Delete Package' : 'This package is currently in booked' ?>"><i class="fas fa-trash"></i></a>
							</div>
						<?php else: ?>
							<div class="col-md-4">
								<a  class="btn btn-warning text-whitee" data-toggle="tooltip" data-placement="top" title="This package is currently in booked"><i class="fas fa-exclamation-triangle fa-lg"></i></a>
							</div>
						<?php endif; ?>
					</div>
				</li>
			</ul>
		</div>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="text-center mt-3">
		<p class="h4 mb-3 yellow-brown">No Package Found</p>
		<img src="<?php echo base_url(); ?>assets/img/website/empty.svg" height="50%" width="50%" alt="">
	</div>

<?php endif; ?>

</div>