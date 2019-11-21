<?php
	$notif_badge = $this->Notification_model->notification_badge();
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
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/website/logo.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/api/DataTables/datatables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/api/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sticky-footer-navbar.css">
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-flatly.css"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-<?php echo $theme == 'darkly' ? 'darkly' : 'flatly'; ?>.css">
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
		        <a class="navbar-brand" href="<?php echo base_url() ?>p_bookings">
					<img src="<?php echo base_url(); ?>assets/img/website/logo1.png" height="25" alt=""> 
				</a>
		        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		        </button>

		        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			        <ul class="navbar-nav mr-auto">
						<?php if($this->session->userdata('user_id')): ?>
							<!-- <li class="nav-item <?php echo $this->uri->segment(1) == 'p_profile' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url() ?>p_profile">Dashboard</a>
							</li> -->
							<li class="nav-item <?php echo $this->uri->segment(1) == 'p_bookings' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url() ?>p_bookings">Bookings</a>
							</li>
							<li class="nav-item <?php echo $this->uri->segment(1) == 'p_pricing' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url() ?>p_pricing">Add Package</a>
							</li>
							<li class="nav-item <?php echo $this->uri->segment(1) == 'p_package' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url() ?>p_package">Package</a>
							</li>
							<!-- <li class="nav-item <?php echo $this->uri->segment(1) == 'p_profile' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url() ?>p_chat">Chat</a>
							</li> -->
						<?php endif; ?>
			        </ul>
			        <form class="form-inline my-2 my-lg-0" method="POST" action="#">
			            <ul class="navbar-nav">
				            <!-- <li class="nav-item <?php echo $this->uri->segment(1) == 'p_profile' ? 'active' : '' ?>">
					            <a href="<?php// echo $page ?> " class="nav-link"  data-toggle="tooltip" data-placement="bottom" title="Dark Mode: <?php// echo $theme == 'flatly' ? 'OFF' : 'ON' ?>"><i class="fas fa-toggle-<?php echo $theme == 'flatly' ? 'off' : 'on' ?> fa-lg"></i></a>
				            </li> -->
							<?php if(!$this->session->userdata('user_id')): ?>
								<li class="nav-item ">
									<a href="<?php echo base_url() ?>login" class="nav-link">Login</a>
								</li>
								<li class="nav-item ">
									<a href="<?php echo base_url() ?>p_register" class="nav-link">Register</a>
								</li>
							<?php endif; ?>
							<?php if($this->session->userdata('user_id')): ?>
								<li class="nav-item <?php echo $this->uri->segment(1) == 'user_notifications' ? 'active' : '' ?>" > 
									<a href="<?php echo base_url() ?>notifications/index" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Notifications"><?php if($notif_badge > 0): ?><span class="badge badge-pill badge-light mr-1"><?php echo $notif_badge ?></span><?php endif; ?><i class="far fa-bell fa-lg"></i></a> 
								</li>
								<li class="nav-item <?php echo $this->uri->segment(1) == 'p_chat' ? 'active' : '' ?>">
									<a href="<?php echo base_url() ?>p_chat" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="far fa-envelope fa-lg"></i></a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() ?>profile_info" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->session->userdata('fname'); echo ' '.$this->session->userdata('lname'); ?>"><img src="<?php echo base_url(); ?><?php echo $this->session->userdata('photo')?>" width="25" height="25" class="rounded-circle" alt=""></a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() ?>logout_user" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="fas fa-sign-in-alt fa-lg"></i></a>
								</li>
							<?php endif;?>
			        	</ul>
			        </form>
		        </div>
		    </div>
		  </nav>