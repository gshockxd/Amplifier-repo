<div class="col-sm-8">
            <p class="h5 font-weight-bold red-brown d-flex justify-content-center">Nike Marti Caballes</p>
            <hr class="">
            <!-- {{-- Incoming Msg --}} -->
            <div class="inbox-convo">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="<?php echo base_url(); ?>assets/img/okarin.png " class="msg-img rounded-circle" alt="">
                    </div>
                    <div class="col-sm-6">
                        <p class="inbox-padding inbox-bg-incoming float-left">Test work directly with our designers and suppliers, and sell direct to you, which means quality, exclusiv </p>
                        <p class="text-muted msg-time clear-left">5:56 PM</p>
                    </div>
                    <div class="col-sm-4 ">
                        <!-- {{-- 2.3 --}} -->
                    </div>
                </div>

                <!-- {{-- Outgoing Msg --}} -->
                <div class="row ">
                    <div class="col-sm-4 ">
                        <!-- {{-- 3.1 --}} -->
                    </div>
                    <div class="col-sm-6 ">
                        <p class="float-right inbox-padding inbox-bg-red-brown text-white">Test Test work directly with our designers and suppliers, and sell direct to you, which means quality, exclusiv </p>
                        <p class="d-flex msg-time text-muted justify-content-end clear-right">6:44 PM</p>
                    </div>
                    <div class="col-sm-1">
                        <img src="<?php echo base_url(); ?>assets/img/okarin.png" class="msg-img rounded-circle align-items-center" alt="">
                    </div>
                </div>
                <!-- {{-- end of outgoing msg --}} -->

                    <?php for($x=0; $x<10; $x++){ ?>
                    <!-- {{-- Incoming Msg --}} -->
                        <div class="row">
                            <div class="col-sm-1">
                                <img src="<?php echo base_url(); ?>assets/img/okarin.png " class="msg-img rounded-circle" alt="">
                            </div>
                            <div class="col-sm-6">
                                <p class="inbox-padding inbox-bg-incoming float-left">Test work directly with our designers and suppliers, and sell direct to you, which means quality, exclusiv </p>
                                <p class="text-muted msg-time clear-left">5:56 PM</p>
                            </div>
                            <div class="col-sm-4 ">
                                <!-- {{-- 2.3 --}} -->
                            </div>
                        </div>
        
                        <!-- {{-- Outgoing Msg --}} -->
                        <div class="row ">
                            <div class="col-sm-4 ">
                                <!-- {{-- 3.1 --}} -->
                            </div>
                            <div class="col-sm-6 ">
                                <p class="float-right inbox-padding inbox-bg-red-brown text-white">Test Test work directly with our designers and suppliers, and sell direct to you, which means quality, exclusiv </p>
                                <p class="d-flex msg-time text-muted justify-content-end clear-right">6:44 PM</p>
                            </div>
                            <div class="col-sm-1">
                                <img src="<?php echo base_url(); ?>assets/img/okarin.png  " class="msg-img rounded-circle align-items-center" alt="">
                            </div>
                        </div>
                        <!-- {{-- end of outgoing msg --}} -->
                    <?php } ?>
            </div>
            <div class="c-hr"></div>
            <div class="row pr-3">
                <div class="col-md-11 ">
                    <!-- <input type="text" placeholder="Type a message..." class="form-group form-control"> -->
                    <textarea name="" id="" class="form-group form-control" rows="1"></textarea>
                </div>
                <div class="col-md-1 ">
                    <a href="#" class="red-brown"><i class="far fa-paper-plane fa-2x"></i></a>
                </div>
            </div>
        </div>