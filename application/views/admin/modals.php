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
  <!-- end -->

  <!-- del notification modal -->
  <div class="modal fade" id="delreport" tabindex="-1" role="dialog" aria-labelledby="delreport" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
              
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                <div class="modal-body">
                    <H5>Are you sure you want to clear this notification?</H5>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger">YES</button>
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
<!-- end -->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutmodal">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- end -->