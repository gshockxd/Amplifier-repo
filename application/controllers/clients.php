<?php 

	class Clients extends CI_Controller {		
		public function register_user(){
			$this->register_model->register_user();
		}
		public function logout (){
			$this->session_model->unset_user();
			redirect('clients/profile');
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
		public function profile(){
			$this->profile_model->index();			
		}
		public function history(){
			$this->history_model->index();
		}
		public function booking(){
			$this->booking_model->index();
		}
		public function calendar(){
			$this->calendar_model->index();
		}
		public function package(){
			$this->package_model->index();
		}
		public function profile_info(){
			$this->profile_model->profile_info();
		}
		public function profile_edit_page(){
			$this->profile_model->profile_edit_page();
		}
		public function profile_edit_info(){
			$this->profile_model->profile_edit_info();
		}
		public function profile_password_edit_page(){
			$this->profile_model->profile_password_edit_page();
		}
		public function profile_password_update(){
			$this->profile_model->profile_password_update();
		}
		public function file_check(){
			die('nice');
			if(!$this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
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
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
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


		public function chat(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Chat';
			$data['get_users_chats'] = array($this->client_model->get_users_chats());

			
            // echo '<pre>';
            // // print_r($data1);
            // print_r($data['get_users_chats']);
            // echo '</pre>';
			// die();

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/chat/chat', $data);
			$this->load->view('inc/footer');
		}
		public function chat_new(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'New Message';

			$data['users'] = $this->client_model->get_name_only_users();
			$data['get_users_chats'] = array($this->client_model->get_users_chats());
			// $users['users'] = json_encode([$temp]);
			
			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/chat/chat_new', $data);
			$this->load->view('inc/footer');
		}
		public function chat_left(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'New Message';

			$users['users'] =$this->client_model->get_chats();

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/chat/chat_new', $users);
			$this->load->view('inc/footer');
		}
		public function chat_search(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$data['get_users_chats'] = array($this->client_model->get_users_chats());
			// print($_SERVER['REQUEST_METHOD']);
			// print_r($this->client_model->segment_url());
			// die;

			$this->form_validation->set_rules('userID', 'User ID', 'required', array('required'=> "User Not Found")); 
			$this->form_validation->set_error_delimiters('', '');

			// print_r (explode(", ",$this->input->post('userName')));
			// print_r($this->input->post());
			// die('herer');

			$data['userID'] = $this->input->post('userID');
			$data['user'] = $this->client_model->get_user_for_chat($data['userID']);
			$data['users'] = $this->client_model->get_name_only_users();
			$data['validate_user'] = $this->client_model->validate_user_name_in_compose_search();	
			$data['userName'] = explode(", ",$this->input->post('userName'));

			if($this->form_validation->run() === FALSE){
				$templates['title'] = 'New Message';

				// die();

				$this->load->view('inc/header-client', $templates);
				$this->load->view('client/chat/chat_new', $data);
				$this->load->view('inc/footer');
			}else{
				if($this->input->post('search') == 'search'){
					if($data['validate_user'] == NULL){
						$templates['title'] = 'New Message';
						$this->session->set_flashdata('user_not_found', 'User Not Found');
						
						$this->load->view('inc/header-client', $templates);
						$this->load->view('client/chat/chat_new', $data);
						$this->load->view('inc/footer');
					}else{
						$templates['title'] = 'New Message For '.$data['user']['fname'].' '.$data['user']['lname'] ;
		
						$this->load->view('inc/header-client', $templates);
						$this->load->view('client/chat/chat_compose', $data);
						$this->load->view('inc/footer');
					}
				}else if($this->input->post('send') == 'send'){
					$this->form_validation->set_rules('message', 'Message', 'required', array('required'=>'Please Input Message'));

					if($this->form_validation->run() === FALSE){
						$templates['title'] = $data['user']['fname'].' '.$data['user']['lname'];
						$data['chats'] = $this->client_model->get_user_chats($data['userID']);

						// print_r($data['user']);
						// die;
						
						$this->load->view('inc/header-client', $templates);
						$this->load->view('client/chat/chat_compose_with_message', $data);
						$this->load->view('inc/footer');
					}else{
						$this->client_model->send_message();
						$templates['title'] = $data['user']['fname'].' '.$data['user']['lname'];

						$data['chats'] = $this->client_model->get_user_chats($data['userID']);
						// die();
						$this->load->view('inc/header-client', $templates);
						$this->load->view('client/chat/chat_compose_with_message', $data);
						$this->load->view('inc/footer');
					}

				}else{
					$templates['title'] = 'New Message';

					$this->load->view('inc/header-client', $templates);
					$this->load->view('client/chat/chat_new', $data);
					$this->load->view('inc/footer');
				}
			}
		}
		public function click_user_left(){
			$data['userID'] = $user_id = $_GET['user_id'];
			
			
			$data['get_users_chats'] = array($this->client_model->get_users_chats());
			$data['chats'] = $this->client_model->get_user_chats($data['userID']);
			$data['user'] = $this->client_model->get_user_for_chat($data['userID']);
			if(isset($data['get_users_chats'][0]['user_data'][0]) != NULL){
				$templates['title'] = $data['get_users_chats'][0]['user_data'][0]['fname'].' '.$data['get_users_chats'][0]['user_data'][0]['lname'];
			}else{
				$templates['title'] = 'Message';
			}
			

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/chat/chat_compose_with_message', $data);
			$this->load->view('inc/footer');

			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// die;
			
		}
	}