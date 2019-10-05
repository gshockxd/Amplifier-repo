<?php 

	class Clients extends CI_Controller {
		public function register (){
			$templates['title'] = 'Client Registration';

			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('client/register');
			$this->load->view('inc/footer');
		}
		public function profile(){
			$templates['title'] = 'Client Profile';
			
			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/profile');
			$this->load->view('inc/footer');
		}
		public function ff(){

		}
	}