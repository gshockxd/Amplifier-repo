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
        <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800">Users</h1>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#adduser">
                    <i class="fas fa-user-plus fa-sm text-white-50"></i> Add Users</a>
                </div>

        <!-- Page Heading -->
            <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-fw fa-sort"></i>
                    <span>Filter</span>
                    </a>
                    <div class="card" style="width:50%; margin:10px;"> <div class="card-block" >
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                                      
                        <div class="container-fluid">
                          
                            <div class="col-sm-12 col-md-2 d-inline p-2">
                                  <div class="dropdown mb-4 d-inline p-2">
                                      <button class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Usertype
                                      </button>
                                      <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">admin</a>
                                        <a class="dropdown-item" href="#">client</a>
                                        <a class="dropdown-item" href="#">performer</a>
                                      </div>
                                  </div>
                             
                              
                                    <div class="dropdown mb-4 d-inline p-2">
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Status
                                      </button>
                                      <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">pending</a>
                                        <a class="dropdown-item" href="#">verified</a>
                                        <a class="dropdown-item" href="#">blocked</a>
                                      </div>
                                    </div>
                                    
                                        <a href="#" class="btn btn-outline-success btn-icon-split">
                                          <span class="icon">
                                            <i class="fas fa-arrow-right"></i>
                                          </span>
                                          <span class="text">Sort</span>
                                        </a>
                                        </div>
                              </div>           
                              </div>
                              </div>
                          </div>
                        </div>

      <?php 
        if($fetch_data_user->num_rows()>0)
        {
          foreach($fetch_data_user->result() as $row)
          {
        ?>
            <!--User Dropdown Card-->
            <div class="card shadow mb-4">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="margin-top:-10px">
                        <h6 class="m-0 font-weight-bold text-primary">ID: <?php echo $row->user_id; ?></h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Action:</div>
                              <a class="dropdown-item fas fa-eye fa-fw" href="profile/<?php echo $row->user_id; ?>">&nbsp View</a>
                            <div class="dropdown-divider"></div>
                              <a class="dropdown-item fas fa-exclamation-triangle fa-fw" href="#" data-toggle="modal" data-target="#addoff<?php echo $row->user_id; ?>">&nbsp Add Offence</a>
                            <div class="dropdown-divider"></div>
                              <a class="dropdown-item fas fa-exclamation-circle fa-fw" href="#" data-toggle="modal" data-target="#blckuser<?php echo $row->user_id; ?>">&nbsp Block</a>
                            <div class="dropdown-divider"></div>
                              <a class="dropdown-item fas fa-trash-alt fa-fw" href="#" data-toggle="modal" data-target="#deluser<?php echo $row->user_id; ?>">&nbsp Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- Card Body -->
                        <div class="card-body">
                          <div class="container-fluid">
                            <div class="table responsive">
                            <Table class="table table-reflow">
                              <tr role="row" class="odd">
                                  <td><img src="<?php echo base_url(); ?><?php echo $row->photo; ?>" style="height:150px; width:180px; border-radius:100px"></a></td>
                                
                                    <td class="table-bordered">
                                      Name: <br>
                                      Username: <br>
                                      Usertype: <br>
                                      Report Count:<br> 
                                      Number of offenses:<br>
                                      Status:<br>
                                  </td>

                                    <td class="table-bordered">
                                      <?php echo $row->fname; ?>&nbsp<?php echo $row->lname; ?><br>
                                      <?php echo $row->username; ?> <br>
                                      <?php echo $row->user_type; ?>  <br>
                                      <?php echo $row->report_count; ?> <br>
                                      <?php echo $row->offense; ?> <br>
                                      <?php echo $row->status; ?> <br>
                                  </td>
                              </tr>
                            </table>
                            </div>
                          </div>
                        </div>
            </div>
                        <!-- del user modal -->
                        <div class="modal fade" id="deluser<?php echo $row->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deluser" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                              DELETE USER 
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                        <div class="modal-body">
                                            <H5>Are you sure you want to delete  <?php echo $row->user_id; ?>&nbsp<?php echo $row->lname; ?>?</H5>
                                        </div>
                                        <div class="modal-footer">
                                         <a href="delete_user/<?php echo $row->user_id; ?>" type="button" > <button class="btn btn-danger">YES</button></a>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- end -->
                         <!-- Add Penalty Modal -->
                          <div class="modal fade" id="addoff<?php echo $row->user_id; ?>" aria-labelledby="addoff" aria-hidden="true" style="width:1000px">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form method="post" action="add_offense/<?php echo $row->user_id; ?>">

                                    <div class="modal-header">
                                        <H5>SELECT OFFENCE </H5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-check"> <label class="form-check-label"> 
                                            <input class="form-check-input" type="radio" name="offenseNo" id="offenseNo" value="1"> &nbsp  &nbsp 1st Offence: Ban account for 3 days </label> 
                                        </div>
                                        <div class="form-check"> <label class="form-check-label"> 
                                            <input class="form-check-input" type="radio" name="offenseNo" id="offenseNo" value="2"> &nbsp  &nbsp 2nd Offence: Ban account for 30 days </label> 
                                        </div>
                                        <div class="form-check"> <label class="form-check-label"> 
                                            <input class="form-check-input" type="radio" name="offenseNo" id="offenseNo" value="3"> &nbsp  &nbsp 3rd Offence: Permanent block of account</label> 
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <a href="add_offense/<?php echo $row->user_id; ?>" type="button" > <button class="btn btn-danger">YES</button></a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end -->
                        
                        <!-- block user modal -->
                        <div class="modal fade" id="blckuser<?php echo $row->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="blckuser" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  BLOCK USER
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <H5>Are you sure you want to Permanently block <?php echo $row->fname; ?>&nbsp<?php echo $row->lname; ?>?</H5>
                              </div>
                              <div class="modal-footer">
                                  <a href="ban/<?php echo $row->user_id; ?>" type="button" > <button class="btn btn-danger">YES</button></a>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end -->
          <?php
            }
            ?>
                    <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 5 of 57 entries</div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                          <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                            <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                          </ul>
                      </div>
                  </div>
                </div>
                </div>
              </div>

              </div>

          
          <?php
          }
          else
          {
          ?>
            <h1 align="center">No Data Found</h1>
          <?php
          }
          ?>
      <!-- end -->
      
      
      
      
        
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
  </div>
        <!-- Add User Modal -->
        <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="ADDUSER" aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header bg-basic">
                <h5 class="modal-title" id="adduser">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="post" action="<?php echo base_url()?>welcome/form_validation">
              
                                    <div class="form-group">
                                        <label for="First Name">First Name:</label>
                                        <input type="text" name="fname" class="form-control" id="fname">
                                        <span class="text-danger"><?php echo form_error("fname"); ?></span>
                                    </div>
                                    <div>
                                        <label for="Last Name">Last Name:</label>
                                        <input type="text"  name="lname" class="form-control" id="lname">
                                        <span class="text-danger"><?php echo form_error("lname"); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password:</label>
                                        <input type="password" name="password" class="form-control" id="Password">
                                        <span class="text-danger"><?php echo form_error("password"); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" name="username" class="form-control" id="username">
                                        <span class="text-danger"><?php echo form_error("username"); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Contact_number1">Contact Numer (1):</label>
                                        <input type="number" name="contact_number" class="form-control" id="contact_number">
                                        <span class="text-danger"><?php echo form_error("contact_number"); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Contact_number1">Optional Contact Numer (2):</label>
                                        <input type="number" name="contact_number1" class="form-control" id="contact_number1">
                                        <span class="text-danger"><?php echo form_error("contact_number1"); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Contact_number1">Address:</label>
                                        <input type="text" name="address" class="form-control" id="address">
                                        <span class="text-danger"><?php echo form_error("address"); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                        <span class="text-danger"><?php echo form_error("email"); ?></span>
                                    </div>
                                    <div class="form-group">
                                    <label for="Contact_number1">Profile Picture:</label><br>
                                        <input type="file" name="pphoto" size="20" />
                                        <span class="text-danger"><?php echo form_error("photo"); ?></span>
                                    </div>
                                    <div class="form-group">
                                            <label for="Usertype">Usertype:</label><br>
                                            <select class="form-control" name="usertype" id="usertype" style="max-width:200px;">
                                            <option value=""> </option>
                                            <option value="admin">Admin</option> 
                                            <option value="client">Client</option>
                                            <option value="performer">Performer</option> 
                                        </select>   
                                        <span class="text-danger"><?php echo form_error("usertype"); ?></span>
                                    </div>
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" name="verify" class="custom-control-input" id="verify">
                                      <label class="custom-control-label" for="verify">Verify</label>
                                    </div>
                        
                                <div class="modal-footer">
                                <input type="submit" name="adduser" class="btn btn-success"/>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                                </form>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
          <!-- end -->
         

 

</html>



