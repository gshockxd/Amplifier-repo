<?php $title="Service History: AMPLIFIER"; ?>
<?php require '../inc/header.php'; ?>
	<div class="container">
		<p class="h1 yellow-brown py-3 text-center">BOOKINGS</p>
		
<table id="example" class="table table-hover" style="width:100%">
        <thead>
            <tr>
            	<th></th>
                <th>Name</th>
                <th>Schedule</th>
                <th>Status</th>
                <th>Event Type</th>
                <th class="text-center">Action</th>
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
	                	<u class="yellow-brown font-weight-bold">SCHOOL EVENT</u>
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

	        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
            	<th></th>
                <th>Name</th>
                <th>Schedule</th>
                <th>Status</th>
                <th>Event Type</th>
                <th class="text-center">Action</th>
                <th></th>
            </tr>
        </tfoot>
    </table>

	</div>
<?php require '../inc/footer.php'; ?>