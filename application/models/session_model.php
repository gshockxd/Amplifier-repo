<?php
    class Session_Model extends CI_Model {
        public function session_user ($data){
            $newdata = array(
                'user_id' => $data['user_id'],
                'user_type' => $data['user_type'],
                'username' => $data['username'],
                'password'=> $data['password'],
                'status'=> $data['status'],
                'fname'=>$data['fname'],
                'lname'=>$data['lname'],
                'email'=>$data['email'],
                'address'=>$data['address'],
                'photo' => $data['photo'],
                'telephone_1' =>$data['telephone_1'],
                'telephone_2' =>$data['telephone_2'],
                'offense' => $data['offense'],
                'report_count' => $data['report_count'],
                'media_fk'=> $data['media_fk'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
                'artist_type' => $data['artist_type'],
                'artist_desc' => $data['artist_desc']
            );
            return $this->session->set_userdata($newdata);            
        }
        public function unset_user(){
            $data = array(
                'user_id' ,
                'user_type' ,
                'username' ,
                'password',
                'status',
                'fname',
                'lname',
                'email',
                'address',
                'photo' ,
                'telephone_1' ,
                'telephone_2' ,
                'offense' ,
                'report_count' ,
                'media_fk',
                'created_at' ,
                'updated_at' ,
                'artist_type',
                'artist_desc'
            );
            return $this->session->unset_userdata($data);
        }
        public function user_type_check (){
            switch($this->session->userdata('user_type')){
                case 'admin':
                    redirect('users');
                    break;
                case 'client':
                    redirect('profile');
                    break;
                case 'performer':
                    redirect('p_profile');
                    break;
            }
        }
        public function session_check(){
            if(!$this->session->userdata('user_id')){
                $this->session->set_flashdata('danger_message', 'The page you trying to access requires login');
                redirect('profile');
            }
        }
        public function user_type_check_admin (){
            switch($this->session->userdata('user_type')){
                case 'client':
                    $this->session->set_flashdata('danger_message', 'The page your trying to access is invalid');
                    redirect('profile');
                    break;
                case 'performer':
                    $this->session->set_flashdata('danger_message', 'The page your trying to access is invalid');
                    redirect('p_profile');
                    break;
            }
        }
        public function user_type_check_client (){
            switch($this->session->userdata('user_type')){
                case 'admin':
                    $this->session->set_flashdata('danger_message', 'The page your trying to access is invalid');
                    redirect('users');
                    break;
                case 'performer':
                    $this->session->set_flashdata('danger_message', 'The page your trying to access is invalid');
                    redirect('p_profile');
                    break;
            }
        }
        public function user_type_check_performer (){
            switch($this->session->userdata('user_type')){
                case 'admin':
                    $this->session->set_flashdata('danger_message', 'The page your trying to access is invalid');
                    redirect('users');
                    break;
                case 'client':
                    $this->session->set_flashdata('danger_message', 'The page your trying to access is invalid');
                    redirect('profile');
                    break;
            }
        }
        
    }