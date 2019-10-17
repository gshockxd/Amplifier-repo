<?php echo form_open_multipart('p_register_attempt'); ?>
    <div class="container py-3">
        <div>
            <p class="h2">Performer Registration</p>        
            <div class="row mt-5">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control <?php echo form_error('fname') ? 'is-invalid' : '' ?>" value="<?php echo isset($fname) ? $fname : '' ?>" name="fname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <div class="invalid-feedback">
                            <?php echo form_error('fname') ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text"  class="form-control <?php echo form_error('fname') ? 'is-invalid' : '' ?>" value="<?php echo isset($lname) ? $lname : '' ?>" name="lname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <div class="invalid-feedback">
                            <?php echo form_error('lname') ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" value="<?php echo isset($email) ? $email : '' ?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <div class="invalid-feedback">
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm">
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="cnumber" class="form-control <?php echo form_error('number') ? 'is-invalid' : '' ?>" value="<?php echo isset($number) ? $number : '' ?>" name="number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <div class="invalid-feedback">
                            <?php echo form_error('number') ?>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <label for="">Type of Service</label>
                        <select class="form-control">
                            <option selected disabled>-----------------------</option>
                            <option value="1">ok!</option>
                        </select>
                    </div>

                    <div class="mt-3 col-sm-6">
                        <label for="">Add Profile Picture</label>                            
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?php echo form_error('userfile') ? 'is-invalid' : '' ?>" id="customFile">
                            <label  class="custom-file-label" name="userfile" for="customFile">Choose Photo</label>
                            <div class="invalid-feedback">
                                <?php echo form_error('userfile') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
		<div class="row py-3">
			<?php for($x=0; $x<3; $x++){ ?>			
				<div class="col-sm-3 mr-3">
					<div class="card" style="width: 18rem;">
					  <!-- <img src="..." class="card-img-top" alt="..."> -->
					  <div class="card-body">
					  	<p> Plus Icon</p>
					    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
					  </div>
					</div>
				</div>				
			<?php } ?>
		</div>

		<div class="row py-3 d-flex justify-content-end">       
            <div class="custom-file col-sm-2">
                <input type="file" class="custom-file-input <?php echo form_error('photo') ? 'is-invalid' : '' ?>" name="photo" id="customFile">
                <label class="custom-file-label" for="customFile">Choose Photo</label>
                <div class="invalid-feedback">
                    <?php echo form_error('photo') ?>
                </div>
            </div>
		</div>
	</div>

	<div class="container py-3">
		<div class="row py-3 ">
			<div class="col-sm">
				<label for="ckeditor" class="font-weight-bold">Input Service Description </label>
				<textarea name="desc" class="form-control <?php echo form_error('desc') ? 'is-invalid' : '' ?>" id="ckeditor" cols="30" rows="10"><?php echo isset($desc) ? $desc : '' ?></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('desc') ?>
                </div>
			</div>
		</div>
        <div class="row py-3 d-flex justify-content-end">
             <button type="submit" class="btn btn-outline-success ml-3" name="submit">Finish</button>
             <a href="#" class="btn btn-outline-danger ml-3">Cancel</a>
	    </div>
	</div>
<?php form_close(); ?>