<?php 
    class History_Model extends CI_Model {
        public function index (){
			if(!$this->session->userdata('user_id') || $this->session->userdata('user_type') != 'client'){
				redirect('profile');
			}
			$templates['title'] = 'History';

			$data['history'] = $this->history_model->get_bookings_user();

			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// die();

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/history', $data);
			$this->load->view('inc/footer');            
		}        
		public function get_bookings_user(){
			// $this->db->select('bookings.*, users.*, users.status as user_status');
			// $this->db->join('users', 'users.user_id = bookings.client_id');
			$this->db->order_by('event_date', 'DESC');
			$query = $this->db->get_where('bookings', array('client_id'=> 1));
			// $query = $this->db->get_where('bookings', array('client_id'=> $this->session->userdata('user_id')));
			return $query->result_array();			
		}
    }