
        <div class="col-md-8">
            <!-- <div class="col-md-12 row">
                    <label for=""></label>
                <input type="text" name="new_message" class="form-control">
            </div> -->
            <?php echo form_open('clients/chat_search'); ?>
                <div class="form-group row">
                    <label for="" class="col-md-1 col-form-label">To:</label>
                    <div class="col-md-10">
                        <input type="hidden" id="userID" name="userID">
                        <input type="text" id="userName" name="userName" class="form-control"  data-toggle="tooltip" data-placement="top" title="<?php echo form_error('userID'); ?>" placeholder="Type a name of a person">
                    </div>
                    <button type="submit" class="col-md-1 col-form-label unstyled-button red-brown " ><i class="fas fa-search fa-lg"> </i></button>

                    <!-- <div class="col-md-1 col-form-label"><a href="" type="submit" class="red-brown"><i class="fas fa-search fa-lg"></i></a></div>\ -->
                </div>
            <?php form_close(); ?>
        </div>