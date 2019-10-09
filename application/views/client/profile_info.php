<div class="container py-3">
    <div class="row">
        <div class="col-md-3">
            <img src="<?php echo base_url(); echo $this->session->userdata('photo'); ?>" class="img-thumbnail" alt="">
        </div>
        <div class="col-md-9">
            <p class="h3"><?php echo $this->session->userdata('fname'); ?> <?php echo $this->session->userdata('lname'); ?></p>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="header">User information</h5>
                        <div class="px-2"><a href="profile_edit" data-toggle="tooltip" data-placement="top" title="Edit user <?php echo $this->session->userdata('username') ?>" class="btn btn-primary"><i class="fas fa-user-edit fa-lg"></i></a></div>
                    </div>                        
                        
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Username</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('username'); ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Name</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('fname'); ?>  <?php echo $this->session->userdata('lname'); ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Email Address</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('email'); ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Phone Number 1</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('telephone_1'); ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Phone Number 2</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('telephone_2'); ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Address</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('address'); ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Offense</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('offense'); ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Report Count</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('report_count'); ?></div>
                            </div>
                        </li>
                    </ul>
                    <div class="card-footer">
                        <small class="text-muted">Account Registered: <?php echo date('F d, Y', strtotime('date_registered')); ?> Time: <?php echo date('h:i:s A', strtotime($this->session->userdata('date_registered'))) ?></small><br>
                        <small class="text-muted">Account Updated: <?php echo date('F d, Y', strtotime('date_updated')); ?> Time: <?php echo date('h:i:s A', strtotime($this->session->userdata('date_updated'))) ?></small>
                    </div>  
            </div>
        </div>
    </div>
</div>