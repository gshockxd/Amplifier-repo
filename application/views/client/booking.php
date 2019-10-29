<div class="container">

<?php echo $this->session->flashdata('success_message') ? $this->message_model->success_message() : '' ?>
<?php echo $this->session->flashdata('danger_message') ? $this->message_model->danger_message() : '' ?>


<?php if($packages): ?>
	<p class="h3 py-3 red-brown text-center">Pick an Event</p>
	<div class="card-columns">
		<?php foreach($packages as $p): ?>
		<div class="card">
			<div class="card-header bg-primary">
				<p class="h5 text-center text-white"><?php echo $p['package_name'] ?></p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><?php echo $p['details'] ?></li>
				<li class="list-group-item">
					<div class="row">
						<div class="col-md-10">
							₱ <?php echo $p['price'] ?>
						</div>
						<div class="col-md-2">
							<a href="booking_book_event/<?php echo $p['package_id'] ?>" class="btn btn-primary text-white"><i class="fas fa-book"></i></a>
						</div>
					</div>	
				</li>				
			</ul>
		</div>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="alert alert-secondary my-3">
		<p class="h3 text-center">No Package/s Found</p>
	</div>
<?php endif; ?>

</div>