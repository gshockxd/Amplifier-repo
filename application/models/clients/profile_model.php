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
				$check = $this->profile_model->profile_update_password($data);
				if($check === FALSE){
					$this->session->set_flashdata('danger_message', 'Current Password Not Matched');
					redirect('profile_password_edit_page');
				}else{
					$this->session->set_flashdata('success_message', 'Your Password Has Been Updated!');
					redirect('profile_password_edit_page');
				}
			}
		}
		public function profile_edit_page(){			
			if(!$this->session->userdata('user_id')){
				redirect('profile');
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

				$this->profile_model->profile_update($client_image);
				$session_user = $this->profile_model->user_select($this->session->userdata('email'));	
				$this->session_model->session_user($session_user);
				$this->session->set_flashdata('success_message', 'Your profile has been updated!');		
	
				redirect('profile_info'); 
				// hi;
			}
		}	
        public function profile_update_password($data){
            $condition =  array('email'=> $this->session->userdata('email'), 'password' => $data['passOld']);
            $query = $this->db->get_where('users',$condition);
			$profile = $query->row_array();
			// echo $this->session->userdata('email');
			// echo $data['passOld'];
			// echo $this->db->last_query();
			// print_r($profile);
			// die;
            if(!$profile){
                return FALSE;
            }else{
                $data = array(
                    'password' => $data['pass']
                );
                $this->db->set($data);
                $this->db->where($condition);
                $this->db->update('users');
                // echo $this->db->last_query();
                // die();
            }      
		}		
        public function profile_update($client_image){
            $date = date('Y-m-j H:i:s');
            // die();
            $data = array(
                'username'=> $this->input->post('uname'),
                'fname'=> $this->input->post('fname'),
                'lname'=> $this->input->post('lname'),
                'address'=> $this->input->post('address'),
                'photo'=> $client_image,
                'telephone_1'=> $this->input->post('number1'),
                'telephone_2'=> $this->input->post('number2'),
                'updated_at' => $date,
            );

            $this->db->set($data);
            $this->db->where(array('email' => $this->session->userdata('email'), 'user_id' => $this->session->userdata('user_id')));
            return $this->db->update('users');
            // print_r($this->db->last_query());
            // die('here');
        } 
        public function user_select($email){
            $query = $this->db->get_where('users', array('email'=>$email));
            return $query->row_array();
        }
    }