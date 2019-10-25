<?php
	class Performers extends CI_Controller {
		public function register (){
			$this->p_register_model->index();
		}
		public function register_attempt(){
			$this->p_register_model->register();
		}
		public function profile(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_performer();
			$templates['title'] = 'Profile';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/profile');
			$this->load->view('inc/footer');
		}
		public function bookings(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_performer();

			$this->p_booking_model->index();
		}
		public function pricing(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_performer();
			
			$this->p_pricing_model->index();
		}
		public function pricing_validate(){
			$this->session_model->session_check();
			$this->session_model->user_type_check_performer();

			$this->p_pricing_model->pricing_validate();
		}
		public function package(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_performer();

			$this->p_package_model->index();
		}
		public function package_edit_page(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_performer();

			$this->p_package_model->package_edit_page();
		}
		public function package_update(){
			$this->p_package_model->package_update();
		}
		public function p_package_delete(){
			$this->p_package_model->p_package_delete();
		}
		public function chat(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_performer();
			$templates['title'] = 'Chat';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/chat');
			$this->load->view('inc/footer');
		}
		public function file_check(){
			$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$mime = get_mime_by_extension($_FILES['userfile']['name']);
			if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
				if($_FILES['userfile']['error'] != 0){
					$this->form_validation->set_message('file_check', 'Image File Exceed 2MB');
					return false;
				}
				// if($width > 5000 && $height > 5000){
				// 	$this->form_validation->set_message('file_check', 'Image Dimension Exceed 5000 x 5000');
				// 	return false;
				// }
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check', 'Please choose a file image to upload.');
				return false;
			}
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