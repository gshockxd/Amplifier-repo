<?php
    class Notification_Model extends CI_Model {
        public function index($notif){
            $date = date('Y-m-d');
            $array = array (
                'id' => null,
                'user_id' => $this->session->userdata('user_id'),
                'target_user_id' => $notif['target_user_id'],
                'notif_type' => 'user',
                'notif_status' => 'created',
                'status' => 'notified',
                'created_at' => $date,
                'notif_name' => $notif['message'],
                'links' => $notif['links']
            );
            $this->db->insert('notifications', $array);
            return $this->db->insert_id();
        }
        public function get_notifications (){
            $this->db->order_by('id', 'DESC');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->or_where('target_user_id', $this->session->userdata('user_id'));
            $query = $this->db->get('notifications');
            // $query = $this->db->get_where('notifications', array('user_id'=>$this->session->userdata('user_id')));
            $temp = $query->result_array();
            
            foreach($temp as $t){
                if($t['target_user_id'] == $this->session->userdata('user_id')){
                    $data[] = $t;
                }
            }
            if(isset($data)){
                return $data;
            }else{
                return FALSE;
            }
        }
        public function notification_badge (){
            // $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->or_where('target_user_id', $this->session->userdata('user_id'));
            $query = $this->db->get('notifications');
            $data = $query->result_array();
            return  count($data);
        }
    }