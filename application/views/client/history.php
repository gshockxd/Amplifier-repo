<?php $title="Client History: AMPLIFIER"; ?>
<?php require '../inc/header-client.php'; ?>
	<div class="container">
		<p class="h1 red-brown py-3 text-center">EVENT HISTORY</p>
		
<table id="example" class="table table-hover" style="width:100%">
        <thead>
            <tr>
            	<th></th>
                <th>Name</th>
                <th>Schedule</th>
                <th>Status</th>
                <th>Event Type</th>
                <th>Service</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php for($x=0; $x<100; $x++){ ?>
			
	            <tr>
	            	<td class="text-center">
	            		<img src="../../assets/img/artist.png" class="rounded-circle" height="50" width="50" alt="">
	            	</td>
	                <td class="">
	                	<p>Nike Marti Caballes 
	                		<span><br>
	                			<small>Lorem Ipsum</small>
	                		</span> 
	                	</p>	                	
	                </td>
	                <td>
	                	<p>03/28/2019
							<span><br>
								<small>Panubigan, Canlaon City</small>
							</span>
	                	</p>
	                </td>
	                <td><p class="text-danger">Decline</p></td>
	                <td>
	                	<u class="red-brown font-weight-bold">SCHOOL EVENT</u>
	                </td>
	                <td>
	                	<u class="red-brown font-weight-bold">PHOTOGRAPHER</u>
	                </td>
	                <td>
	                	<a href="#" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Redirect to https.. this should be dynamic!"><i class="fas fa-external-link-alt"></i></a>
	                </td>
	            </tr>

	        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
            	<th></th>
                <th>Name</th>
                <th>Schedule</th>
                <th>Status</th>
                <th>Event Type</th>
                <th>Service</th>
                <th></th>
            </tr>
        </tfoot>
    </table>

	</div>
<?php require '../inc/footer.php'; ?>