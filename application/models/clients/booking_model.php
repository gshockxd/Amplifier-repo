<?php
    class Booking_Model extends CI_Model {
        public function index (){
			$data['packages'] = $this->booking_model->get_packages();

			$templates['title'] = 'Booking';
			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/booking', $data);
			$this->load->view('inc/footer');            
		}        
		public function booking_book_event(){
			$id = $this->uri->segment(2);
			
			$this->db->where('package_id', $id);
			$temp = $this->db->get('packages');
			$data['package'] = $temp->row_array();
			
			$templates['title'] = 'Booking';
			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/booking_add_event', $data);
			$this->load->view('inc/footer');
		}
		public function booking_attempt(){
			$id = $this->uri->segment(2);			
			$this->db->where('package_id', $id);
			$this->db->join('users', 'users.user_id = packages.owner');
			$this->db->select('packages.*, users.*');
			$temp = $this->db->get('packages');
			$data['package'] = $temp->row_array();

			// echo '<pre>';
			// print_r($data['package']);
			// echo '</pre>';
			// die;

			$this->form_validation->set_rules('event_name', '', 'required', array('required'=>'Please Input Event Name'));
			$this->form_validation->set_rules('event_date', '', 'required', array('required'=>'No Date Selected'));
			$this->form_validation->set_rules('event_time', '', 'required', array('required'=>'No Time Selected'));
			$this->form_validation->set_rules('duration', '', 'required', array('required'=>'No Time Selected'));
			// $this->form_validation->set_rules('full_payment', '', 'required|numeric', array('required'=>'Please Input Payment', 'numeric'=> 'Please Input a valid amount'));
			$this->form_validation->set_rules('down_payment', '', 'required|numeric', array('required'=>'Please Input Payment', 'numeric'=> 'Please Input a valid amount'));
			$this->form_validation->set_rules('location', '', 'required', array('required'=>'Location is required'));
			$this->form_validation->set_rules('notes', '', 'required', array('required'=>'Notes is required'));

			$data['event_name'] = $this->input->post('event_name');
			$data['event_date'] = $this->input->post('event_date');
			$data['event_time'] = $this->input->post('event_time');
			$data['duration'] = $this->input->post('duration');
			$data['full_payment'] = $this->input->post('full_payment');
			$data['down_payment'] = $this->input->post('down_payment');
			$data['location'] = $this->input->post('location');
			$data['notes'] = $this->input->post('notes');

			if($this->form_validation->run() === FALSE){
				$templates['title'] = 'Book Event';

				$this->load->view('inc/header-client', $templates);
				$this->load->view('client/booking_add_event', $data);
				$this->load->view('inc/footer');
			}else{
				$book_id = $this->booking_model->event_insert($data['package']);

				$this->session->set_flashdata('success_message', 'Event '.$data['event_name'].' has been successfully booked!');
				redirect('booking');
			}
		}
		public function event_insert($package){
			$timestamps = date('Y-m-d');
			$data = array(
				'client_id'=> $this->session->userdata('user_id'),
				'performer_id'=> $package['owner'],
				'package_id'=> $package['package_id'],
				'venue_name'=> $this->input->post('location'),
				'event_date'=> $this->input->post('event_date'),
				'event_from'=> $this->input->post('duration'),
				'event_to'=> $this->input->post('event_time'),
				'notes'=> $this->input->post('notes'),
				'full_amount'=> 0,
				'down_payment'=> $this->input->post('down_payment'),
				'payment_status'=> 'dp',
				'date_booked'=> $timestamps,
				'event_name'=> $this->input->post('event_name'),
				'artist_type'=> $package['artist_type']
			);

			$this->db->insert('bookings', $data);
			$id = $this->db->insert_id();
			// echo $this->db->last_query();
			// die();

			$this->db->set('booked', 1);
			$this->db->where('package_id', $package['package_id']);
			$this->db->update('packages');
			return $id;
		}
		public function get_packages(){
			$this->db->where(array('booked'=> 0));
			$query = $this->db->get('packages');
			return $query->result_array();
		}
    }