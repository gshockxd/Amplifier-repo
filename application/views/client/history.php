<div class="container">
	<p class="h1 red-brown py-3 text-center">EVENT HISTORY</p>
		
	<table id="example" class="table table-hover" style="width:100%">
        <thead>
            <tr>
				<th>Schedule</th>
				<th>Venue</th>
                <th>Status</th>
                <th>Event Type</th>
                <th>Service</th>
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
			<?php if($history): ?>
				<?php foreach($history as $h): ?>
				
					<tr>
						<?php
						?>
						<td>
							<p><?php echo date('F d, Y', strtotime($h['event_date'])) ?></p>
						</td>
						<td>
							<p class="text-capitalize"><?php echo $h['venue_name'];  ?></p>
						</td>
						<td>
							<!-- <p class="<?php// echo $h['status'] == 'approve' ? 'text-danger' : $h['status'] == 'cancel' ? 'text-danger' : $h['status'] == 'block' ? 'font-weight-bold text-warning' : 'text-muted' ?>"><?php echo $h['status'] ?></p> -->
							<p class="<?php echo $h['status'] == 'approve' ? 'text-uppercase text-success' : ''; echo $h['status'] == 'cancel' ? 'text-uppercase text-danger' : ''; echo $h['status'] == 'block' ? 'text-uppercase text-warning' : ''; echo $h['status'] == 'pending' ? 'text-uppercase text-muted' : ''; ?>"><?php echo $h['status'] ?></p>
						</td>
						<td>
							<u class="red-brown text-uppercase"><?php echo $h['event_name'] ?></u>
						</td>
						<td>
							<u class="red-brown text-uppercase"><?php echo $h['artist_type'] ?> </u>
						</td>
						<!-- <td>
							<a href="#" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Redirect to https.. this should be dynamic!"><i class="fas fa-external-link-alt"></i></a>
						</td> -->
					</tr>

				<?php endforeach; ?>
			<?php else: ?>			
				<tr>
					<td colspan="100%" class="text-center"><h4 class="text-muted">No Event Found</h4></td>
				</tr>
			<?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Schedule</th>
				<th>Venue</th>
                <th>Status</th>
                <th>Event Type</th>
                <th>Service</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>