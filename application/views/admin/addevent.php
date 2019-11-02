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

                <div class="container">
                    <div class="card  w-100 mb-5 mx-auto">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="">Event Details</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="<?php echo base_url()?>welcome/form_validation_event">
                                        <div class="form-group row">
                                            <label for="client" class="col-4 col-form-label">Client Name:</label>
                                            <div class="col-8">

                                                <select id="client" name="client" class="custom-select">
                                                    <?php
                                      if($fetch_data_client->num_rows()>0)
                                      {
                                      foreach($fetch_data_client->result() as $row)
                                        { 
                                    ?>
                                                    <option value="<?php echo $row->user_id; ?>">
                                                        <?php echo $row->fname; ?>&nbsp<?php echo $row->lname; ?>
                                                    </option>
                                                    <?php
                                      }
                                    }
                                    ?>
                                                </select>
                                                <?php echo form_error("client"); ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="performer" class="col-4 col-form-label">Performer</label>
                                            <div class="col-8">
                                                <select id="performer" name="performer" class="custom-select">
                                                    <?php
                                  if($fetch_data_perf->num_rows()>0)
                                   {
                                   foreach($fetch_data_perf->result() as $perf)
                                    { 
                                    ?>
                                                    <option value="<?php echo $perf->user_id; ?>">
                                                        <?php echo $perf->fname; ?>&nbsp<?php echo $perf->lname; ?>
                                                    </option>
                                                    <?php
                                      }
                                    }
                                    ?>
                                                </select>
                                                <?php echo form_error("performer"); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dp" class="col-4 col-form-label">Down Payment</label>
                                            <div class="col-8">
                                                <input id="number" name="dp" placeholder="Enter Down Payment"
                                                    class="form-control here" required="required" type="number">
                                                <?php echo form_error("dp"); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="payment" class="col-4 col-form-label">Full Payment</label>
                                            <div class="col-8">
                                                <input id="number" name="payment" placeholder="Enter Full Payment"
                                                    class="form-control here" required="required" type="number">
                                                <?php echo form_error("payment"); ?>
                                                <!-- <span id="responce"></span>
                                 <button type="button" class="btn btn-outline-danger mt-1" onclick="addInput()"><span class="fas fa-plus"></span></button> -->
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="venue" class="col-4 col-form-label">Event Title</label>
                                            <div class="col-8">
                                                <input id="text" name="event_name" placeholder="Enter Event Title"
                                                    class="form-control here" required="required" type="text">
                                                <?php echo form_error("event_name"); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="venue" class="col-4 col-form-label">Venue</label>
                                            <div class="col-8">
                                                <input id="text" name="venue" placeholder="Enter venue"
                                                    class="form-control here" required="required" type="text">
                                                <?php echo form_error("address"); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date" class="col-4 col-form-label">Date</label>
                                            <div class="col-8">
                                                <input id="date" name="date_event" placeholder="Enter Date"
                                                    class="form-control here" required="required" type="date">
                                                <?php echo form_error("date event"); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="time" class="col-4 col-form-label">Duration</label>
                                            <div class="col-8">
                                                <input id="time" name="time_event"
                                                    placeholder="Event Duration(hours:minutes)"
                                                    class="form-control here" type="number">
                                                <?php echo form_error("duration"); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="publicinfo" class="col-4 col-form-label">Additional info to
                                                performers</label>
                                            <div class="col-8">
                                                <textarea id="publicinfo" name="publicinfo" cols="40" rows="4"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="approve" class="custom-control-input"
                                                id="approve">
                                            <label class="custom-control-label" for="approve">Approve booking</label>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <input name="submit" name="addevent" type="submit" class="btn btn-info">
                                                <button class="btn-danger"><a href="events"
                                                        class="btn-danger">Cancel</a></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


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