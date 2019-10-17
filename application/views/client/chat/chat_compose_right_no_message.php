<?php echo form_open('client/chat_search') ?>
<div class="col-sm-8">
            <p class="h5 font-weight-bold red-brown d-flex justify-content-center"><?=$title ?></p>
            <hr class="">
            <!-- {{-- Incoming Msg --}} -->
            <div class="inbox-convo">

            
        
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