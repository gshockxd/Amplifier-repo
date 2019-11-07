<?php echo form_open('booking_attempt/'.$this->uri->segment(2)) ?>
<div class="container my-3">
    <p class="h3 text-center">Book a Package</p>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Event Name</label>
                <input type="text" class="form-control <?php echo form_error('event_name') ? 'is-invalid' : '' ?>" name="event_name" value="<?php echo isset($event_name) ? $event_name : '' ?>">
                <div class="invalid-feedback">
                    <?php echo form_error('event_name') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="">Event Date</label>
                        <input type="date" name="event_date" class="form-control <?php echo form_error('event_date') || isset($date_error) ? 'is-invalid' : '' ?>" value="<?php echo isset($event_date) ? $event_date : '' ?>" >
                        <div class="invalid-feedback">
                            <?php echo form_error('event_date'); echo $date_error ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Package Name</label>
                        <input class="form-control text-capitalize" disabled value="<?php echo $package['package_name'] ?>" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="">From</label>
                        <input type="time" name="duration" class="form-control <?php echo form_error('duration') || isset($time_error) ? 'is-invalid' : '' ?>" value="<?php echo isset($duration) ? $duration : '' ?>" >
                        <div class="invalid-feedback">
                            <?php echo form_error('duration'); echo $time_error ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">To</label>
                        <input type="time" name="event_time" class="form-control <?php echo form_error('event_time') ? 'is-invalid' : '' ?>" value="<?php echo isset($event_time) ? $event_time : '' ?>" >
                        <div class="invalid-feedback">
                            <?php echo form_error('event_time') ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="">Expected Payment/Full Payment</label>
                        <input type="number" name="full_payment" class="form-control <?php echo form_error('full_payment') ? 'is-invalid' : '' ?>" value="<?php echo isset($full_payment) ? $full_payment : '' ?>" >
                        <div class="invalid-feedback">
                            <?php echo form_error('full_payment') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Partial Payment/Downpayment</label>
                        <input type="number" name="down_payment" class="form-control <?php echo form_error('down_payment') ? 'is-invalid' : '' ?>" value="<?php echo isset($down_payment) ? $down_payment : '' ?>" >
                        <div class="invalid-feedback">
                            <?php echo form_error('down_payment') ?>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="form-group">
                <label for="">Payment</label>
                <input type="number" name="down_payment" class="form-control <?php echo form_error('down_payment') ? 'is-invalid' : '' ?>" value="<?php echo isset($down_payment) ? $down_payment : '' ?>" >
                <div class="invalid-feedback">
                    <?php echo form_error('down_payment') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Venue Location</label>
                <input type="text" class="form-control <?php echo form_error('location') ? 'is-invalid' : '' ?>" name="location" value="<?php echo isset($location) ? $location : '' ?>">
                <div class="invalid-feedback">
                    <?php echo form_error('location') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Notes</label>
                <textarea name="notes" id="ckeditor" class="form-control <?php echo form_error('notes') ? 'is-invalid' : '' ?>"><?php echo isset($notes) ? $notes : '' ?></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('notes') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-capitalize text-white text-center"><?php echo $package['package_name'] ?></div>
                <ul class="list-group list-group-flush">     
                    <li  class="list-group-item">                        
                        <div class="row">
                            <div class="col-md-6">
                                <p>Package Owner: </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-capitalize"><?php echo $package['fname'] ?> <?php echo $package['lname'] ?></p>
                            </div>
                        </div>
                    </li>
                    <li  class="list-group-item">                        
                        <div class="row">
                            <div class="col-md-6">
                                <p>Address: </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-capitalize"><?php echo $package['address'] ?></p>
                            </div>
                        </div>
                    </li>
                    <li  class="list-group-item">                        
                        <div class="row">
                            <div class="col-md-6">
                                <p>Phone Number: </p>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-capitalize"><?php echo $package['telephone_1'] ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-capitalize"><?php echo $package['telephone_2'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li  class="list-group-item">                        
                        <div class="row">
                            <div class="col-md-6">
                                <p>Service Type: </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-capitalize"><?php echo $package['artist_type'] ?></p>
                            </div>
                        </div>
                    </li>
                    <li  class="list-group-item">                        
                        <div class="row">
                            <div class="col-md-6">
                                <p>Price:  </p>
                            </div>
                            <div class="col-md-6">
                                <p class="">₱ <?php echo number_format($package['price'], 2); ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Package Description: </p>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $package['details'] ?></p>
                            </div>
                        </div>
                    </li>
                    <li  class="list-group-item">                        
                        <div class="row">
                            <div class="col-md-6">
                                <p>Last Update:  </p>
                            </div>
                            <div class="col-md-6">
                                <?php echo date('F d, Y m:i a', strtotime($package['updated_at'])) ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="row my-3 d-flex justify-content-center">
                <div class="col-md-3">
                    <a href="<?php echo base_url() ?>booking" class="btn btn-danger btn-block">Cancel</a>
                </div>
                <div class="col-md-3 offset-md-3">
                    <button class="btn btn-primary btn-block" type="submit">Book</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php form_close() ?>