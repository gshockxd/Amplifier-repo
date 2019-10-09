            <div class="inbox-chat">

                <?php for($x=0; $x<10; $x++): ?>
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
                <?php endfor; ?>

            </div>
