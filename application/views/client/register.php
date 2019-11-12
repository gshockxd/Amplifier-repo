<?php echo form_open_multipart('register_attempt'); ?>
	<div class="container py-3" >
		
		<div class="bg-white">
			<p class="h2 text-center">
				<img src="<?php echo base_url(); ?>assets/img/website/logo.png" alt="" width="72" height="72">
				<?=$title ?>
			</p>
			<div class="row">
				<div class="col-md-6">
					<input value="client" class="sr-only" name="user_type">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" class="form-control <?php echo form_error('uname') ? 'is-invalid' : '' ?>" value="<?php echo isset($uname) ? $uname : '' ?>" name="uname" >
						<div class="invalid-feedback">
							<?php echo form_error('uname'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" class="form-control <?php echo form_error('fname') ? 'is-invalid' : '' ?>" value="<?php echo isset($fname) ? $fname : '' ?>" name="fname" >
						<div class="invalid-feedback">
							<?php echo form_error('fname'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="">Last Name</label>
						<input type="text" class="form-control <?php echo form_error('lname') ? 'is-invalid' : '' ?>" value="<?php echo isset($lname) ? $lname : '' ?>" name="lname" >
						<div class="invalid-feedback">
							<?php echo form_error('lname'); ?>
						</div>
					</div>
					<label class="" for="inlineFormInputGroupUsername">Contact Number 1</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">09</div>
						</div>
						<input type="number1" class="form-control <?php echo form_error('number1') ? 'is-invalid' : '' ?>" value="<?php echo isset($number1) ? $number1 : '' ?>" name="number1" >
						<div class="invalid-feedback">
							<?php echo form_error('number1'); ?>
						</div>
					</div>
					<label class="" for="inlineFormInputGroupUsername">Contact Number 2 <span><small>(Optional)</small></span></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">09</div>
						</div>
						<input type="number2" class="form-control <?php echo form_error('number2') ? 'is-invalid' : '' ?>" value="<?php echo isset($number2) ? $number2 : '' ?>" name="number2" >
						<div class="invalid-feedback">
							<?php echo form_error('number2'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="">Email Address</label>
						<input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" value="<?php echo isset($email) ? $email : '' ?>" name="email" >
						<div class="invalid-feedback">
							<?php echo form_error('email'); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Adrress</label>
						<textarea class="form-control <?php echo form_error('address') ? 'is-invalid' : '' ?>" name="address" id="" cols="1" rows="1"><?php echo isset($address) ? $address : '' ?></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('address'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="">Add Profile Picture</label>                            
						<div class="custom-file">
							<input type="file" class="custom-file-input <?php echo form_error('userfile') ? 'is-invalid' : ''; ?>" name="userfile" id="customFile">
							<label  class="custom-file-label" for="customFile">Choose Photo</label>
							<div class="invalid-feedback">
								<?php echo form_error('userfile'); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control <?php echo form_error('pass') ? 'is-invalid' : '' ?>"  name="pass" >
						<div class="invalid-feedback">
							<?php echo form_error('pass'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" class="form-control <?php echo form_error('passconf') ? 'is-invalid' : '' ?>"  name="passconf" >
						<div class="invalid-feedback">
							<?php echo form_error('passconf'); ?>
						</div>
					</div>

					<div class="row d-flex justify-content-center">					
						<div class="col-md-3">
							<!-- <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Anything in the form will be lost!">Back</button> -->
							<a href="profile" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Anything in the form will be lost!">Cancel</a>
						</div>
						<div class="col-md-3 offset-md-3">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php form_close(); ?>