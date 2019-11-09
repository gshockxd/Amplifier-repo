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
                    <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-sort"></i>
                        <span>Search by:</span>
                    </a>
                    <div class="card" style="width:50%; margin:10px;">
                        <div class="card-block">
                            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                                data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <div class="container-fluid">
                                        <span class=" mb-0 pl-3 text-gray-800">Date</span>
                                        <form class="form-inline ml-4 mb-1 ">
                                            <input class="form-control mr-sm-2" type="date"
                                                placeholder="Search by Date">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><label
                                                    class="fa fa-search"></label></button>
                                        </form>
                                        <span class=" mb-0 pl-3 text-gray-800">Name</span>
                                        <form class="form-inline ml-4 mb-1 ">
                                            <input class="form-control mr-sm-2" type="text"
                                                placeholder="Search by name">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><label
                                                    class="fa fa-search"></label></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                    <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">ID</th>
                                        <th class="th-sm">VENUE</th>
                                        <th class="th-sm">CLIENT NAME</th>
                                        <th class="th-sm">PERFORMER NAME</th>
                                        <th class="th-sm">DATE</th>
                                        <th class="th-sm">CLIENT RATING</th>
                                        <th class="th-sm">ARTIST RATING</th>
                                        <th class="th-sm">STATUS</th>
                                        <th class="th-sm">ACTION</th>
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
                                        <th scope="row"><?php echo $row->booking_id; ?></th>
                                        <th><?php echo $row->venue_name; ?></th>
                                        <td><?php echo $row->client_fname; ?>&nbsp<?php echo $row->client_lname; ?></td>
                                        <td><?php echo $row->performer_fname; ?>&nbsp<?php echo $row->performer_lname; ?>
                                        </td>
                                        <td><?php echo  date('F d, Y', strtotime($row->event_date)); ?></td>
                                        <td>
                                            <?php
                                for($i=0;$i<$row->client_rating; $i++)
                                { 
                                ?>
                                            <div class="fa fa-star"></div>
                                            <?php
                                }
                                ?>
                                        </td>
                                        <td>
                                            <?php
                                for($i=0;$i<$row->performer_rating; $i++)
                                { 
                                ?>
                                            <div class="fa fa-star"></div>
                                            <?php
                                }
                                ?>
                                        <th><?php echo $row->status; ?></th>
                                        <td>
                                            <a href="eventview/<?php echo $row->booking_id; ?>"><button
                                                    class="btn btn-outline-info fa fa-eye"></button></a>
                                        </td>
                                    </tr>
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
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 3
                            of 57 entries</div>
                    </div>

                    < <script>
            $(document).ready(function () {
            $('#dtMaterialDesignExample').DataTable();
            $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search");
                $this.removeClass('form-control-sm');
            });
            $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
            $('#dtMaterialDesignExample_wrapper select').removeClass(
            'custom-select custom-select-sm form-control form-control-sm');
            $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
            $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
            $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
            });
            </script>
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