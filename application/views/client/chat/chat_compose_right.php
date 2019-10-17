<?php echo form_open('client/chat_search') ?>

<?php// print_r($user); ?>
<div class="col-sm-8">
            <p class="h5 font-weight-bold red-brown d-flex justify-content-center"><?=$title ?></p>
            <hr class="">
            <div class="inbox-convo">
<?php// echo $chats == null; foreach($chats as $c){ echo 'a '; } ?>
                <?php foreach($chats as $c): ?>
                    <?php if($c['send_to'] == $userID ): ?>
                    
                        <!-- {{-- Outgoing Msg --}} -->
                        <div class="row ">
                            <div class="col-sm-4 ">
                                <!-- {{-- 3.1 --}} -->
                            </div>
                            <div class="col-sm-6 ">
                                <p class="float-right inbox-padding inbox-bg-red-brown text-white"> <?php echo $c['message'] ?> </p>
                                <p class="d-flex msg-time text-muted justify-content-end clear-right"> <?php echo date('H:i a M d, Y', strtotime($c['created_at'])) ?> </p>
                            </div>
                            <div class="col-sm-1">
                                <img src="<?php echo base_url(); echo $this->session->userdata('photo'); ?>" class="msg-img rounded-circle align-items-center" alt="">
                            </div>
                        </div>
                        <!-- {{-- end of outgoing msg --}} -->
                    
                    <?php elseif($c['compose_from'] == $this->session->userdata('user_id')): ?>
                    
                        <!-- {{-- Incoming Msg --}} -->
                        <div class="row">
                            <div class="col-sm-1">
                                <img src="<?php echo base_url(); echo $user['photo'] ?>" class="msg-img rounded-circle" alt="">
                            </div>
                            <div class="col-sm-6">
                                <p class="inbox-padding inbox-bg-incoming float-left"> <?php echo $c['message']; ?> </p>
                                <p class="text-muted msg-time clear-left"> <?php echo date('H:i a M d, Y', strtotime($c['created_at'])); ?> </p>
                            </div>
                            <div class="col-sm-4 ">
                                <!-- {{-- 2.3 --}} -->
                            </div>
                        </div>
                        <!-- {{-- end of ingoing msg --}} -->
                    <?php endif; ?>
                    

                <?php endforeach; ?>
            
            </div>

            <div class="c-hr"></div>
            <div class="row pr-3">
                <div class="col-md-11 ">
                    <textarea name="message" id="" class="form-group form-control <?php echo form_error('message') ? 'is-invalid' : '' ?>" placeholder="<?php echo form_error('message') ? form_error('message') : 'Type a message...' ?>" rows="1"></textarea>
                </div>
                <div class="col-md-1 ">
                    <button type="submit" name="send" value="send" class="unstyled-button red-brown"><i class="far fa-paper-plane fa-2x"></i></button>
                </div>
            </div>
        </div>
<?php form_close(); ?>


<?php
                     /*   <!-- {{-- Incoming Msg --}} -->
                        <div class="row">
                            <div class="col-sm-1">
                                <img src="<?php echo base_url(); ?>assets/img/okarin.png " class="msg-img rounded-circle" alt="">
                            </div>
                            <div class="col-sm-6">
                                <p class="inbox-padding inbox-bg-incoming float-left">Test work diresdffctly with our designers and suppliers, and sell direct to you, which means quality, exclusiv </p>
                                <p class="text-muted msg-time clear-left">5:56 PM</p>
                            </div>
                            <div class="col-sm-4 ">
                                <!-- {{-- 2.3 --}} -->
                            </div>
                        </div>
                        <!-- {{-- end of ingoing msg --}} --> */
?>