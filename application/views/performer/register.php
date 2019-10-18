<?php echo form_open_multipart('p_register_attempt'); ?>
    <div class="container py-3">
        <div>
            <p class="h2"><?=$title ?></p>        
            <div class="row mt-5">
                <div class="col-md">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control <?php echo form_error('uname') ? 'is-invalid' : '' ?>" value="<?php echo isset($uname) ? $uname : '' ?>" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <div class="invalid-feedback">
                            <?php echo form_error('uname') ?>
                        </div>
                    </div>

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
                <div class="col-md">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Contact Number 1</label>
                        <input type="number" class="form-control <?php echo form_error('number1') ? 'is-invalid' : '' ?>" value="<?php echo isset($number1) ? $number1 : '' ?>" name="number1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <div class="invalid-feedback">
                            <?php echo form_error('number1') ?>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Contact Number 2</label>
                        <input type="number" class="form-control <?php echo form_error('number2') ? 'is-invalid' : '' ?>" value="<?php echo isset($number2) ? $number2 : '' ?>" name="number2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <div class="invalid-feedback">
                            <?php echo form_error('number2') ?>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="">Type of Service</label>
                        <select class="form-control <?php echo form_error('service') ? 'is-invalid' : ''; ?>" name="service">
                            <option  selected hidden disabled> PLease Select Type of Service</option>
                            <option value="photographer" <?php echo isset($service) == 'photographer' ? 'selected' : '' ?>>Photographer</option>
                            <option value="videographer" <?php echo isset($service) == 'videographer' ? 'selected' : '' ?>>videographer</option>
                            <option value="host" <?php echo isset($service) == 'host' ? 'selected' : '' ?>>host</option>
                            <option value="restaurant_gig" <?php echo isset($service) == 'restaurant_gig' ? 'selected' : '' ?>>Restaurant Gig</option>
                            <option value="graduation_ball" <?php echo isset($service) == 'graduation_ball' ? 'selected' : '' ?>>Graduation Ball</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('service') ?>
                        </div>
                    </div>
                
                    <div class="mt-3 col-md-6">
                        <label for="">Add Profile Picture</label>                            
                        <div class="custom-file">
                            <input type="file" name="userfile" class="custom-file-input <?php echo form_error('userfile') ? 'is-invalid' : '' ?>" id="customFile">
                            <label  class="custom-file-label" for="customFile">Choose Photo</label>
                            <div class="invalid-feedback">
                                <?php echo form_error('userfile') ?>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control <?php echo form_error('address') ? 'is-invalid' : '' ?>" name="address" id="" rows="3"><?php echo isset($address) ? $address : '' ?></textarea>
                    <div class="invalid-feedback">
                        <?php echo form_error('address') ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-3">
		<div class="row py-3">	
            <div class="col-md-9">
                <div class="card bg-light" style="max-width: 100%;">
                    <div class="card-header font-weight-bold">Add Group Video</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">                                
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input <?php echo form_error('video1') ? 'is-invalid' : '' ?>" name="video1" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('video1') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">                                
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input <?php echo form_error('video2') ? 'is-invalid' : '' ?>" name="video2" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('video2') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">                                
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input <?php echo form_error('video3') ? 'is-invalid' : '' ?>" name="video3" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('video3') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                     
            <div class="col-md-3">
                <div class="card bg-light" style="max-width: 100%;">
                    <div class="card-header">Add Band Photo</div>
                    <div class="card-body">
                        <div class="custom-file ">
                            <input type="file" class="custom-file-input <?php echo form_error('group_photo') ? 'is-invalid' : '' ?>" name="group_photo" id="customFile">
                            <label class="custom-file-label" for="customFile"></label>
                            <div class="invalid-feedback">
                                <?php echo form_error('group_photo') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3"> 
            </div>	

		</div>
	</div>

    

	<div class="container py-3">
		<div class="row py-3 ">
			<div class="col-md">
				<label for="ckeditor" class="font-weight-bold">Input Service Description </label>
				<textarea name="desc" class="form-control <?php echo form_error('desc') ? 'is-invalid' : '' ?>" id="ckeditor" cols="30" rows="10"><?php echo isset($desc) ? $desc : '' ?></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('desc') ?>
                </div>
			</div>
		</div>
        <div class="row py-3 d-flex justify-content-between">
             <a href="profile" class="btn btn-secondary ml-3" data-toggle="tooltip" data-placement="top" title="All data will be lost. Procceed?">Cancel</a>
             <button type="submit" class="btn btn-primary mr-3" name="submit">Submit</button>
	    </div>
	</div>
<?php form_close(); ?>