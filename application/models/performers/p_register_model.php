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
			$this->form_validation->set_rules('uname', 'Username', 'required', array('required'=> 'Please Input Username', 'alpha' => 'Please input letters only'));
			$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha', array('required'=> 'Please Input Last Name', 'alpha' => 'Please input letters only'));
			$this->form_validation->set_rules('address', 'Address', 'required', array('required'=> 'Please Input Address'));
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]', array('required'=> 'Please Input Emaill Address', 'valid_email'=> 'Please Input a Valid Email Address', 'is_unique'=>'Email Address is already registered'));
			$this->form_validation->set_rules('number1', 'Contact Number 1', 'required|numeric|exact_length[11]', array('required'=> 'Please Input Contact Number', 'numeric'=>'Contact Number should be Numbers not Letters', 'exact_length'=>'Contact Number contains 11 numbers')); 
			$this->form_validation->set_rules('number2', 'Contact Number 2', 'required|numeric|exact_length[11]', array('required'=> 'Please Input Contact Number', 'numeric'=>'Contact Number should be Numbers not Letters', 'exact_length'=>'Contact Number contains 11 numbers')); 
			$this->form_validation->set_rules('userfile', 'Profile Picture', 'callback_file_check');
			$this->form_validation->set_rules('group_photo', 'Group Photo', 'callback_file_check_group_photo');
			$this->form_validation->set_rules('video1', 'Video Sample 1', 'callback_file_check_video_1');
			$this->form_validation->set_rules('video2', 'Video Sample 2', 'callback_file_check_video_2');
			$this->form_validation->set_rules('video3', 'Video Sample 3', 'callback_file_check_video_3');
			$this->form_validation->set_rules('service', 'Service', 'required', array('required'=>'No Service Selected'));
            $this->form_validation->set_rules('desc', 'Description', 'required', array('required'=> 'Please Input Description'));

            $data['fname'] = $this->input->post('fname');
            $data['lname'] = $this->input->post('lname');
			$data['uname'] = $this->input->post('uname');
			$data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['number1'] = $this->input->post('number1');
            $data['number2'] = $this->input->post('number2');
			$data['service'] = $this->input->post('service');
			$data['desc'] = $this->input->post('desc');

            if($this->form_validation->run() === FALSE){
                $templates['title'] = 'Registration';

                $this->load->view('inc/header-no-navbar', $templates);
                $this->load->view('performer/register', $data);
                $this->load->view('inc/footer');
            }else{
				$timestamp = date('Y_m_d_H_i_s');
				$array = explode('.', $_FILES['userfile']['name']);
				$ext = end($array);

				// Upload Image
				$config['file_name'] = $timestamp.'.'.$ext;
				$config['upload_path'] = './assets/img/performer';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '50000';
				$config['max_height'] = '50000';
	
				$this->load->library('upload', $config);
	
				if(!$this->upload->do_upload()){
					$errors = array ('error' => $this->upload->display_errors());
					$performer_image = 'assets/img/performer/no_image.jpg';
				}else{
					$data = array ('upload_data' => $this->upload->data());
					$performer_image = 'assets/img/performer/'.$timestamp.'.'.$ext;			
				}

				$user_id = $this->p_register_model->user_insert($performer_image);
				$session_user = $this->p_register_model->user_select($this->input->post('email'));
				$this->session_model->session_user($session_user);

				$this->session->set_flashdata('success_message', 'Hey '.$this->session->userdata('fname').' '.$this->session->userdata('lname').' welcome to AMPLIFER!');

				redirect('p_profile');
			}
		}
		public function user_select($email){
            $query = $this->db->get_where('users', array('email'=>$email));
            return $query->row_array();
        }
		public function user_insert($client_image){
				$date = date('Y-m-j H:i:s');
				$data = array(
					'user_id' => null,
					'user_type'=> 'performer',
					'username'=> $this->input->post('uname'),
					'password' => md5($this->input->post('pass')),
					'status'=> 'pending',
					'fname'=> $this->input->post('fname'),
					'lname'=> $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'address'=> $this->input->post('address'),
					'rate'=>0,
					'photo'=> $client_image,
					'telephone_1'=> $this->input->post('number1'),
					'telephone_2'=> $this->input->post('number2'),
					'offense' => 0,
					'report_count' => 0,
					'media_fk' => null,
					'created_at' => $date,
					'updated_at' => $date,
					'artist_type' => $this->input->post('service'),
					'artist_desc' => $this->input->post('desc')
				);

				$this->db->insert('users', $data);
				return $new_user_id = $this->db->insert_id();
		}
		

        public function this_is_temporary(){
			foreach($_FILES as $f){	
				$array = explode('.', $f['name']);
				$ext = end($array);
				$allowed_mime_type_arr_image = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
				$mime = get_mime_by_extension($f['name']);					

				if(in_array($mime, $allowed_mime_type_arr_image)){
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
						echo '<pre>';
						print_r($userdata);
						echo '</pre>';
					}else{
						$userdata = array ('image_data' => $this->upload->data());
						$client_image = 'assets/img/client/'.$timestamp.'.'.$ext;
					
					}
				}else{
					//set preferences
					//file upload destination
					$config['upload_path'] = './assets/video/client';
					//allowed file types. * means all types
					$config['allowed_types'] = 'mp4';
					//allowed max file size. 0 means unlimited file size
					$config['max_size'] = '0';
					//max file name size
					$config['max_filename'] = '255';
					//whether file name should be encrypted or not
					$config['encrypt_name'] = FALSE;
					//store video info once uploaded
					$video_data = array();
					//check for errors
					$is_file_error = FALSE;
					//check if file was selected for upload
					if (!$f) {
						$is_file_error = TRUE;
						$this->handle_error('Select a video file.');							
					}
					//if file was selected then proceed to upload
					if (!$is_file_error) {
						//load the preferences
						$this->load->library('upload', $config);
						//check file successfully uploaded. 'video_name' is the name of the input
						if (!$this->upload->do_upload('userfile')) {
							//if file upload failed then catch the errors
							$temp = $this->upload->display_errors();
							echo $temp;
							$is_file_error = TRUE;
						} else {
							//store the video file info
							$video_data = $this->upload->data();
						}
					}
					// There were errors, we have to delete the uploaded video
					// if ($is_file_error) {
					// 	if ($video_data) {
					// 		$file = $upload_path . $video_data['file_name'];
					// 		if (file_exists($file)) {
					// 			unlink($file);
					// 		}
					// 	}
					// } else {
					// 	$data['video_name'] = $video_data['file_name'];
					// 	$data['video_path'] = $upload_path;
					// 	$data['video_type'] = $video_data['file_type'];
					// 	$this->handle_success('Video was successfully uploaded to direcoty <strong>' . $upload_path . '</strong>.');
					// }
				}

			}
        }
    }