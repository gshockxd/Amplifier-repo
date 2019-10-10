<?php

    class Client_Model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }
        public function create_user($client_image){
            $date = date('Y-m-j H:i:s');
            $data = array(
                'user_id' => null,
                'user_type'=> $this->input->post('user_type'),
                'username'=> $this->input->post('uname'),
                'password' => md5($this->input->post('pass')),
                'status'=> 'pending',
                'fname'=> $this->input->post('fname'),
                'lname'=> $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'email_verified_date' => null,
                'address'=> $this->input->post('address'),
                'rate'=>null,
                'photo'=> $client_image,
                'telephone_1'=> $this->input->post('number1'),
                'telephone_2'=> $this->input->post('number2'),
                'date_registered' => $date,
                'date_updated' => $date,
                'offense' => null,
                'report_count' => null,
                'media_fk' => null
            );
            // echo date('Y-m-j H:i:s');
            // die;

            return $this->db->insert('users', $data);
        }
        public function update_user($client_image){
            $date = date('Y-m-j H:i:s');
            $data = array(
                'username'=> $this->input->post('uname'),
                'fname'=> $this->input->post('fname'),
                'lname'=> $this->input->post('lname'),
                'address'=> $this->input->post('address'),
                'photo'=> $client_image,
                'telephone_1'=> $this->input->post('number1'),
                'telephone_2'=> $this->input->post('number2'),
                'date_updated' => $date,
            );

            $this->db->set($data);
            $this->db->where(array('email' => $this->session->userdata('email'), 'user_id' => $this->session->userdata('user_id')));
            return $this->db->update('users');
            // print_r($this->db->last_query());
            // die('here');
        }
        public function profile_update_password($data){
            $condition =  array('email'=> $this->session->userdata('email'), 'password' => $data['passOld']);
            $query = $this->db->get_where('users',$condition);
            $profile = $query->row_array();
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
        public function get_user($email){
            $query = $this->db->get_where('users', array('email'=>$email));
            return $query->row_array();
        }
        public function user_login ($email, $pass){
            $query = $this->db->get_where('users', array('email'=>$email, 'password' => $pass));
            return $query->row_array();
            // print_r($this->db->last_query());
        }
        public function get_users(){
            $query= $this->db->get('users');
            return $query->result_array();
        }
        public function get_chats(){
            $query= $this->db->get('chats');
            return $query->result->array();
        }
    }