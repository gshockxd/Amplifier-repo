<?php
    class Session_Model extends CI_Model {
        public function session_user ($data){
            $newdata = array(
                'user_id' => $data['user_id'],
                'user_type' => $data['user_type'],
                'username' => $data['username'],
                'fname'=>$data['fname'],
                'lname'=>$data['lname'],
                'email'=>$data['email'],
                'address'=>$data['address'],
                'photo' => $data['photo'],
                'telephone_1' =>$data['telephone_1'],
                'telephone_2' =>$data['telephone_2'],
                'offense' => $data['offense'],
                'report_count' => $data['report_count'],
                'date_registered' => $data['date_registered'],
                'date_updated' => $data['date_updated'],
                'password' => $data['password']
            );
            return $this->session->set_userdata($newdata);            
        }
        public function unset_user(){
            $data = array(
                'user_id' ,
                'user_type', 
                'username' ,
                'fname',
                'lname',
                'email',
                'address',
                'photo' ,
                'telephone_1', 
                'telephone_2' ,
            );
            return $this->session->unset_userdata($data);
        }
        
    }