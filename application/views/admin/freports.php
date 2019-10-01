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
        <div class="modal fade" id="viewd" tabindex="-1" role="dialog" aria-labelledby="viewd" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="viewd"><b>DETAILS<b></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <form action="#">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="venue">EVENT ID:</label>
                                        <input type="text" class="form-control" id="venue" placeholder="1412441" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="venue">VENUE:</label>
                                        <input type="text" class="form-control" id="venue" placeholder="Cebu City" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="client">Client Name:  
                                            <button type="button" class="btn btn-danger"style="border-radius:50px"  data-toggle="modal" data-target="#addoff">
                                                <span class="glyphicon glyphicon-ban-circle" ></span>&nbsp BAN
                                            </button>
                                        </label>
                                        <input type="text" class="form-control" id="Cname" placeholder="Lovely son" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="Performer">Performer: 
                                            <button type="button" class="btn btn-danger"style="border-radius:50px" data-toggle="modal" data-target="#addoff" >
                                            <span class="glyphicon glyphicon-ban-circle" ></span>&nbsp BAN
                                        </button>
                                        </label>
                                        <input type="text" class="form-control" id="pname" placeholder="banned kana" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="dtext" class="form-control" id="date" placeholder="12-01-2019" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Time Start:</label>
                                        <input type="text" class="form-control" id="Ftime" placeholder="10:30am" disabled>
                                        <label for="text">Time end:</label>
                                        <input type="text" class="form-control" id="Etime" placeholder="11:00pm" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment">Total PAYMENT:</label>
                                        <input type="number" class="form-control" id="Payment" placeholder="$10,000" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment">Paid:</label>
                                        <input type="number" class="form-control" id="Payment" placeholder="YES" disabled>
                                    </div>
                                </form>
                        </div>                    
                    </div>
                </div>
            </div>

                
               
            
        </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <?php include('logout_modal.php'); ?>
      <?php include('footer-script.php'); ?>

  
</body>

</html>
