<?php// $title='Service/Performer Registration' ?>
<?php// require '../inc/header-no-navbar.php'; ?>
	<div class="container py-3">
		<p class="h2">Registration Form (Portfolio)</p>
            <?php $this->load->view('performer/inc/merge-register-nav'); ?>

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
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose Photo</label>
            </div>
			 <a href="register" class="btn btn-outline-secondary ml-3">Previous</a>
			 <a href="description" class="btn btn-outline-primary ml-3">Next</a>
            <?php $this->load->view('performer/inc/merge-register-button'); ?>
		</div>
	</div>
<?php// require '../inc/footer.php'; ?>