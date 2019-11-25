<div class="container">
	<?php echo $this->session->flashdata('success_message') ? $this->message_model->success_message() : '' ?>
	<?php echo $this->session->flashdata('danger_message') ? $this->message_model->danger_message() : '' ?>
	<?php if($bookings): ?>	
		<p class="h3 yellow-brown py-3 text-center">Booked Package</p>	
		<table id="datatable" class="table table-hover" style="width:100%">
			<thead>
				<tr>
					<th>Schedule</th>
					<th>Event Venue</th>
					<th>Event Name</th>
					<th>Status</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>			
				<?php foreach($bookings as $b):?>				
					<tr>
						<td class="">
							<?php echo date('F d, Y', strtotime($b['event_date'])) ?>             	
						</td>
						<td>
							<p class="text-capitalize"><?php echo $b['venue_name'] ?></p>
						</td>
						<td>
							<p class="text-capitalize"><?php echo $b['event_name'] ?></p>
						</td>
						<td>
							<p class="text-capitalize <?php echo $b['status'] == 'approve' ? ' text-success' : ''; echo $b['status'] == 'cancel' ? ' text-danger' : ''; echo $b['status'] == 'block' ? ' text-warning' : ''; echo $b['status'] == 'pending' ? ' text-muted' : ''; ?>"><?php echo $b['status'] ?></p>
						</td>
						<td class="d-flex justify-content-center ">
							<?php if ($b['status'] == 'pending'): ?>
								<a data-toggle="modal" data-target="#alertApprove" class="btn btn-success mr-2 text-white " data-toggle="tooltip" data-placement="top" title="Accept"><i class="fas fa-check "></i></a>
								<a data-toggle="modal" data-target="#alertDecline" class="btn btn-danger mr-2 text-white " data-toggle="tooltip" data-placement="top" title="Decline"><i class="fas fa-times "></i></a>
							<?php endif; ?>
							<a href="<?php echo base_url(); ?>p_event_info/<?php echo $b['booking_id'] ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="More details"><i class="fas fa-external-link-alt "></i></a>
						</td>
					</tr>

						<!-- Accept Mdodal -->
						<div class="modal fade" id="alertApprove" tabindex="-1" role="dialog" aria-labelledby="approveAlert" aria-hidden="true">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="approveAlert">Accept Events?</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body text-center">
										<div class="bg-warning rounded">
											<p class="text-white">Note: Think carefully, the status is permanent.</p>  
										</div>
										<div class="row">
											<div class="col-md-6">											
												<a href="<?php echo base_url(); ?>p_approve_event/<?php echo $b['booking_id'] ?>" class="btn btn-success">Yes, Accept it.</a>
											</div>
											<div class="col-md-6">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Not Now</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Decline Modal -->
						<div class="modal fade" id="alertDecline" tabindex="-1" role="dialog" aria-labelledby="declineAlert" aria-hidden="true">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="declineAlert">Decline Events?</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body text-center">
										<div class="bg-warning rounded">
											<p class="text-white">Note: Think carefully, the status is permanent.</p>  
										</div>
										<div class="row">
											<div class="col-md-6">                
												<a href="<?php echo base_url(); ?>p_decline_event/<?php echo $b['booking_id'] ?>" class="btn btn-danger">Hmm, Yes</a>
											</div>
											<div class="col-md-6">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Not Now</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Modal -->

				<?php endforeach; ?>				
			</tbody>
			<tfoot>
				<tr>
					<th>Schedule</th>
					<th>Event Venue</th>
					<th>Event Name</th>
					<th>Status</th>
					<th class="text-center">Action</th>
				</tr>
			</tfoot>
		</table>
	<?php else: ?>
		<div class="text-center mt-3">
			<p class="h4 mb-3 yellow-brown">No Booked Package</p>
			<img src="<?php echo base_url(); ?>assets/img/website/not_found.svg" height="50%" width="50%" alt="">
		</div>
	<?php endif;?>
	</div>