<div class="container mt-3">
    <div class="row">
        <div class="col-md-7">
            <p class="h4 text-center">Notifications</p>
            <table class="table table-bordered table-hover">
                <?php if($notifications):?>
                    <?php foreach($notifications as $n): ?>      
                        <tr class="clickable-row <?php echo $n['status'] == 'notified'? 'bg-light' : '' ?>" data-toggle="tooltip" data-placement="" title="<?php echo date('m/d/y h:i a', strtotime($n['created_at'])) ?>" data-href="<?php echo $n['links'] ?>">
                            <td class="">
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="text-justify"><?php echo $n['notif_name'] ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo date('m/d/y h:s a', strtotime($n['created_at'])) ?>
                                    </div>
                                </div>
                            </td>
                        </tr>              
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
                <?php echo $this->pagination->create_links(); ?>
        </div>
        <div class="col-md-5 mt-3">
            <img src="<?php echo base_url() ?>assets/img/website/reminders.svg" width="100%" alt="">
        </div>
    </div>
</div>

<?php 
    if(isset($notifications)){
        $this->Notification_model->notified_to_seen($notifications);
    }else{

    }
?>