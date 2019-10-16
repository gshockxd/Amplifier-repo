<?php
    class Register_Model extends CI_Model {
        public function index (){
            if($this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
			$templates['title'] = 'Registration';

			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('client/register');
            $this->load->view('inc/footer');
        }
        public function register_user(){            
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
				$this->load->view('inc/header-no-navbar', $templates);
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

				$this->session->set_flashdata('success_profile_page_message', 'Hey '.$this->session->userdata('fname').' '.$this->session->userdata('lname').' welcome to AMPLIFER!');
				redirect('clients/profile');
			}
        }
    }