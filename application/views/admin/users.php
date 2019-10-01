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
       <!--User Dropdown Card-->
       <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="margin-top:-10px">
                  <h6 class="m-0 font-weight-bold text-primary">ID: 1</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item fas fa-eye fa-fw" href="profile">&nbsp View</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item fas fa-exclamation-triangle fa-fw" href="#" data-toggle="modal" data-target="#addoff">&nbsp Add Offence</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item fas fa-exclamation-circle fa-fw" href="#" data-toggle="modal" data-target="#blckuser">&nbsp Block</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item fas fa-trash-alt fa-fw" href="#" data-toggle="modal" data-target="#deluser">&nbsp Delete</a>
                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="container-fluid">
                  <div class="table responsive">
                    <Table class="table table-reflow">
                <tr role="row" class="odd">
                <td><img src="<?php echo base_url(); ?>assets/img/1.jpg" alt="image" style="height:150px; width:180px; border-radius:100px"></a></td>
              
                  <td class="table-bordered">
                  Name: <br>
                  Username: <br>
                  Usertype: <br>
                  Report Count:<br> 
                  Number of offenses:<br>
                  Status:<br></td>
                  <td class="table-bordered">
                  <i>
                  USername123 <br>
                  12344 <br>
                  admin  <br>
                  12 <br>
                  10 <br>
                  verified <br>
                </i>
                  </td>
                </tr>
                </table>
                
                  </div>
                </div>
                </div>
              </div>
      <!-- end -->
       <!--User Dropdown Card-->
       <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="margin-top:-10px">
                  <h6 class="m-0 font-weight-bold text-primary">ID: 1</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item fas fa-eye fa-fw" href="profile">&nbsp View</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item fas fa-trash-alt fa-fw" href="#">&nbsp Delete</a>
                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="container-fluid">
                  <div class="table responsive">
                    <Table class="table table-reflow">
                <tr role="row" class="odd">
                <td><img src="<?php echo base_url(); ?>assets/img/1.jpg" alt="image" style="height:150px; width:180px; border-radius:100px"></a></td>
              
                  <td class="table-bordered">
                  Name: <br>
                  Username: <br>
                  Usertype: <br>
                  Report Count:<br> 
                  Number of offenses:<br>
                  Status:<br></td>
                  <td class="table-bordered">
                  <i>
                  USername123 <br>
                  12344 <br>
                  admin  <br>
                  12 <br>
                  10 <br>
                  verified <br>
                </i>
                  </td>
                </tr>
                </table>
                
                  </div>
                </div>
                </div>
              </div>
      <!-- end -->
       <!--User Dropdown Card-->
       <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="margin-top:-10px">
                  <h6 class="m-0 font-weight-bold text-primary">ID: 1</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item fas fa-eye fa-fw" href="profile">&nbsp View</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item fas fa-trash-alt fa-fw" href="#">&nbsp Delete</a>
                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="container-fluid">
                  <div class="table responsive">
                    <Table class="table table-reflow">
                <tr role="row" class="odd">
                <td><img src="<?php echo base_url(); ?>assets/img/1.jpg" alt="image" style="height:150px; width:180px; border-radius:100px"></a></td>
              
                  <td class="table-bordered">
                  Name: <br>
                  Username: <br>
                  Usertype: <br>
                  Report Count:<br> 
                  Number of offenses:<br>
                  Status:<br></td>
                  <td class="table-bordered">
                  <i>
                  USername123 <br>
                  12344 <br>
                  admin  <br>
                  12 <br>
                  10 <br>
                  verified <br>
                </i>
                  </td>
                </tr>
                </table>
                
                  </div>
                </div>
                </div>
              </div>
      <!-- end -->
       <!--User Dropdown Card-->
       <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="margin-top:-10px">
                  <h6 class="m-0 font-weight-bold text-primary">ID: 1</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item fas fa-eye fa-fw" href="profile">&nbsp View</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item fas fa-trash-alt fa-fw" href="#">&nbsp Delete</a>
                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="container-fluid">
                  <div class="table responsive">
                    <Table class="table table-reflow">
                <tr role="row" class="odd">
                <td><img src="<?php echo base_url(); ?>assets/img/1.jpg" alt="image" style="height:150px; width:180px; border-radius:100px"></a></td>
              
                  <td class="table-bordered">
                  Name: <br>
                  Username: <br>
                  Usertype: <br>
                  Report Count:<br> 
                  Number of offenses:<br>
                  Status:<br></td>
                  <td class="table-bordered">
                  <i>
                  USername123 <br>
                  12344 <br>
                  admin  <br>
                  12 <br>
                  10 <br>
                  verified <br>
                </i>
                  </td>
                </tr>
                </table>
                
                  </div>
                </div>
                </div>
              </div>
      <!-- end -->
       <!--User Dropdown Card-->
       <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="margin-top:-10px">
                  <h6 class="m-0 font-weight-bold text-primary">ID: 1</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item fas fa-eye fa-fw" href="profile">&nbsp View</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item fas fa-trash-alt fa-fw" href="#">&nbsp Delete</a>
                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="container-fluid">
                  <div class="table responsive">
                    <Table class="table table-reflow">
                <tr role="row" class="odd">
                <td><img src="<?php echo base_url(); ?>assets/img/1.jpg" alt="image" style="height:150px; width:180px; border-radius:100px"></a></td>
              
                  <td class="table-bordered">
                  Name: <br>
                  Username: <br>
                  Usertype: <br>
                  Report Count:<br> 
                  Number of offenses:<br>
                  Status:<br></td>
                  <td class="table-bordered">
                  <i>
                  USername123 <br>
                  12344 <br>
                  admin  <br>
                  12 <br>
                  10 <br>
                  verified <br>
                </i>
                  </td>
                </tr>
                </table>
                
                  </div>
                </div>
                </div>
              </div>
      <!-- end -->
      
      
      
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
      <form action="#">
      
                            <div class="form-group">
                                <label for="First Name">First Name:</label>
                                <input type="text" class="form-control" id="fname">
                           
                                <label for="Last Name">Last Name:</label>
                                <input type="text" class="form-control" id="lname">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="Password">
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                    <label for="Usertype">Usertype:</label><br>
                                <select class="form-control" id="password" style="max-width:200px;">
                                    <option value=""> </option>
                                    <option value="1">Admin</option> 
                                    <option value="2">Client</option>
                                    <option value="3">Performer</option> 
                                </select>   
                            </div>
        
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="verify">
                              <label class="custom-control-label" for="verify">Verify</label>
                            </div>
                 
                        <div class="modal-footer">
                        <button type="button" class="btn btn-success">SAVE</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        </FORM>
                        </div>
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
  <!-- del user modal -->
   <div class="modal fade" id="deluser" tabindex="-1" role="dialog" aria-labelledby="deluser" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      DELETE USER
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                <div class="modal-body">
                    <H5>Are you sure you want to Delete user?</H5>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger">YES</button>
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
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
