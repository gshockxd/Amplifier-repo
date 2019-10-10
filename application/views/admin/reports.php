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

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mr-4 mb-4">
                  <h1 class="h3 mb-0 text-gray-800">
                    <form class="form-inline ml-4 mb-1 "> 
                        <input class="form-control mr-sm-2" placeholder="Search"> 
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" ><label class="fa fa-search"></label></button>   
                    </form>
                  </h1>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"  data-toggle="modal" data-target="#addrep">
                    <i class="fas fa-envelope fa-sm text-white-50"></i> Create Report</a>
                </div>
        <!-- end -->
    <div class="container"> 
        <div class="row">   
                         <?php 
                            if($fetch_data_report->num_rows()>0)
                            {
                               foreach($fetch_data_report->result() as $row)
                                { 
                        ?>
                            <div class="col-sm md-10 m-3 pl-2">
                                    <div class="card w-75"> 
                                        <img class="card-img-top" src="<?php echo base_url(); ?><?php echo $row->report_photo; ?>" alt="Card image cap" style="width:800px; height:500px" >
                                            <div class="card-body card-block" style="margin:5px"> 
                                            <div class="dropdown">
                                            <img src="<?php echo base_url(); ?><?php echo $row->report_from_photo; ?>" alt="none" class="d-inline" style="width:50px;height:50px; border-radius:30px">
                                                <h4 class="card-title d-inline"> Report from: <?php echo $row->report_from_fname; ?>&nbsp<?php echo $row->report_from_lname; ?></h4>
                                            
                                               
                                                    <button class="btn fa fa-list-ul dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <div class="dropdown-header">Action:</div>
                                                        <a class="dropdown-item fas fa-eye fa-fw" href="profile/<?php echo $row->report_from; ?>">&nbsp View Profile</a>
                                                    <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item fas fa-exclamation-triangle fa-fw" href="#" data-toggle="modal" data-target="#addoff">&nbsp Add Offence</a>
                                                    <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item fas fa-exclamation-circle fa-fw" href="#" data-toggle="modal" data-target="#blckuser">&nbsp Blo1ck</a>
                                                    </div>         
                                                </div> 
                                            <br>
                                            <hr>
                                            <div class="dropdown">
                                            <img src="<?php echo base_url(); ?><?php echo $row->report_to_photo; ?>" alt="none" class="d-inline" style="width:50px;height:50px; border-radius:30px">
                                            <h4 class="card-title d-inline"> Report to: <?php echo $row->report_to_fname; ?>&nbsp<?php echo $row->report_to_lname; ?></h4>  

                                           
                                                    <button class="btn fa fa-list-ul dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <div class="dropdown-header">Action:</div>
                                                        <a class="dropdown-item fas fa-eye fa-fw" href="profile/<?php echo $row->report_to; ?>">&nbsp View Profile</a>
                                                    <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item fas fa-exclamation-triangle fa-fw" href="#" data-toggle="modal" data-target="#addoff">&nbsp Add Offence</a>
                                                    <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item fas fa-exclamation-circle fa-fw" href="#" data-toggle="modal" data-target="#blckuser">&nbsp Block</a>
                                                    </div>
                                                    
                                        </div> 
                                                <hr>
                                                <h6 class="card-subtitle mb-2 text-muted">Report ID: <?php echo $row->report_id; ?></h6> 
                                                <a href="eventview/<?php echo $row->booking_id; ?>"> Event ID: <?php echo $row->booking_id; ?></a>
                                                <br>
                                                <br>
                                                <p class="card-text"> <b>REPORT DETAILS:</b></p> 
                                                    <p class="card-text"> <?php echo $row->report_details; ?></p>  <br><br>
                                                    <a href="#" class="btn fa fas-trash btn-danger" data-toggle="modal" data-target="#delreport"><span class="fa fa-trash"></span></a>
                                                    </button></a>
                                                   
                                            </div> 
                                    </div>
                                </div> 
                             
                       
                        <?php
                         }
                        }
                        else
                        {
                        ?>
                          <h1 align="center">No Data Found</h1>
                        <?php
                        }
                    ?>         
    
        

    



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


