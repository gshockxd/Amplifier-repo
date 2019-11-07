<div class="container">
	<?php echo $this->session->flashdata('success_message') ? $this->message_model->success_message() : '' ?>
	<?php echo $this->session->flashdata('danger_message') ? $this->message_model->danger_message() : '' ?>
	<?php if($bookings): ?>	
		<p class="h1 yellow-brown py-3 text-center">Booked Package</p>	
		<table id="datatable" class="table table-hover" style="width:100%">
			<thead>
				<tr>
					<th>Schedule</th>
					<th>Event Venue</th>
					<th>Status</th>
					<th>Event Type</th>
					<th class="text-center">Action</th>
					<th></th>
				</tr>
			</thead>
			<tbody>			
				<?php foreach($bookings as $b): ?>				
					<tr>
						<td class="">
							<?php echo date('F d, Y', strtotime($b['event_date'])) ?>             	
						</td>
						<td>
							<p class="text-uppercase yellow-brown"><?php echo $b['venue_name'] ?></p>
						</td>
						<td>
						<p class="text-uppercase <?php echo $b['status'] == 'approve' ? ' text-success' : ''; echo $b['status'] == 'cancel' ? ' text-danger' : ''; echo $b['status'] == 'block' ? ' text-warning' : ''; echo $b['status'] == 'pending' ? ' text-muted' : ''; ?>"><?php echo $b['status'] ?></p>
						</td>
						<td>
							<p class="text-uppercase yellow-brown"><?php echo $b['event_name'] ?></p>
						</td>
						<td class="d-flex justify-content-center ">
							<a href="#" class="btn btn-outline-success mr-2 " data-toggle="tooltip" data-placement="top" title="Accept"><i class="fas fa-check "></i></a>
							<a href="#" class="btn btn-outline-danger mr-2 " data-toggle="tooltip" data-placement="top" title="Decline"><i class="fas fa-times "></i></a>
							<a href="#" class="btn btn-outline-primary " data-toggle="tooltip" data-placement="top" title="Edit user.. this should be dynamic!"><i class="far fa-edit "></i></a>
						</td>
						<td>
							<a href="#" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Redirect to https.. this should be dynamic!"><i class="fas fa-external-link-alt "></i></a>
						</td>
					</tr>
				<?php endforeach; ?>				
			</tbody>
			<tfoot>
				<tr>
					<th>Schedule</th>
					<th>Event Venue</th>
					<th>Status</th>
					<th>Event Type</th>
					<th class="text-center">Action</th>
					<th></th>
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