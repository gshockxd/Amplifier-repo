<!-- <?php// echo '<pre>'; print_r($history); echo '</pre>'; ?> -->
<?php echo $this->session->flashdata('success_message') ? $this->message_model->success_message() : '' ?>
<?php echo $this->session->flashdata('danger_message') ? $this->message_model->danger_message() : '' ?>
<div class="container my-3">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header"><p class="h4 text-center"><?php echo $history['event_name'] ?></p></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> 
                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-weight-bold">Event Is On</p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo date('F d, Y', strtotime($history['event_date'])); ?>
                                </div>
                                <div class="col-md-6">
                                    <p><span class="font-weight-bold">From: </span> <?php echo date('h:i a', strtotime($history['event_from'])); ?> <span class="font-weight-bold"> - </span> <?php echo date('h:i a', strtotime($history['event_to'])); ?></p>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-weight-bold">Location</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-capitalize"><?php echo $history['venue_name'] ?></p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Payment</p>
                                </div>
                                <div class="col-md-6">
                                    <p>₱ <?php echo number_format($history['down_payment'], 2) ?></p>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <p class="font-weight-bold">Remaining Balance</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-capitalize"><?php ?></p>
                                </div> -->
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Payment Status</p>
                                </div>
                                <div class="col-md-6">
                                    <p><?php $s = $history['payment_status']; echo $s == 'dp' ? 'Down Payment' : ''; echo $s == 'paid' ? 'Paid' : ''; echo $s == 'none' ? 'None' : '' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">                
                    <div class="row">     
                        <div class="col-md-6">                                       
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Performer Confirmation</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-capitalize"><?php echo $history['status'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Service Type</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-capitalize"><?php echo $history['artist_type'] ? $history['artist_type'] : 'None' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-weight-bold">Client Notes</p>
                        </div>
                        <div class="col-md-6">
                            <p class=""><?php echo $history['notes'] ?></p>
                        </div>
                    </div>
                </li>
            </ul> 
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <small class="font-weight-bold">Date Booked</small>
                    </div>
                    <div class="col-md-6">
                        <small><?php echo date('l, F d, Y', strtotime($history['date_booked'])) ?></small>
                    </div>
                </div>
            </div>
        </div>

        <div class=" d-flex justify-content-end mt-2">
            <a href="<?php echo base_url(); ?>rate_event/<?php echo $this->uri->segment(2) ?>"  class="btn btn-warning col-md-1 mr-2" data-toggle="tooltip" data-placement="top" title="Rate Event">Rate <i class="fas fa-exclamation"></i></a>        
            <a href="<?php echo base_url(); ?>performer_profile_info/<?php echo $this->uri->segment(2) ?>"  class="btn btn-primary col-md-1 mr-2" data-toggle="tooltip" data-placement="top" title="Performer Info"><i class="fas fa-user"></i></a>
            <a href="<?php echo base_url(); ?>print_event/<?php echo $this->uri->segment(2) ?>" target="_blank"  class="btn btn-info col-md-1 mr-2" data-toggle="tooltip" data-placement="top" title="Print"><i class="fas fa-print"></i></a>
            <a href="<?php echo base_url(); ?>c_events"  class="btn btn-secondary col-md-1" data-toggle="tooltip" data-placement="top" title="Return"><i class="fas fa-arrow-left"></i></a>
        </div>         
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="alertDelete" tabindex="-1" role="dialog" aria-labelledby="deleteAlert" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteAlert">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-around">
			<div class="row">
				<div class="col-md-6">
                
					<a href="<?php echo base_url(); ?>c_delete_event/<?php echo $this->uri->segment(2) ?>" class="btn btn-danger">Yes</a>
				</div>
				<div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
				</div>
			</div>
      </div>
    </div>
  </div>
</div>
