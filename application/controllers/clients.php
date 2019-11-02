<?php 

	class Clients extends CI_Controller {	
		public function logout (){
			$this->session_model->unset_user();
			redirect('profile');
		}
		public function login_attempt(){
			$this->login_model->login_attempt();
		}
		public function login(){
			$this->login_model->index();
		}
		public function register (){
			$this->register_model->index();
		}
		public function register_user(){
			$this->register_model->register_user();
		}
		public function profile(){
			$this->profile_model->index();			
		}
		public function history(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_client();
			
			$this->history_model->index();
		}
		public function events (){
			$this->session_model->session_check();
			$this->session_model->user_type_check_client();

			$this->event_model->index();
		}
		public function event_info (){
			$this->session_model->session_check();
			$this->session_model->user_type_check_client();

			$this->event_model->event_info();
		}
		public function print_pdf(){
			$this->session_model->session_check();
			$this->session_model->user_type_check_client();

			$this->event_model->print_pdf();
		}
		public function booking(){
			$this->session_model->session_check();			
			$this->session_model->user_type_check_client();
			
			$this->booking_model->index();
		}
		public function booking_book_event(){
			$this->session_model->session_check();			
			$this->session_model->user_type_check_client();
			
			$this->booking_model->booking_book_event();
		}
		public function booking_attempt(){
			$this->session_model->session_check();
			$this->session_model->user_type_check_client();

			$this->booking_model->booking_attempt();
		}
		public function calendar(){
			$this->session_model->session_check();			
			$this->session_model->user_type_check_client();
			
			$this->calendar_model->index();
		}
		public function package(){
			$this->session_model->session_check();			
			$this->session_model->user_type_check_client();
			
			$this->package_model->index();
		}
		public function chat(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_client();

			$this->c_chat_model->index();
		}
		public function chat_message(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_client();

			$this->c_chat_model->chat_message();
		}
		public function send_search_message (){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_client();

			$this->c_chat_model->send_search_message();			
		}
		public function profile_info(){
			$this->session_model->session_check();			
			// $this->session_model->user_type_check_client();
			
			$this->profile_model->profile_info();
		}
		public function profile_edit_page(){
			$this->session_model->session_check();			
			// $this->session_model->user_type_check_client();
			
			$this->profile_model->profile_edit_page();
		}
		public function profile_edit_info(){
			$this->session_model->session_check();			
			// $this->session_model->user_type_check_client();
			
			$this->profile_model->profile_edit_info();
		}
		public function profile_password_edit_page(){
			$this->session_model->session_check();			
			// $this->session_model->user_type_check_client();
			
			$this->profile_model->profile_password_edit_page();
		}
		public function profile_password_update(){
			$this->session_model->session_check();			
			// $this->session_model->user_type_check_client();
			
			$this->profile_model->profile_password_update();
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
		public function file_check_update(){

			$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$mime = get_mime_by_extension($_FILES['userfile']['name']);
			if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
				if($_FILES['userfile']['error'] != 0){
					$this->form_validation->set_message('file_check_update', 'Image File Exceed 2MB');
					return false;
				}
				// if($width > 5000 && $height > 5000){
				// 	$this->form_validation->set_message('file_check_update', 'Image Dimension Exceed 5000 x 5000');
				// 	return false;
				// }
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check_update', 'Please select only gif/jpg/png file.');
					return false;
				}
			}else{
				return true;
			}
		}	
	} 