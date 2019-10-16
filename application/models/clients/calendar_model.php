<?php
    class Calendar_Model extends CI_Model {
        public function index (){
            if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'Calendar';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/calendar');
			$this->load->view('inc/footer');
        }        
    }