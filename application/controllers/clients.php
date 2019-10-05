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
		public function history(){
			$templates['title'] = 'Client History';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/history');
			$this->load->view('inc/footer');
		}
		public function booking(){
			$templates['title'] = 'Client Booking';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/booking');
			$this->load->view('inc/footer');
		}
		public function calendar(){
			$templates['title'] = 'Client Calendar';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/calendar');
			$this->load->view('inc/footer');
		}
		public function package(){
			$templates['title'] = 'Client Package';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/package');
			$this->load->view('inc/footer');
		}
		public function chat(){
			$templates['title'] = 'Client Chat';

			$this->load->view('inc/header-client', $templates);
			$this->load->view('client/chat');
			$this->load->view('inc/footer');
		}
	}