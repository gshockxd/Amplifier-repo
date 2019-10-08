
<div class="container py-3 form-signin">
    <?php echo form_open('clients/user_login'); ?>
      <div class="text-center mb-4">
        <img class="mb-4 border border-danger " src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Login to <p>AMPLIFIER</p></h1>
    </div>

    <?php if($this->session->flashdata('user_not_matched')): ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php echo $this->session->flashdata('user_not_matched'); ?>
        </div>
    <?php endif; ?>

      <div class="form-label-group">
        <input type="email" id="inputEmail" name="email" value="<?php echo isset($email) ? $email : '' ?>" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" placeholder="Email address" autofocus>
        <label for="inputEmail">Email address</label>
        <div class="invalid-feedback">
            <?php echo form_error('email'); ?>
        </div>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" name="pass" class="form-control <?php echo form_error('pass') ? 'is-invalid' : '' ?>" placeholder="Password">
        <label for="inputPassword">Password</label>
        <div class="invalid-feedback">
            <?php echo form_error('pass'); ?>
        </div>
      </div>

        <a href="profile" class="">Cancel</a>
        <p class="float-right">Don't have account? <a href="register">Register here</a></p>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">AMPLIFIER &copy; 2019</p>
    <?php form_close(); ?>
</div>
