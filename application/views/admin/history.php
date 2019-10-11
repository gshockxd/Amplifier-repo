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
        <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-sort"></i>
                      <span>Search by:</span>
                      </a>
                      <div class="card" style="width:50%; margin:10px;"> 
                        <div class="card-block" >
                          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">       
                             <div class="container-fluid">
                                <span class=" mb-0 pl-3 text-gray-800">Date</span>
                                    <form class="form-inline ml-4 mb-1 "> 
                                        <input class="form-control mr-sm-2" type="date" placeholder="Search by Date"> 
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" ><label class="fa fa-search"></label></button>   
                                    </form>
                                <span class=" mb-0 pl-3 text-gray-800">Name</span>
                                    <form class="form-inline ml-4 mb-1 "> 
                                        <input class="form-control mr-sm-2" type="text" placeholder="Search by name"> 
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" ><label class="fa fa-search"></label></button>   
                                    </form>
                              </div>           
                            </div>
                          </div>
                        </div>
                      </div>
            <div class="card mb-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">VENUE</th>
                            <th scope="col">CLIENT NAME</th>
                            <th scope="col">DATE</th>
                            <th scope="col">CLIENT RATING</th>
                            <th scope="col">ARTIST RATING</th>
                            <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if($fetch_data_history->num_rows()>0)
                            {
                               foreach($fetch_data_history->result() as $row)
                                { 
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row->feedback_id; ?></th>
                                <th><?php echo $row->venue_name; ?></th>
                                <td><?php echo $row->fname; ?>&nbsp<?php echo $row->lname; ?></td>
                                <td><?php echo $row->event_date; ?></td>
                                <td>
                                <?php
                                for($i=0;$i<$row->rating; $i++)
                                { 
                                ?>
                                    <div class="fa fa-star"></div>
                                <?php
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                for($i=0;$i<$row->rating; $i++)
                                { 
                                ?>
                                    <div class="fa fa-star"></div>
                                <?php
                                }
                                ?>
                                <td>
                                    <a href="histview/<?php echo $row->feedback_id; ?>"><button class="btn btn-outline-info fa fa-eye"></button></a>
                                    <a href="#" data-toggle="modal" data-target="#delhist"><button class="btn btn-outline-danger fa fa-trash"></button></a>
                                </td>
                            </tr>
                            
                        <!-- delete modal -->
                            <div class="modal fade" id="delhist" tabindex="-1" role="dialog" aria-labelledby="delhist" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="deleteuser"><b>DELETE<b></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <H5>Are you Sure you want to delete this history details</H5>
                                        </div>
                                        <div class="modal-footer">
                                        <a href="delete_history/<?php echo $row->feedback_id; ?>" type="button" >
                                            <button class="btn btn-danger">YES</button>
                                        </a>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->
                        <?php
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-12 col-md-12 offset-5">
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 3 of 57 entries</div>
                </div>
              
                <div class="col-sm-12 col-md-12 offset-4">
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
        <?php
         
        }
      
        ?>
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

</html>
