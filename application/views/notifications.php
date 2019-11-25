<div class="container mt-3">
    <div class="row">
        <div class="col-md-7">
            <p class="h4 text-center">Notifications</p>
            <table class="table table-bordered table-hover">
                <?php if($notifications):?>
                    <?php foreach($notifications as $n): ?>      
                        <tr class="clickable-row" data-toggle="tooltip" data-placement="right" title="" data-href="<?php echo $n['links'] ?>">
                            <td><?php echo $n['notif_name'] ?></td>
                        </tr>              
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
        <div class="col-md-5 mt-3">
            <img src="<?php echo base_url() ?>assets/img/website/reminders.svg" width="100%" alt="">
        </div>
    </div>
</div>