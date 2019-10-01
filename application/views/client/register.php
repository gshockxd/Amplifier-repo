<?php $title = 'Client Registration'; ?>
<?php require '../inc/header-no-navbar.php'; ?>
	<div class="container py-3">
		<p class="h2 text-muted">Client Registration</p>
		<div class="row">
			<form action="#" method="POST" enctype="multipart/form-data"></form>
			<div class="col-sm py-3">
				<div class="form-group">
					<input type="text" class="form-control is-invalid" name="fname" placeholder="First Name">
				</div>
				<div class="form-group">
					<input type="text" class="form-control is-invalid" name="lname" placeholder="Last Name">
				</div>
				<div class="form-group">
					<input type="number" class="form-control is-invalid" name="number" placeholder="Contact Number">
				</div>
				<div class="form-group">
					<input type="email" class="form-control is-invalid" name="email" placeholder="Email Address">
				</div>
			</div>
			
			<!-- <div class="form-group has-success">
			  <label class="form-control-label" for="inputSuccess1">Valid input</label>
			  <input type="text" value="correct value" class="form-control is-valid" id="inputValid">
			  <div class="valid-feedback">Success! You've done it.</div>
			</div> -->

			<div class="col-sm py-3">
				<div class="form-group">
					<input type="text" class="form-control is-invalid" name="uname" placeholder="UserName">
				</div>
				<div class="form-group">
					<input type="text" class="form-control is-invalid" name="pass" placeholder="Password">
				</div>				
			</div>
		</div>
		<div class="row">
			<div class="col-sm d-flex justify-content-center">
				<a href="profile.php" class="btn btn-outline-dark">SIGN UP</a>
			</div>
		</div>
	</div>
<?php require '../inc/footer.php'; ?>