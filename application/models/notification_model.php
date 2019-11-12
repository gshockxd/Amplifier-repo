<?php
    class Notification_Model extends CI_Model {
        public function index($notif){
            $date = date('Y-m-d H:i:s');
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
        public function get_notifications ($limit, $offset){

            if($limit){
                $this->db->limit($limit, $offset);
            }              
            $this->db->order_by('id', 'DESC');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->or_where('target_user_id', $this->session->userdata('user_id'));
            $query = $this->db->get('notifications');
            $temp = $query->result_array();            
            return $temp;

        }
        public function count_notifications (){
            $this->db->order_by('id', 'DESC');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->or_where('target_user_id', $this->session->userdata('user_id'));
            return $query = $this->db->count_all_results('notifications');
        }
        public function notification_badge (){
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('status', 'notified');
            $this->db->or_where('target_user_id', $this->session->userdata('user_id'));
            $query = $this->db->get('notifications');
            $data = $query->result_array();
            return  count($data);
        }
        public function notified_to_seen ($notifications){
            foreach($notifications as $n){
                if($n['status'] == 'notified'){
                    $this->db->set('status', 'seen');
                    $this->db->where(array('status'=>'notified', 'user_id'=>$this->session->userdata('user_id'), 'created_at'=>$n['created_at']));
                    $this->db->update('notifications');
                }else{

                }
            }
        }
    }