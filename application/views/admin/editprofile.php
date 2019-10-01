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

        <!-- Begin Page Content -->
       
     <div class="container">
		    <div class="card  w-100 mb-5 mx-auto">
                <img src="<?php echo base_url(); ?>assets/img/1.jpg" class="mx-auto m-3 img-thumbnail rounded-circle" 
                    style="height:170px;width:200px" data-toggle="modal" data-target="#viewfull"/>
                    
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Edit Profile</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form>
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name:</label> 
                                <div class="col-8">
                                  <input id="username" name="username" placeholder="Username" class="form-control here" required="required" type="text" value="User">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input id="name" name="name" placeholder="First Name" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Artist Type:</label> 
                                <div class="col-8">
                                <input id="genre" name="genre" placeholder="Username" class="form-control here" required="required" type="text" value="User info">
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Username:</label> 
                                <div class="col-8">
                                <input id="username" name="username" placeholder="Username" class="form-control here" required="required" type="text" value="User info">
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Minimum Rate:</label> 
                                <div class="col-8">
                                <input id="Rate" name="Rate" placeholder="Rate" class="form-control here" required="required" type="number" value="User info">
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Address:</label> 
                                <div class="col-8">
                                <input id="address" name="address" placeholder="Username" class="form-control here" required="required" type="text" value="User info">
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Contact Numbers:</label> 
                                <div class="col-8">
                                <input id="number1" name="number1" placeholder="Username" class="form-control here mb-2" required="required" type="number" value="User info">
                                <input id="number2" name="number2" placeholder="Username" class="form-control here" type="number" value="User info">
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Number of offenses:</label> 
                                <div class="col-8">
                                <input id="countoff" name="countoff" placeholder="Username" class="form-control here" required="required" type="number" value="User info">
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email:</label> 
                                <div class="col-8">
                                <input id="emai" name="email" placeholder="Enter email" class="form-control here" required="required" type="email" value="User info">
                                </div>
                              </div>
                              <hr>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Status:</label> 
                                <div class="col-8">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    User Status </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Verified</a>
                                        <a class="dropdown-item" href="#">Block</a>
                                    </div>
                                    </div>
                                </div>
                              </div>
                              
                              <hr>
                             
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Sample Outputs:</label> 
                                <div class="col-8">
                                    <div class="custom-file mb-2">
                                        <input type="file" class="custom-file-input " id="customFile1">
                                        <label class="custom-file-label w-50" for="customFile1">Choose 1st file</label>
                                    </div>
                                    <div class="custom-file mb-2">
                                        <input type="file" class="custom-file-input " id="customFile2">
                                        <label class="custom-file-label w-50" for="customFile2">Choose 2nd file</label>
                                    </div>
                                    <div class="custom-file mb-2">
                                        <input type="file" class="custom-file-input " id="customFile3">
                                        <label class="custom-file-label w-50" for="customFile3">Choose 3rd file</label>
                                    </div>
                                </div>
                            </div>
                              <hr>
                            
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Update Profile</button>
                                  <a href="profile"><button type="button" class="btn btn-danger">Close</button></a>
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

          <?php include('logout_modal.php'); ?>
          <?php include('footer-script.php'); ?>

        
  </body>
<!-- modal image -->
<div class="modal fade" id="viewfull" tabindex="-1" role="dialog" aria-labelledby="fullview" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-basic">
        <h5 class="modal-title" id="fullview">FULL VIEW</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="<?php echo base_url(); ?>assets/img/1.jpg" class="m-3 rounded" style="height:500px; width:735px" >
      
      <h5 align="center">Change Profile Picture</h5>
        <div class="custom-file">
            <input type="file" class="custom-file-input " id="customFile">
            <label class="custom-file-label w-50 mx-auto " for="customFile">Choose file</label>
        </div>
      </div>
      </h5>
     <div class="modal-footer">
        <button name="submit" type="submit" class="btn btn-primary">Update Photo</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->
</html>
