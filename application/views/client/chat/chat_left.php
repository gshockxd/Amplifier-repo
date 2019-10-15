            <div class="inbox-chat">
           
           <?php 
            // echo '<pre>';
            // print_r($get_users_chats);
            // echo '</pre>';
			// die();
            ?>
        
                <?php $i = 0; foreach($get_users_chats[0]['user_data'] as $guc): ;?>
                    <?php if($guc['user_id'] == $this->session->userdata('user_id')): ?>
                        <div id="chat-1">
                            <a href="click_user_left?user_id=<?php echo $get_users_chats[0]['incoming_message_user_data']['user_id'] ?>" class="btn btn-outline-chat">                            
                                <div class="row text-chat ">
                                <!--  {{-- lvl 1.2 --}} -->
                                    <div class="col-md-3">
                                        <!-- {{-- lvl 1.2.1 --}} -->
                                        <img src="<?php echo base_url(); echo $get_users_chats[0]['incoming_message_user_data']['photo'] ?> " alt="" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="col-md-9">
                                    <!--  {{-- lvl 1.2.2 --}} -->
                                        <div class="row col-md-12">
                                            <div class="col-md-6 mr-auto">
                                                <p class=""><?php echo $get_users_chats[0]['incoming_message_user_data']['fname']; echo '.'.$get_users_chats[0]['incoming_message_user_data']['lname'] ?></p>
                                            </div>
                                            <div class="col-md-6 ml-auto">
                                                <small class="d-flex"><?php echo date('H:i.a.m/d/y', strtotime($get_users_chats[0]['user_message'][$i]['created_at'])) ?></small>
                                            </div>
                                        </div>
                                            <div class="col-md-auto">
                                            <!--  {{-- lvl 1.2.2.1 --}} -->
                                                
                                                <?php $k = 0; if($get_users_chats[0]['user_message'][$k]['send_to'] == $this->session->userdata('user_id')): ?>
                                                    <p class=""><?php echo $get_users_chats[0]['user_message'][$k]['message'] ?></p>
                                                <?php $k++; endif; ?>
                                            </div>
                                    </div>                    
                                </div>
                            </a>
                        </div>

                    <?php elseif($get_users_chats[0]['user_message'][$i]['message'] == NULL):;?>
                        <div id="chat-1">
                            <a href="click_user_left?user_id=<?php echo $guc['user_id'] ?>" class="btn btn-outline-chat">                            
                                <div class="row text-chat ">
                                <!--  {{-- lvl 1.2 --}} -->
                                    <div class="col-md-3">
                                        <!-- {{-- lvl 1.2.1 --}} -->
                                        <img src="<?php echo base_url(); echo $guc['photo'] ?> " alt="" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="col-md-9">
                                    <!--  {{-- lvl 1.2.2 --}} -->
                                        <div class="row col-md-12">
                                            <div class="col-md-6 mr-auto">
                                                <p class=""><?php echo $guc['fname']; echo '.'.$guc['lname'] ?></p>
                                            </div>
                                            <div class="col-md-6 ml-auto">
                                                <small class="d-flex"><?php echo date('H:i.a.m/d/y', strtotime($get_users_chats[0]['user_message'][$i]['created_at'])) ?></small>
                                            </div>
                                        </div>
                                            <div class="col-md-auto">
                                            <!--  {{-- lvl 1.2.2.1 --}} -->
                                                <p class=""><?php echo $get_users_chats[0]['user_message'][$i]['message'] ?></p>
                                            </div>
                                    </div>                    
                                </div>
                            </a>
                        </div>

                    <?php endif; ?>

                <?php $i++; endforeach; ?>

            </div>


<?php /*

               <?php// for($x=0; $x<10; $x++): ?>
                    <div id="chat-1">
                        <a href="" class="btn btn-outline-chat">                            
                            <div class="row text-chat">
                               <!--  {{-- lvl 1.2 --}} -->
                                <div class="col-md-2">
                                    <!-- {{-- lvl 1.2.1 --}} -->
                                    <img src="<?php echo base_url(); ?>assets/img/pp.png " alt="" class="avatar-img rounded-circle">
                                </div>
                                <div class="col-md-10">
                                   <!--  {{-- lvl 1.2.2 --}} -->
                                    <div class="row">
                                        <div class="col-md-7 ">
                                            <p class=" ">Nike Marti Caballes</p>
                                        </div>
                                        <div class="col-md-5 ">
                                            <p class=" h6">11:01 PM</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                           <!--  {{-- lvl 1.2.2.1 --}} -->
                                            <p class="">You: Test, which is a new appr..</p>
                                        </div>
                                    </div>
                                </div>                    
                            </div>
                        </a>
                    </div>
                <?php// endfor; ?>

                
*/
?>