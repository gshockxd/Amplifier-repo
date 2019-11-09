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

                <form class="form-inline">
                    <input class="form-control-plaintext" type="text"
                        placeholder="<?php echo $date_today = date("F d, Y"); ?>"
                        readonly="<?php echo $date_today = date("F d, Y"); ?>" style="margin-left:15px">
                    <input class="form-control mr-sm-2" type="date" placeholder="Search" style="margin-left:15px">
                    <button class="btn btn-success my-2 my-sm-0 fa fa-search" type="submit"></button>
                </form>
                <br>


                <?php 
            if($fetch_data_notifications->num_rows()>0)
            {
                foreach($fetch_data_notifications->result() as $row)
                { 
                    if($row->notif_type=="user")
                    {
        ?>
                <?php 
                        if($row->status=="notified")
                        {  
                        ?>
                <div href="#"
                    class="list-group-item mr-4 ml-4 mt-2 mb-2 list-group-item-secondary flex-column align-items-start">
                    <?php 
                        }else{ 
                    ?>
                    <div href="#"
                        class="list-group-item mr-4 ml-4 mt-2 mb-2 list-group-item flex-column align-items-start">
                        <?php 
                    } ?>
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-2 text-uppercase">
                                <?php echo $row->notif_status; echo " "; echo $row->notif_type; ?> Account</h5>

                            <br>
                            <a class="btn btn-link btn-outline-info fa fa-eye justify-content-center"
                            onclick="<?php $seen= array("status" => "seen");
                                              $this->db->where("id",$row->id);
                                              $this->db->update("notifications",$seen);
                                              ?>" href="<?php echo base_url('profile/');echo $row->user_id;  ?>"></a></a>

                        </div>
                        <p class="mb-1"><?php echo $row->notif_name; ?> <?php echo $row->notif_status; ?> with user ID number:
                            <?php echo  $row->user_id ?>. Click to view more details</p>
                        <small class="text-muted"></small>
                    </div>
                    <?php } ?>
                    <?php
                    if($row->notif_type=="report")
                    {
                ?>
                    <?php 
                        if($row->status=="notified")
                        {  
                        ?>
                    <div href="#"
                        class="list-group-item mr-4 ml-4 mt-2 mb-2 list-group-item-secondary flex-column align-items-start">
                        <?php 
                        }else{ 
                    ?>
                        <div href="#"
                            class="list-group-item mr-4 ml-4 mt-2 mb-2 list-group-item flex-column align-items-start">
                            <?php 
                    } ?>
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-2 text-uppercase">Account <?php echo $row->notif_status; ?> </h5>

                                <br>
                                <a class="btn btn-link btn-outline-info fa fa-eye justify-content-center" onclick="<?php $seen= array("status" => "seen");
                                              $this->db->where("id",$row->id);
                                              $this->db->update("notifications",$seen);
                                              ?>" href="<?php echo base_url('reports'); ?>"></a>

                            </div>
                            <p class="mb-1"><?php echo $row->notif_name; ?>. Report id number:
                                <?php echo  $row->report_id ?>. Click to view more details</p>
                            <small class="text-muted"><?php echo date('F j, Y',strtotime($row->created_at)); ?></small>
                        </div>
                        <?php } ?>
                        <?php
                    if($row->notif_type=="event")
                    {
                ?>
                        <?php 
                        if($row->status=="notified")
                        {  
                        ?>
                        <div href="#"
                            class="list-group-item mr-4 ml-4 mt-2 mb-2 list-group-item-secondary flex-column align-items-start">
                            <?php 
                        }else{ 
                    ?>
                            <div href="#"
                                class="list-group-item mr-4 ml-4 mt-2 mb-2 list-group-item flex-column align-items-start">
                                <?php 
                    } ?>
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-2 text-uppercase"><?php echo $row->notif_type; ?>
                                        <?php echo $row->notif_status; ?></h5>

                                    <br>
                                    <a class="btn btn-link btn-outline-info fa fa-eye justify-content-center" onclick="<?php $seen= array("status" => "seen");
                                              $this->db->where("id",$row->id);
                                              $this->db->update("notifications",$seen);
                                              ?>" href="<?php echo base_url('eventview/');echo $row->booking_id;  ?>"></a>

                                </div>
                                <p class="mb-1"><?php echo $row->notif_name; ?>, Booking Reference
                                    number <?php echo  $row->booking_id ?>. Click to view more details</p>
                                <small
                                    class="text-muted"><?php echo date('F j, Y',strtotime($row->created_at)); ?></small>
                            </div>
                            <?php } ?>

                            <?php
                    if($row->notif_type=="package")
                    {
                ?>
                            <?php 
                        if($row->status=="notified")
                        {  
                        ?>
                            <div href="#"
                                class="list-group-item mr-4 ml-4 mt-2 mb-2 list-group-item-secondary flex-column align-items-start">
                                <?php 
                        }else{ 
                    ?>
                                <div href="#"
                                    class="list-group-item mr-4 ml-4 mt-2 mb-2 list-group-item flex-column align-items-start">
                                    <?php 
                    } ?>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-2 text-uppercase"><?php echo $row->notif_type; ?>
                                            <?php echo $row->notif_status; ?></h5>

                                        <br>
                                        <a class="btn btn-link btn-outline-info fa fa-eye justify-content-center" onclick="<?php $seen= array("status" => "seen");
                                              $this->db->where("id",$row->id);
                                              $this->db->update("notifications",$seen);
                                              ?>" href="<?php echo base_url('services'); $row->package_id;  ?>"></a></a>

                                    </div>
                                    <p class="mb-1"><?php echo $row->notif_name; ?>.
                                        Package Reference number: <?php echo  $row->package_id ?>. Click to view more details</p>
                                    <small
                                        class="text-muted"><?php echo date('F j, Y',strtotime($row->created_at)); ?></small>
                                </div>
                                <?php } ?>
                                <?php
            }
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

                        <?php include('footer-script.php'); ?>


</body>


</html>