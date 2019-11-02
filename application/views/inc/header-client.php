<?php if($this->session->userdata('user_type') == 'client' || $this->session->userdata('user_type') == null): ?>

<?php
	// session_start();
	if(!isset($_SESSION['theme'])){
		$theme = $_SESSION['theme'] = 'flatly';
	}else{
		if (isset($_GET['f'])){
			if($_GET['f'] == 1){
				$theme = $_SESSION['theme'] = 'darkly';				
			}else{
				$theme = $_SESSION['theme'] = 'flatly';
			}
		}else{
			$theme = $_SESSION['theme'];
		}
	}

	$f = $theme == 'flatly' ? '1' : '0';

	// $page = 'localhost'.$_SERVER['REQUEST_URI'].'?f='.$f;
	$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME).'?f='.$f;

	// echo '<br><br>';
	// print(pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/api/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>assets/api/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-flatly.css"> -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/css/bootstrap-<?php echo $theme == 'darkly' ? 'darkly' : 'flatly'; ?>.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/floating-labels.css"> -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/api/fontawesome/css/all.css">
    <script defer src="<?php echo base_url(); ?>assets/api/fontawesome/js/all.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/api/fontawesome/js/brands.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/api/fontawesome/js/solid.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/api/fontawesome/js/fontawesome.js"></script>


    <link href="<?php echo base_url(); ?>assets/api/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/api/fontawesome/css/brands.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/api/fontawesome/css/solid.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-materia.css"> -->
</head>

<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded-bottom">
		    <div class="container">
		        <a class="navbar-brand" href="<?php echo base_url()?>profile">AMPLIFIER</a>
		        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		        </button>

		        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			        <ul class="navbar-nav mr-auto">
						<?php if($this->session->userdata('user_id')): ?>
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url()?>profile">Dashboard <span class="sr-only">(current)</span></a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>package">Package</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>c_events">Events</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>package">Package</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>history_client">History</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>package">Package</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>booking">Book</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>package">Package</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>calendar">Calendar</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>package">Package</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>c_chat">Chat</a>
							</li>
						<?php endif; ?>
			        </ul>
			        <form class="form-inline my-2 my-lg-0" method="POST" action="#">
			            <ul class="navbar-nav">
				            <!-- <li class="nav-item">
					            <a href="<?php// echo $page ?> " class="nav-link"  data-toggle="tooltip" data-placement="bottom" title="Dark Mode: <?php// echo $theme == 'flatly' ? 'OFF' : 'ON' ?>"><i class="fas fa-toggle-<?php echo $theme == 'flatly' ? 'off' : 'on' ?> fa-lg"></i></a>
				            </li> -->
							<?php if(!$this->session->userdata('user_id')): ?>
								<li class="nav-item">
									<a href="<?php echo base_url()?>login" class="nav-link">Login</a>
								</li>
								<li class="nav-item">
									<a data-toggle="modal" data-target="#registerModal" class="nav-link">Register</a>
								</li>
							<?php endif; ?>
							<?php if($this->session->userdata('user_id')): ?>
								<li class="nav-item">
									<a href="#" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="No new notifications"><i class="far fa-bell fa-lg"></i></a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="No new messages"><i class="far fa-envelope fa-lg"></i></a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url()?>profile_info" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->session->userdata('fname'); echo ' '.$this->session->userdata('lname'); ?>"><img src="<?php echo base_url(); ?><?php echo $this->session->userdata('photo')?>" width="25" height="25" class="rounded-circle" alt=""></a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url()?>logout_user" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="fas fa-sign-in-alt fa-lg"></i></a>
								</li>
							<?php endif;?>
			        	</ul>
			        </form>
		        </div>


        </div>
    </nav>

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register, switch one?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-around">
			<div class="row">
				<div class="col-md-6">
					<a href="<?php echo base_url()?>register" class="btn btn-info">Client</a>
				</div>
				<div class="col-md-6">
					<a href="<?php echo base_url()?>p_register" class="btn btn-primary">Performer</a>
				</div>
			</div>
      </div>
    </div>
  </div>
</div>

<?php elseif($this->session->userdata('user_type') == 'performer'): ?>
	<?php $this->load->view('inc/header-performer'); ?>
<<<<<<< .merge_file_a08744
<<<<<<< .merge_file_a13704
<<<<<<< .merge_file_a09240
<<<<<<< .merge_file_a14680
<<<<<<< .merge_file_a14972
<?php endif; ?>
=======
<?php endif; ?>
>>>>>>> .merge_file_a13832
=======
<?php endif; ?>
>>>>>>> .merge_file_a03352
=======
<?php endif; ?>
>>>>>>> .merge_file_a08872
=======
<?php endif; ?>
>>>>>>> .merge_file_a13688
=======
<?php endif; ?>
>>>>>>> .merge_file_a13684
