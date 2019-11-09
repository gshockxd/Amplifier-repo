<!DOCTYPE html>
<html lang="en">


<?php include('head.php'); ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <?php include('topbar.php'); ?>
                <?php include('navbar.php'); ?>

                <!-- <script>
            var countBox =1;
            var boxName = 0;
            function addInput()
            {
                var boxName="textBox"+countBox; 
            document.getElementById('responce').innerHTML+='<br/><input type="text" id="'+boxName+'" value="'+boxName+'" "  /><br/>';
                countBox += 1;
            }
            </script> -->

                <!-- Begin Page Content -->

                <?php echo form_open('booking_attempt_admin/'.$this->uri->segment(2)) ?>
<div class="container my-3">
    <p class="h3 text-center">Book an Event</p>
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
                        <input type="date" name="event_date" class="form-control <?php echo form_error('event_date') ? 'is-invalid' : '' ?>" value="<?php echo isset($event_date) ? $event_date : '' ?>" >
                        <div class="invalid-feedback">
                            <?php echo form_error('event_date') ?>
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
                        <input type="time" name="duration" class="form-control <?php echo form_error('duration') ? 'is-invalid' : '' ?>" value="<?php echo isset($duration) ? $duration : '' ?>" >
                        <div class="invalid-feedback">
                            <?php echo form_error('duration') ?>
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
                <input type="text" class="form-control <?php echo form_error('location') ? 'is-invalid' : '' ?>" name="location" value="<?php echo isset($localtion) ? $location : '' ?>">
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
                <div class="card-header bg-primary text-capitalize text-white"><?php echo $package['package_name'] ?></div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $package['details'] ?></li>
                    <li  class="list-group-item">                        
                        <div class="row">
                            <div class="col-md-6">
                                <p>Price Offer:  </p>
                            </div>
                            <div class="col-md-6">
                               ₱ <?php echo $package['price'] ?>
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
                    <a href="<?php echo base_url('services') ?>" class="btn btn-danger btn-block">Cancel</a>
                </div>
                <div class="col-md-3 offset-md-3">
                    <button class="btn btn-primary btn-block" type="submit">Book</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php form_close() ?>


        <!-- end -->




    </div>
    <!-- /.container-fluid -->

    </div>
    </div>
    <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include('footer-script.php'); ?>


</body>

</html>