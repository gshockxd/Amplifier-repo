<?php 

	class Clients extends CI_Controller {	
		public function logout (){
			$this->Session_model->unset_user();
			redirect('profile');
		}
		public function login_attempt(){
			$this->Session_model->session_index_page ();
			$this->Login_model->login_attempt();
		}
		public function login(){
			$this->Session_model->session_index_page ();
			$this->Login_model->index();
		}
		public function register (){
			$this->Session_model->session_index_page ();
			$this->Register_model->index();
		}
		public function register_user(){
			$this->Session_model->session_index_page ();
			$this->Register_model->register_user();
		}
		public function profile(){
			// $this->Session_model->session_index_page ();
			$this->Profile_model->index();			
		}
		public function gallery(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_client();

			$this->C_gallery_model->index();
		}
		public function history(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_client();
			
			$this->History_model->index();
		}
		public function history_info(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_client();
			
			$this->History_model->history_info();
		}
		public function rate_event(){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();
			
			$this->C_rate_model->index();
		}
		public function rate_attempt(){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->C_rate_model->rate_attempt();
		}
		public function delete_event(){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Event_model->delete_event();
		}
		public function events (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Event_model->index();
		}
		public function event_created (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Event_model->event_created();			
		}
		public function event_info (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Event_model->event_info();
		}
		public function event_add (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Event_model->event_add();
		}
		public function event_add_attempt (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Event_model->event_add_attempt();
		}
		public function print_pdf(){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Event_model->print_pdf();
		}
		public function booking(){
			$this->Session_model->session_check();			
			$this->Session_model->user_type_check_client();
			
			$this->Booking_model->index();
		}
		public function booking_book_event(){
			$this->Session_model->session_check();			
			$this->Session_model->user_type_check_client();
			
			$this->Booking_model->booking_book_event();
		}
		public function booking_attempt(){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Booking_model->booking_attempt();
		}
		public function performer_profile_info (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->Profile_model->performer_profile_info();
		}
		public function performer_gallery (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_client();

			$this->C_gallery_model->performer_gallery();
		}
		public function calendar(){
			$this->Session_model->session_check();			
			$this->Session_model->user_type_check_client();
			
			$this->Calendar_model->index();
		}
		public function package(){
			$this->Session_model->session_check();			
			$this->Session_model->user_type_check_client();
			
			$this->Package_model->index();
		}
		public function chat(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_client();

			$this->C_chat_model->index();
		}
		public function chat_message(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_client();

			$this->C_chat_model->chat_message();
		}
		public function send_search_message (){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_client();

			$this->C_chat_model->send_search_message();			
		}
		public function profile_info(){
			$this->Session_model->session_check();			
			// $this->Session_model->user_type_check_client();
			
			$this->Profile_model->profile_info();
		}
		public function profile_edit_page(){
			$this->Session_model->session_check();			
			// $this->Session_model->user_type_check_client();
			
			$this->Profile_model->profile_edit_page();
		}
		public function profile_edit_info(){
			$this->Session_model->session_check();			
			// $this->Session_model->user_type_check_client();
			
			$this->Profile_model->profile_edit_info();
		}
		public function profile_password_edit_page(){
			$this->Session_model->session_check();			
			// $this->Session_model->user_type_check_client();
			
			$this->Profile_model->profile_password_edit_page();
		}
		public function profile_password_update(){
			$this->Session_model->session_check();			
			// $this->Session_model->user_type_check_client();
			
			$this->Profile_model->profile_password_update();
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
		function alpha_dash_space($str){
			if(!preg_match("/^([-a-z_. ])+$/i", $str)){
				$this->form_validation->set_message('alpha_dash_space', 'First name only accept letters');
				return FALSE;
			}else{
				return TRUE;
			}
		} 
		public function check_to_time(){
		
			$time_from = $this->input->post('duration');
			$time_to = $this->input->post('event_time');
			$event_time = date('H:i', strtotime('+1 hour', strtotime($time_from)));
			// echo $this->input->post('event_date') >= date('Y-m-d');
			// die;
			if($this->input->post('event_date') >= date('Y-m-d')){
				if(!$time_to){
					$this->form_validation->set_message('check_to_time', 'No Time is Selected');
					return FALSE;
				}else{
					if($event_time > $time_to){
						$this->form_validation->set_message('check_to_time', 'The minimum event duration is atleast 1 hour long');
						return FALSE;
					}
				}					
			}
		}
		public function check_date(){
			if($this->input->post('event_date') < date('Y-m-d')){
				$this->form_validation->set_message('check_date', 'Date selected is invalid');
				return FALSE;
			}else{			
				return TRUE;
			}
		}
	} 