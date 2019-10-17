<?php
    class P_Register_Model extends CI_Model {
        public function index (){           
			$templates['title'] = 'Registration';

			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('performer/register');
			$this->load->view('inc/footer');
        }
        public function register(){
            $this->form_validation->set_rules('fname', 'First Name', 'required|alpha', array('required'=> 'Please Input First Name', 'alpha' => 'Please input letters only'));
            $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha', array('required'=> 'Please Input Last Name', 'alpha' => 'Please input letters only'));
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]', array('required'=> 'Please Input Emaill Address', 'valid_email'=> 'Please Input a Valid Email Address', 'is_unique'=>'Email Address is already registered'));
            $this->form_validation->set_rules('number', 'Contact Number', 'required|numeric|exact_length[11]', array('required'=> 'Please Input Contact Number', 'numeric'=>'Contact Number should be Numbers not Letters', 'exact_length'=>'Contact Number contains 11 numbers')); 
            $this->form_validation->set_rules('userfile', 'Profile Picture', 'callback_file_check');
            $this->form_validation->set_rules('photo', 'Choose Photo', 'callback_file_check');
            $this->form_validation->set_rules('desc', 'Description', 'required', array('required'=> 'Please Input Description'));
            die('here');

            $data['fname'] = $this->input->post('fname');
            $data['lname'] = $this->input->post('lname');
            $data['email'] = $this->input->post('email');
            $data['number'] = $this->input->post('number');
            $data['userfile'] = $this->input->post('userfile');
            $data['photo'] = $this->input->post('photo');
            $data['desc'] = $this->input->post('desc');

            if($this->form_validation->run() === FALSE){
                $templates = 'Registration';

                $this->load->view('inc/header-no-navbar', $templates);
                $this->load->view('performer/register', $data);
                $this->load->view('inc/footer');
            }
        }
        public function dfdf(){


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