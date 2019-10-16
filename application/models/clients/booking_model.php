<?php
    class Booking_Model extends CI_Model {
        public function index (){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Booking';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/booking');
			$this->load->view('inc/footer');            
        }        
    }