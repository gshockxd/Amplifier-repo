<?php
    class P_History_Model extends CI_Model {
        public function index (){            
            $templates['title'] = 'History';
            
            $data['bookings'] = $this->p_history_model->get_user_bookings();

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/history', $data);
			$this->load->view('inc/footer');
        }
        public function get_user_bookings (){
            $this->db->order_by('date_booked', 'DESC');
            $query = $this->db->get_where('bookings', array('performer_id'=>7));
            // $query = $this->db->get_where('bookings', array('performer_id'=>$this->session->userdata('user_id')));
            return $query->result_array();
        }
    }