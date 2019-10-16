<?php  
    class Profile_Model extends CI_Model {
        public function index (){
			$templates['title'] = 'AMPLIFIER';
			
			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile');
			$this->load->view('inc/footer');            
		}        
		public function profile_password_edit_page(){			
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Change Password';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile_password_edit_page');
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
				$this->load->view('client/profile_password_edit_page');
				$this->load->view('inc/footer');
			}else{
				$check = $this->client_model->profile_update_password($data);
				if($check === FALSE){
					$this->session->set_flashdata('pass_old_not_matched', 'Current Password Not Matched');
					redirect('clients/profile_password_edit_page');
				}else{
					$this->session->set_flashdata('pass_matched', 'Password Has Been Updated!');
					redirect('clients/profile_password_edit_page');
				}
			}
		}
		public function profile_edit_page(){			
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Profile Edit';

			$users['users'] = $this->client_model->get_user($this->session->userdata('email'));

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile_edit', $users);
			$this->load->view('inc/footer');
		}
        public function profile_info (){            
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Profile Information';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile_info');
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
    }