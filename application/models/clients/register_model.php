<?php
    class Register_Model extends CI_Model {
        public function index (){
            if($this->session->userdata('user_id')){
				// redirect('clients/profile');
			}
			$templates['title'] = 'Client Registration';

			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('client/register');
            $this->load->view('inc/footer');
        }
        public function register_user(){    
			$templates['title'] = 'Client Registration';
			$this->form_validation->set_rules('uname', 'Username', 'required', array('required' => 'Plese Input Username'));

			$this->form_validation->set_rules('fname', 'First Name', 'required|alpha', array('required' => 'Please Input First Name', 'alpha'=>'First Name not valid, letters only'));
			$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha', array('required' => 'Please input Last Name', 'alpha'=>'Last Name not valid, letters only'));
			$this->form_validation->set_rules('number1', 'Contact Number', 'required|numeric|exact_length[11]', array('required' => 'Please input contact number', 'numeric'=>'Please input a valid Contact Number', 'exact_length'=> 'Contact Number should be exactly 11 digits'));
			$this->form_validation->set_rules('number2', 'Contact Number', 'required|numeric|exact_length[11]', array('required' => 'Please input contact number', 'numeric'=>'Please input a valid Contact Number', 'exact_length'=> 'Contact Number should be exactly 11 digits'));
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]', array('required' => 'Please input Email Address', 'valid_email'=>'Email Address not valid', 'is_unique'=>'Email Address is already taken'));
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
				}

				$this->register_model->user_insert($client_image);
				$session_user = $this->register_model->user_select($this->input->post('email'));
				$this->session_model->session_user($session_user);

				$notif['message'] = 'Welcome '.$this->session->userdata('fname').' '.$this->session->userdata('lname').', now you can view or change your user information in profile page.';
				$notif['links'] = base_url().'profile_info';
				$this->notification_model->index($notif);

				$this->session->set_flashdata('success_message', 'Hey '.$this->session->userdata('fname').' '.$this->session->userdata('lname').' welcome to AMPLIFER!');
				
				redirect('profile');
			}
		}
		public function user_select($email){
            $query = $this->db->get_where('users', array('email'=>$email));
            return $query->row_array();
        }
		public function user_insert($performer_image){
            $date = date('Y-m-j H:i:s');
            $data = array(
                'user_id' => null,
                'user_type'=> $this->input->post('user_type'),
                'username'=> $this->input->post('uname'),
                'password' => md5($this->input->post('pass')),
                'status'=> 'verified',
                'fname'=> $this->input->post('fname'),
                'lname'=> $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address'=> $this->input->post('address'),
                'rate'=>0,
                'photo'=> $performer_image,
                'telephone_1'=> $this->input->post('number1'),
                'telephone_2'=> $this->input->post('number2'),
                'offense' => 0,
                'report_count' => 0,
                'media_fk' => null,
                'created_at' => $date,
				'updated_at' => $date
			);

            return $this->db->insert('users', $data);
        }
    }