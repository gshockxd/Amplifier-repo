            <!-- {{-- <div class="row">
                    {{-- lvl 1 
                <div class="col-sm">
                    {{-- lvl 1.1 
                    <h2 class="text-primary">Recent</h2>
                </div>  
                <div class="col-sm">
                    {{-- lvl 1.2 
                    <input type="text" placeholder="search">
                </div>
            </div> --}} -->
            <div class="inbox-chat">
                <div id="chat-1">
                    <a href="chat.php" class="btn btn-outline-chat">
                        <div class="row text-chat">
                           <!--  {{-- lvl 1.2 --}} -->
                            <div class="col-sm-2">
                                <!-- {{-- lvl 1.2.1 --}} -->
                                <img src="<?php echo base_url(); ?>assets/img/pp.png " alt="" class="avatar-img rounded-circle">
                            </div>
                            <div class="col-sm-10">
                               <!--  {{-- lvl 1.2.2 --}} -->
                                <div class="row">
                                    <div class="col-sm-7 ">
                                        <p class="">Nike Marti Caballes</p>
                                    </div>
                                    <div class="col-sm-5 ">
                                        <p class="h6 ">11:01 PM</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                       <!--  {{-- lvl 1.2.2.1 --}} -->
                                        <p class="">You: Test, which is a new appr..</p>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </a>
                </div>
                <div class="py-1"></div>

                <?php for($x=0; $x<10; $x++){ ?>
                    <div id="chat-1">
                        <a href="" class="btn btn-outline-chat">                            
                            <div class="row text-chat">
                               <!--  {{-- lvl 1.2 --}} -->
                                <div class="col-sm-2">
                                    <!-- {{-- lvl 1.2.1 --}} -->
                                    <img src="<?php echo base_url(); ?>assets/img/pp.png " alt="" class="avatar-img rounded-circle">
                                </div>
                                <div class="col-sm-10">
                                   <!--  {{-- lvl 1.2.2 --}} -->
                                    <div class="row">
                                        <div class="col-sm-7 ">
                                            <p class=" ">Nike Marti Caballes</p>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <p class=" h6">11:01 PM</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                           <!--  {{-- lvl 1.2.2.1 --}} -->
                                            <p class="">You: Test, which is a new appr..</p>
                                        </div>
                                    </div>
                                </div>                    
                            </div>
                        </a>
                    </div>
                    <div class="py-1"></div>
                <?php } ?>

            </div>
