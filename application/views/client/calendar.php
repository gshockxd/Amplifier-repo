<?php// $title = "Client Calendar: AMPLIFIER"; ?>
<?php// require '../inc/header-client.php';?>
	<div class="container py-3">
		<p class="h2 red-brown">CALENDAR</p>
		<div class="row pt-3">
			<div class="col-sm">
				<!-- <p class=""><span class="h4 text-warning">WARNING!</span> This is an image.</p> -->
				<img src="<?php echo base_url(); ?>assets/img/calendar.png" height="400" width="400" alt="">
			</div>
			<div class="col-sm">
				<div class="fom-group">
					<label for="">Event Date Pick/ed</label>
					<input type="date" class="form-control">
				</div>	
				<div class="fom-group pt-3">
					<label for="">Choose Appointment Date</label>
					<input type="date" class="form-control">
				</div>
				<div class="fom-group pt-3 ">
					<label for="">Time of the Event</label>
					<input type="text" class="form-control">
				</div>
				<div class="fom-group pt-3 text-center ">
					<a href="" class="btn btn-outline-dark">Book Event</a>
				</div>
			</div>
		</div>
	</div>
<?php// require '../inc/footer.php'; ?>