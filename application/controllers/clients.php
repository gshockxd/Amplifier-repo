<?php 

	class Clients extends CI_Controller {
		public function user_register(){
			$templates['title'] = 'Client Registration';
			$this->form_validation->set_rules('uname', 'Username', 'required', array('required' => 'Plese Input Username'));

			$this->form_validation->set_rules('fname', 'First Name', 'required|alpha', array('required' => 'Please Input First Name', 'alpha'=>'First Name not valid, letters only'));
			$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha', array('required' => 'Please input Last Name', 'alpha'=>'Last Name not valid, letters only'));
			$this->form_validation->set_rules('number1', 'Contact Number', 'required|numeric', array('required' => 'Please input contact number', 'numeric'=>'Please input a valid Contact Number'));
			$this->form_validation->set_rules('number2', 'Contact Number', 'required|numeric', array('required' => 'Please input contact number', 'numeric'=>'Please input a valid Contact Number'));
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]', array('required' => 'Please input Email Address', 'valid_email'=>'Email Address not valid'));
			$this->form_validation->set_rules('pass', 'Password', 'required', array('required' => 'Please input Password'));
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[pass]', array('matches'=>'Password not matched'));
			$this->form_validation->set_rules('userfile', 'Userfile', 'callback_file_check');
			$this->form_validation->set_rules('address', 'Address', 'required', array('required'=>'Please input address'));

			$data['uname'] = $this->input->post('uname');
			$data['fname'] = $this->input->post('fname');
			$data['lname'] = $this->input->post('lname');
			$data['number1'] = $this->input->post('number1');
			$data['number2'] = $this->input->post('number2');
			$data['email'] = $this->input->post('email');
			$data['userfile'] = $this->input->post('userfile');
			$data['address'] = $this->input->post('address');
			$data['pass'] = $this->input->post('pass');


			if($this->form_validation->run() == FALSE){
				$this->load->view('inc/header-client', $templates);
				$this->load->view('client/register', $data);
				$this->load->view('inc/footer');
			}else{
				$timestamp = date('Y_m_d_H_i_s');
				$array = explode('.', $_FILES['userfile']['name']);
				$ext = end($array);

				// Upload Image
				$config['file_name'] = $timestamp.'.'.$ext;
				$config['upload_path'] = './assets/img/client';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '50000';
				$config['max_height'] = '50000';
	
				$this->load->library('upload', $config);
	
				if(!$this->upload->do_upload()){
					$errors = array ('error' => $this->upload->display_errors());
					$client_image = 'assets/img/client/no_image.jpg';
				}else{
					$data = array ('upload_data' => $this->upload->data());
					$client_image = 'assets/img/client/'.$timestamp.'.'.$ext;
				
					// print_r($config['file_name']);
					// print_r($);
					// die();

				}

				$this->client_model->create_user($client_image);
				$session_user = $this->client_model->get_user($this->input->post('email'));
				$this->session_model->session_user($session_user);

				$this->session->set_flashdata('user_created', 'User '.$this->input->post('username').'has been added!');
				redirect('clients/profile');
			}

		}
		public function logout (){
			$this->session_model->unset_user();
			redirect('clients/profile');
		}
		public function user_login(){
			$templates['title'] = 'Client Login';

			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email', array('required'=>'Email address is required', 'valid_email'=>'Email address not valid'));
			$this->form_validation->set_rules('pass', 'Password', 'required', array('required'=>'Password is required'));
			
			$data['email'] = $this->input->post('email');
			$data['pass'] = $this->input->post('pass');

			if($this->form_validation->run() == FALSE){
				$this->load->view('inc/header-no-navbar', $templates);
				$this->load->view('client/login', $data);
				$this->load->view('inc/footer');
			}else{
				$hash_pass = md5($data['pass']);
				$query = $this->client_model->user_login($data['email'], $hash_pass);
				// print_r($query);
				// die();
				
				if(!$query){
					$this->session->set_flashdata('user_not_matched', 'Invalid Email address or Password');
					$this->session->set_flashdata('email', $this->input->post('email'));
					redirect('clients/login');
				}else{
					// echo $query['password'];
					// die;
					$this->session_model->session_user($query);
					$this->session->set_flashdata('user_logged_in', 'Welcome back '.$this->session->userdata('username').'.');

					redirect ('clients/profile');
				}
			}
		}
		public function login(){
			if($this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Client Login';
			
			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('client/login');
			$this->load->view('inc/footer');
		}
		public function register (){
			if($this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
			$templates['title'] = 'Client Registration';

			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('client/register');
			$this->load->view('inc/footer');
		}
		public function profile(){
			$templates['title'] = 'Client Profile';
			
			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile');
			$this->load->view('inc/footer');
		}
		public function history(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Client History';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/history');
			$this->load->view('inc/footer');
		}
		public function booking(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Client Booking';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/booking');
			$this->load->view('inc/footer');
		}
		public function calendar(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Client Calendar';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/calendar');
			$this->load->view('inc/footer');
		}
		public function package(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Client Package';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/package');
			$this->load->view('inc/footer');
		}
		public function chat(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Client Chat';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/chat/chat');
			$this->load->view('inc/footer');
		}
		public function chat_new(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'New Message';

			$users['users'] = $this->client_model->get_users();
			// $users['users'] = json_encode([$temp]);
			
			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/chat/chat_new', $users);
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
			$this->form_validation->set_rules('userID', 'User ID', 'required', array('required'=> "User Not Found")); 
			$this->form_validation->set_error_delimiters('', '');

			if($this->form_validation->run() === FALSE){
				$templates['title'] = 'New Message';

				$users['users'] = $this->client_model->get_users();

				$this->load->view('inc/header-client', $templates);
				$this->load->view('client/chat/chat_new', $users);
				$this->load->view('inc/footer');
			}else{

			}
		}
		public function profile_password_update_view(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Change Password';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile_password_update_view');
			$this->load->view('inc/footer');
		}
		public function profile_password_update(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Change Password';

			$this->form_validation->set_rules('passOld', 'Old Password', 'required', array('required'=> 'Please Input Old Password'));
			$this->form_validation->set_rules('pass', 'Password', 'required', array('required'=> 'Please Input Password'));
			$this->form_validation->set_rules('passConf', 'Confirm Password', 'required|matches[pass]', array('required'=> 'Please Input Confirm Password', 'matches'=>'Password Not Matched'));

			$data['passOld'] = md5($this->input->post('passOld'));
			$data['pass'] = md5($this->input->post('pass'));

			if($this->form_validation->run() === FALSE){
				$this->load->view('inc/header-client', $templates);
				$this->load->view('client/profile_password_update_view');
				$this->load->view('inc/footer');
			}else{
				$check = $this->client_model->profile_update_password($data);
				if($check === FALSE){
					$this->session->set_flashdata('pass_old_not_matched', 'Current Password Not Matched');
					redirect('clients/profile_password_update_view');
				}else{
					$this->session->set_flashdata('pass_matched', 'Password Has Been Updated!');
					redirect('clients/profile_password_update_view');
				}
			}

		}
		public function profile_info(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Profile Information';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile_info');
			$this->load->view('inc/footer');
		}
		public function profile_edit(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Profile Edit';

			$users['users'] = $this->client_model->get_user($this->session->userdata('email'));

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile_edit', $users);
			$this->load->view('inc/footer');
		}
		public function profile_edit_info(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Edit Profile';

			$this->form_validation->set_rules('uname', 'Username', 'required', array('required' => 'Plese Input Username'));
			$this->form_validation->set_rules('fname', 'First Name', 'required|alpha', array('required' => 'Please Input First Name', 'alpha'=>'First Name not valid, letters only'));
			$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha', array('required' => 'Please input Last Name', 'alpha'=>'Last Name not valid, letters only'));
			$this->form_validation->set_rules('number1', 'Contact Number', 'required|numeric', array('required' => 'Please input contact number', 'numeric'=>'Please input a valid Contact Number'));
			$this->form_validation->set_rules('number2', 'Contact Number', 'required|numeric', array('required' => 'Please input contact number', 'numeric'=>'Please input a valid Contact Number'));
			$this->form_validation->set_rules('userfile', 'Userfile', 'callback_file_check_update');
			$this->form_validation->set_rules('address', 'Address', 'required', array('required'=>'Please input address'));

			$data['uname'] = $this->input->post('uname');
			$data['fname'] = $this->input->post('fname');
			$data['lname'] = $this->input->post('lname');
			$data['number1'] = $this->input->post('number1');
			$data['number2'] = $this->input->post('number2');
			$data['userfile'] = $this->input->post('userfile');
			$data['address'] = $this->input->post('address');

			if($this->form_validation->run() == FALSE){
				$this->load->view('inc/header-client', $templates);
				$this->load->view('client/profile_edit', $data);
				$this->load->view('inc/footer');
			}else{
				$timestamp = date('Y_m_d_H_i_s');
				$array = explode('.', $_FILES['userfile']['name']);
				$ext = end($array);
				$folder = 'C:/xampp/htdocs/Amplifier-repo/';
				$path = $folder.$this->session->userdata('photo');	
				$copyFolder = 'C:/xampp/htdocs/Amplifier-repo/assets/img/client/';
				$extFile = pathinfo($path);

				// If there is no new photo upload
				$newfile = $copyFolder.$extFile['filename'].'_temp.'.$extFile['extension'];
				copy($path, $newfile);
				// Unlinking/Deleting Profile picture	
				if($temp = $this->session->userdata('photo') != 'assets/img/client/no_image.jpg'){
					unlink($path);	
					// die('delete');
				}
				// Copy temp file
				copy($newfile, $path);
				unlink($newfile);	
				
				// Upload Image
				$config['file_name'] = $timestamp.'.'.$ext;
				$config['upload_path'] = './assets/img/client';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '50000';
				$config['max_height'] = '50000';
					
				$this->load->library('upload', $config);	
				if(!$this->upload->do_upload()){
					$errors = array ('error' => $this->upload->display_errors());
					$client_image = $this->session->userdata('photo');
				}else{
					$data = array ('upload_data' => $this->upload->data());
					$client_image = 'assets/img/client/'.$timestamp.'.'.$ext;
					// Unlinking/Deleting old Profile picture 	
					if($temp = $this->session->userdata('photo') != 'assets/img/client/no_image.jpg'){
						unlink($path);	
						// die('delete');
					}
				}

				$this->client_model->update_user($client_image);
				$session_user = $this->client_model->get_user($this->session->userdata('email'));	
				$this->session_model->session_user($session_user);
				$this->session->set_flashdata('user_updated', 'User '.$this->session->userdata('username').' has been updated!');		
	
				redirect('clients/profile_info');
			}

		}
		public function file_check(){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
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
	}