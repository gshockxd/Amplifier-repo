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
                    <input class="form-control-plaintext" type="text" placeholder="Selected Date:08/20/2019"
                        readonly="Selected Date:08/20/2019" style="margin-left:15px">
                    <input class="form-control mr-sm-2" type="date" placeholder="Search" style="margin-left:15px">
                    <button class="btn btn-success my-2 my-sm-0 fa fa-search" type="submit"></button>
                </form>
                <br>
                <div class="list-group m-3">
                    <div href="#" class="list-group-item list-group-item flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">100 Pending Email Verifications</h5>
                            <small class="text-muted">3 hours ago
                                <br>
                                <Button class="btn btn-outline-danger fa fa-trash" data-toggle="modal"
                                    data-target="#delreport"></button>
                                <a class="btn btn-link btn-outline-info fa fa-eye" href="users"></a>
                            </small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                    </div>
                    <div href="#" class="list-group-item list-group-item flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">300 Reports Received</h5>
                            <small class="text-muted">3 hours ago
                                <br>
                                <Button class="btn btn-outline-danger fa fa-trash" data-toggle="modal"
                                    data-target="#delreport"></button>
                                <a class="btn btn-link btn-outline-info fa fa-eye" href="reports"></a>
                            </small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                    </div>
                    <div href="#" class="list-group-item list-group-item flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">624 Events scheduled today</h5>
                            <small class="text-muted">3 hours ago
                                <br>
                                <Button class="btn btn-outline-danger fa fa-trash" data-toggle="modal"
                                    data-target="#delreport"></button>
                                <a class="btn btn-link btn-outline-info fa fa-eye" href="events"></a>
                            </small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                    </div>
                    <div href="#" class="list-group-item list-group-item flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">12900 successful bookings this week</h5>
                            <small class="text-muted">3 hours ago
                                <br>
                                <Button class="btn btn-outline-danger fa fa-trash" data-toggle="modal"
                                    data-target="#delreport"></button>
                                <a class="btn btn-link btn-outline-info fa fa-eye" href="history"></a>
                            </small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                    </div>
                    <div href="#" class="list-group-item list-group-item flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">1209990 total users</h5>
                            <small class="text-muted">3 hours ago
                                <br>
                                <Button class="btn btn-outline-danger fa fa-trash" data-toggle="modal"
                                    data-target="#delreport"></button>
                                <a class="btn btn-link btn-outline-info fa fa-eye" href="users"></a>
                            </small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                    </div>
                </div>



                </form>
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- del notification modal -->
        <div class="modal fade" id="delreport" tabindex="-1" role="dialog" aria-labelledby="delreport"
            aria-hidden="true">
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
            <?php include('footer-script.php'); ?>


</body>


</html>