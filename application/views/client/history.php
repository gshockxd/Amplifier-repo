<div class="container">
	<?php if($history): ?>
		<p class="h1 red-brown py-3 text-center">Event History</p>
			
		<table id="datatable" class="table table-hover" style="width:100%">
			<thead>
				<tr>
					<th>Schedule</th>
					<th>Event Venue</th>
					<th>Status</th>
					<th>Event Type</th>
					<th>Service</th>
					<th>Action</th>
					<th></th>
				</tr>
			</thead>
			<?php 
				// echo '<pre>';
				// print_r($history[0]['username']);
				// echo '</pre>';
				// die();
			?>
			<tbody>
				<?php foreach($history as $b): ?>

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
					<td>
						<p class="text-uppercase"><?php echo $b['artist_type'] ?></p>
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
					<th>Venue</th>
					<th>Status</th>
					<th>Event Type</th>
					<th>Service</th>
					<th>Action</th>
					<th></th>
				</tr>
			</tfoot>
		</table>
	<?php else: ?>
		<div class="mt-3 text-center">
			<p class="h4 mb-3 red-brown">Nothing Found</p>
			<img src="<?php echo base_url(); ?>assets/img/website/in_thought.svg" class="" width="50%" height="50%" alt="">
		</div>
	<?php endif; ?>
</div>