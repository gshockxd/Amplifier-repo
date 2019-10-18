<?php
	class Performers extends CI_Controller {
		public function register (){
			$this->p_register_model->index();
		}
		public function register_attempt(){
			$this->p_register_model->register();
		}
		public function portfolio(){
			$this->p_register_model->porfolio();
		}
		public function description(){
			$this->p_register_model->description();
		}
		public function index(){
			$templates['title'] = 'Performer Profile';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/profile');
			$this->load->view('inc/footer');
		}
		public function profile(){
			if(!$this->session->userdata() || $this->session->userdata('user_type') != 'performer'){
				redirect('profile');
			}
			$templates['title'] = 'Performer Profile';

			// $this->load->view('inc/header', $templates);
			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/profile');
			$this->load->view('inc/footer');
		}
		public function history(){
			$templates['title'] = 'Performer History';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/history');
			$this->load->view('inc/footer');
		}
		public function pricing(){
			$templates['title'] = 'Performer Pricing';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/pricing');
			$this->load->view('inc/footer');
		}
		public function package(){
			$templates['title'] = 'Performer Package';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/package');
			$this->load->view('inc/footer');
		}
		public function chat(){
			$templates['title'] = 'Performer Chat';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/chat');
			$this->load->view('inc/footer');
		}
		public function file_check_photo(){
			// die('nice');
			if(!$this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
			$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$mime = get_mime_by_extension($_FILES['userfile']['name']);
			if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
				if($_FILES['userfile']['error'] != 0){
					$this->form_validation->set_message('file_check_photo', 'Image File Exceed 2MB');
					return false;
				}
				// if($width > 5000 && $height > 5000){
				// 	$this->form_validation->set_message('file_check_photo', 'Image Dimension Exceed 5000 x 5000');
				// 	return false;
				// }
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check_photo', 'Please select only gif/jpg/png file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_photo', 'Please choose a file image to upload.');
				return false;
			}
		}	
		public function file_check_video_1(){
			if(!$this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
			$allowed_mime_type_arr = array('video/mp4');
			$mime = get_mime_by_extension($_FILES['video1']['name']);
			if(isset($_FILES['video1']['name']) && $_FILES['video1']['name']!=""){
				if($_FILES['video1']['error'] != 0){
					$this->form_validation->set_message('file_check_video_1', 'The video file is corrupted. Cannot proceed');
					return false;
				}
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check_video_1', 'Please select only mp4 file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_video_1', 'Please choose a file image to upload.');
				return false;
			}
		}	
		public function file_check_video_2(){
			if(!$this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
			$allowed_mime_type_arr = array('video/mp4');
			$mime = get_mime_by_extension($_FILES['video2']['name']);
			if(isset($_FILES['video2']['name']) && $_FILES['video2']['name']!=""){
				if($_FILES['video2']['error'] != 0){
					$this->form_validation->set_message('file_check_video_2', 'The video file is corrupted. Cannot proceed');
					return false;
				}
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check_video_2', 'Please select only mp4 file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_video_2', 'Please choose a file image to upload.');
				return false;
			}
		}	
		public function file_check_video_3(){
			if(!$this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
			$allowed_mime_type_arr = array('video/mp4');
			$mime = get_mime_by_extension($_FILES['video3']['name']);
			if(isset($_FILES['video3']['name']) && $_FILES['video3']['name']!=""){
				if($_FILES['video3']['error'] != 0){
					$this->form_validation->set_message('file_check_video_3', 'The video file is corrupted. Cannot proceed');
					return false;
				}
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check_video_3', 'Please select only mp4 file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_video_3', 'Please choose a file image to upload.');
				return false;
			}
		}	
		public function file_check_group_photo(){
			// die('nice');
			if(!$this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
			$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$mime = get_mime_by_extension($_FILES['group_photo']['name']);
			if(isset($_FILES['group_photo']['name']) && $_FILES['group_photo']['name']!=""){
				if($_FILES['group_photo']['error'] != 0){
					$this->form_validation->set_message('file_check_group_photo', 'Image File Exceed 2MB');
					return false;
				}
				// if($width > 5000 && $height > 5000){
				// 	$this->form_validation->set_message('file_check_group_photo', 'Image Dimension Exceed 5000 x 5000');
				// 	return false;
				// }
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check_group_photo', 'Please select only gif/jpg/png file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_group_photo', 'Please choose a file image to upload.');
				return false;
			}
		}	
	}