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
		                    <form>
                              <div class="form-group row">
                                <label for="client" class="col-4 col-form-label">Client Name:</label> 
                                <div class="col-8">
                                    <select id="client" name="client" class="custom-select">
                                        <option value="client name">client name</option>
                                    </select>
                                </div>
                              </div>
                             

                                <hr>
                              <div class="form-group row">
                                <label for="performer" class="col-4 col-form-label">Performer</label> 
                                <div class="col-8">
                                  <select id="performer" name="performer" class="custom-select">
                                    <option value="performer name">performer name</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="dp" class="col-4 col-form-label">Down Payment</label> 
                                <div class="col-8">
                                  <input id="number" name="dp" placeholder="Enter Down Payment" class="form-control here" required="required" type="nummber">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="payment" class="col-4 col-form-label">Full Payment</label> 
                                <div class="col-8">
                                  <input id="number" name="payment" placeholder="Enter Full Payment" class="form-control here" required="required" type="nummber">
                                  <!-- <span id="responce"></span>
                                 <button type="button" class="btn btn-outline-danger mt-1" onclick="addInput()"><span class="fas fa-plus"></span></button> -->
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <label for="venue" class="col-4 col-form-label">Venue</label> 
                                <div class="col-8">
                                <input id="text" name="text" placeholder="Enter venue" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="date" class="col-4 col-form-label">Date</label> 
                                <div class="col-8">
                                <input id="date" name="date" placeholder="Enter Date" class="form-control here" required="required" type="date">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="time" class="col-4 col-form-label">Duration</label> 
                                <div class="col-8">
                                  <input id="time" name="time" placeholder="Event Duration(hours:minutes)" class="form-control here" type="time">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">Additional info to performers</label> 
                                <div class="col-8">
                                  <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                </div>
                              </div>
                            </form>
                            <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-info">Create Event</button>
                                  <button href="event" class="btn btn-danger">Cancel</button>
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
