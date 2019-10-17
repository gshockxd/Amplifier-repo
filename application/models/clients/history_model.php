<?php 
    class History_Model extends CI_Model {
        public function index (){
			if(!$this->session->userdata('user_id')){
				redirect('clients/profile');
			}
			$templates['title'] = 'History';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/history');
			$this->load->view('inc/footer');            
        }        
    }