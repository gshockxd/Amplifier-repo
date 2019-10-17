    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <?php echo form_open('clients/chat_search'); ?>
                <div class="form-group row">
                    <label for="" class="col-md-1 col-form-label">To:</label>
                    <div class="col-md-10">
                        <input type="hidden" id="userID" name="userID" value="<?php echo $userID ? $userID : '' ?>">
                        <input type="text" id="userName" name="userName" class="form-control <?php echo form_error('userID') ? 'is-invalid' : '' ?>"  data-toggle="tooltip" data-placement="top" title="<?php echo form_error('userID'); ?>" placeholder="<?php echo form_error('userID') ? form_error('userID').'!' : 'Type a name of a person' ?>">
                    </div>
                    <button type="submit" name="search" value="search" class="col-md-1 col-form-label unstyled-button red-brown " ><i class="fas fa-search fa-lg"> </i></button>

                    <!-- <div class="col-md-1 col-form-label"><a href="" type="submit" class="red-brown"><i class="fas fa-search fa-lg"></i></a></div>\ -->
                </div>
            <?php form_close(); ?>
        </div>
    </div>