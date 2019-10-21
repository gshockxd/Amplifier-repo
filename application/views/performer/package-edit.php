<?php echo form_open('p_package_update'); ?>
    <div class="container col-md-8 py-3">
        <div class="card mb-5" >
            <div class="card-header">
                <div class="row"> 
                    <div class="col-md-3">
                        Package Name:
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="package_name" class="form-control <?php echo form_error('package_name') ? 'is-invalid' : '' ?> " value="<?php echo isset($package_name) ? $package_name : '' ?>">    
                        <div class="invalid-feedback">
                            <?php echo form_error('package_name') ?>
                        </div>   
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <p> Description: </p>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control <?php echo form_error('details') ? 'is-invalid' : '' ?>" name="details" id="ckeditor"><?php echo isset($details) ? $details : '' ?></textarea>
                            <div class="invalid-feedback">
                                <?php echo form_error('details') ?>
                            </div>  
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            Price:
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="price" class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" value="<?php echo isset($price) ? $price : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('price') ?>
                            </div>  
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            Action:
                        </div>
                        <div class="col-md-9 d-flex justify-content-between">
                            <a href="<?php echo base_url() ?>p_package" class="btn btn-danger">Cancel</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<?php form_close(); ?>