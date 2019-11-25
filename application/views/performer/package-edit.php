<?php echo form_open('p_package_update'); ?>
    <div class="container col-md-8 py-3">
        <div class="card mb-5" >
            <div class="card-header">
                <div class="row"> 
                    <div class="col-md-3">
                        Package Name:
                    </div>
                    <div class="col-md-9">
                        <input type="hidden" name="id" value="<?php echo $this->uri->segment(2); ?>">
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
                        <div class="col-md-9 d-flex justify-content-end">
                            <a href="<?php echo base_url() ?>p_package" class="btn btn-secondary mr-3">Cancel</a>
                            <a data-toggle="modal" data-target="#alertDelete"  class="btn btn-danger text-white mr-3" data-toggle="tooltip" data-placement="top" title="Delete Package"><i class="fas fa-trash"></i></a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<?php form_close(); ?>

<!-- Modal -->
<div class="modal fade" id="alertDelete" tabindex="-1" role="dialog" aria-labelledby="deleteAlert" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteAlert">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-around">
			<div class="row">
				<div class="col-md-6">                
					<a href="<?php echo base_url();?>p_package_delete/<?php echo $this->uri->segment(2) ?>" class="btn btn-danger">Yes</a>
				</div>
				<div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
				</div>
			</div>
      </div>
    </div>
  </div>
</div>