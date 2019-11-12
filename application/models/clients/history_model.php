<?php 
    class History_Model extends CI_Model {
        public function index (){
			$templates['title'] = 'History';

			$data['history'] = $this->History_model->get_bookings_user();

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/history', $data);
			$this->load->view('inc/footer');            
		}        
		public function get_bookings_user(){
			$query = $this->db->get_where('bookings', array('client_id'=>$this->session->userdata('user_id')));
			$data = $query->result_array();
			
			foreach($data as $d){
				$system_date_time = strtotime(date('Y-m-d H:i:s'));
				$sql_date_time = strtotime($d['event_date'].' '.$d['event_to']);

				// TESTING
				if($system_date_time >= $sql_date_time){
					$past_event[] = $d;	
				}
			}
			if(isset($past_event)){
				return $past_event;
			}else{
				return FALSE;
			}
		}
		public function history_info(){
			$templates['title'] = 'History Event Info';
			$data['history'] = $this->History_model->get_event();

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/history_info', $data);
			$this->load->view('inc/footer');
		}
		public function get_event(){
			$query = $this->db->get_where('bookings', array('booking_id'=>$this->uri->segment(2)));
			$data = $query->row_array();

			if($data){
				return $data;
			}else{
				$this->session->set_flashdata('danger_message', 'The history info your trying to access is not found');
				redirect('history_client');
			}
		}
    }