<!-- add modal -->
<div class="modal fade" id="addrep" tabindex="-1" role="dialog" aria-labelledby="addrep" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="viewd"><b>REPORT DETAILS<b></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?php echo base_url()?>welcome/form_validation_report">
                                    <div class="form-group row">
                                        <label for="report_from" class="col-4 col-form-label">Reporter's Name:</label> 
                                            <select id="report_from" name="report_from" class="form-control m-3">
                                            <?php
                                            if($fetch_data_user->num_rows()>0)
                                            {
                                            foreach($fetch_data_user->result() as $row)
                                                { 
                                            ?>
                                            <option value="<?php echo $row->user_id; ?>"><?php echo $row->fname; ?>&nbsp<?php echo $row->lname; ?></option>
                                            <?php
                                            }
                                            }
                                            ?>
                                            </select>
                                            <?php echo form_error("report_from"); ?>
                                        </div>
                                    
                                        <div class="form-group row">
                                        <label for="violator" class="col-4 col-form-label">Violator:</label> 
                                            <select id="violator" name="violator" class="form-control m-3">
                                            <?php
                                            if($fetch_data_user->num_rows()>0)
                                            {
                                            foreach($fetch_data_user->result() as $row)
                                                { 
                                            ?>
                                            <option value="<?php echo $row->user_id; ?>"><?php echo $row->fname; ?>&nbsp<?php echo $row->lname; ?></option>
                                            <?php
                                            }
                                            }
                                            ?>
                                            </select>
                                            <?php echo form_error("report_to"); ?>
                                        </div>
                                    
                                        <div class="form-group row">
                                        <label for="booking_id" class="col-4 col-form-label">Event Name:</label> 
                                            <select id="booking_id" name="booking_id" class="form-control m-3">
                                            <?php
                                            if($fetch_data_event->num_rows()>0)
                                            {
                                            foreach($fetch_data_event->result() as $row)
                                                { 
                                            ?>
                                            <option value="<?php echo $row->booking_id; ?>"><?php echo $row->event_name; ?></option>
                                            <?php
                                            }
                                            }
                                            ?>
                                            </select>
                                            <?php echo form_error("booking_id"); ?>
                                        </div>
                                    <div class="form-group">
                                        <label for="comment">Additional Info:</label>
                                        <input type="text" name="report_info" class="form-control lg" id="comment"\>
                                    </div>
                                    <label for="comment">Attach evidence(Optional):</label>
                                    <div class="custom-file">
                                        <input type="file" name="evidence" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile"></label>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="custom-file">
                                    <input type="submit" name="addreport" class="btn btn-success">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                                    </div>
                                    </form>
                        </div>
                                  <div class="modal-footer">
                               
                            </div>  
                        </div>                    
                    </div>
                </div>
            </div>
<!-- end -->
<!-- delete modal -->
<div class="modal fade" id="delreport" tabindex="-1" role="dialog" aria-labelledby="delreport" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="deleteuser"><b>DELETE REPORT<b></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <H5>Are you Sure you want to delete this Report?</H5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">YES</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                        </div>
                    </div>
                </div>
    </div>
<!-- end -->
  <!-- Add Penalty Modal -->
  <div class="modal fade" id="addoff" aria-labelledby="addoff" aria-hidden="true" style="width:1000px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <H5>SELECT OFFENCE</H5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-check"> 
                                    <label class="form-check-label"> 
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked=""> &nbsp  &nbsp Increase Offence </label> 
                                </div> 
                                <div class="form-check"> <label class="form-check-label"> 
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2"> &nbsp  &nbsp 1st Offence: Ban account for 72 hours </label> 
                                </div>
                                <div class="form-check"> <label class="form-check-label"> 
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3"> &nbsp  &nbsp 2nd Offence: Ban account for 30 days </label> 
                                </div>
                                <div class="form-check"> <label class="form-check-label"> 
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option4"> &nbsp  &nbsp 3rd Offence: Delete Account</label> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">SUBMIT</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  <!-- end -->
 <!-- block user modal -->
 <div class="modal fade" id="blckuser" tabindex="-1" role="dialog" aria-labelledby="blckuser" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      BLOCK USER
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                <div class="modal-body">
                    <H5>Are you sure you want to Block username1234?</H5>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger">YES</button>
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
<!-- end -->
</html>
