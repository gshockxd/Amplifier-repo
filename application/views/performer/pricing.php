<?php echo form_open('p_pricing_validate');?>
	<div class="container">
		<?php echo $this->session->flashdata('success_message') ? $this->message_model->success_message() : '' ?>
		<?php echo $this->session->flashdata('danger_message') ? $this->message_model->danger_message() : '' ?>
		<div class="py-3">
			<p class="h2 yellow-brown text-center">ADD RATES AND PRICING PACKAGES</p>
			<div class="row">
				<div class="col-md">
					<input type="text" name="name" placeholder="Package Name" value="<?php echo isset($name) ? $name : '' ?>" class="form-group form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>">
					<div class="invalid-feedback">
						<?php echo form_error('name'); ?>
					</div>
				</div>
				<div class="col-md">
					<input type="number" name="price" value="<?php echo isset($price) ? $price : '' ?>" placeholder="Price Offer" class="form-group form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>">
					<div class="invalid-feedback">
						<?php echo form_error('price'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md">
					<label for="" class="text-muted">Place description and what the package consists of</label>
					<textarea name="desc" id="ckeditor" class="form-group form-control <?php echo form_error('desc') ? 'is-invalid' : '' ?>"><?php echo isset($desc) ? $desc : '' ?></textarea>
					<div class="invalid-feedback">
						<?php echo form_error('desc'); ?>
					</div>
				</div>
			</div>
			<div class="row pt-1">
				<div class="col-md d-flex justify-content-end">
					<button class="btn btn-primary" type="submit" name="submit">Submit Package</button>
				</div>
			</div>
		</div>
	</div>
<?php form_close(); ?>