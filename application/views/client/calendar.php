	<!-- <div class="container mt-3">
		<div class="text-center">
			<p class="h4">Calendar Module is not available at this time</p>
			<img src="<?php echo base_url() ?>assets/img/website/events.svg" class="mt-3" width="50%" alt="">
		</div>
	</div> -->

<div class="container my-5 text-center">
	<?php 
		if(base_url(uri_string()) == base_url().'clients/calendar'){
			$year = date('Y');
			$month = date('m');
			echo $this->calendar->generate($year, $month, $booked_event, $this->uri->segment(3), $this->uri->segment(4)); 	
		}else{
			$year = $this->uri->segment(3);
			$month = $this->uri->segment(4);
			echo $this->calendar->generate($year, $month, $booked_event, $this->uri->segment(3), $this->uri->segment(4)); 	
		}
		$this->session->set_userdata('previous_calendar_link', base_url(uri_string()));
	?>
</div>