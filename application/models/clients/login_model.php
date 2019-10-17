<?php
    class Login_Model extends CI_Model {
        public function index (){
            if($this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Login';
			
			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('client/login');
			$this->load->view('inc/footer');
        }
        public function login_attempt (){            
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
    }