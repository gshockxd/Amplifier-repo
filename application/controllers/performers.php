<?php
	class Performers extends CI_Controller {
		public function register (){
			$templates['title'] = 'Performer Registration';

			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('performer/register');
			$this->load->view('inc/footer');
		}
		public function portfolio(){
			$templates['title'] = 'Performer Portfolio';

			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('performer/portfolio');
			$this->load->view('inc/footer');
		}
		public function description(){
			$templates['title'] = 'Performer Description';

			$this->load->view('inc/header-no-navbar', $templates);
			$this->load->view('performer/description');
			$this->load->view('inc/footer');
		}
		public function profile(){
			$templates['title'] = 'Performer Profile';

			$this->load->view('inc/header', $templates);
			$this->load->view('performer/profile');
			$this->load->view('inc/footer');
		}
		public function history(){
			$templates['title'] = 'Performer History';

			$this->load->view('inc/header', $templates);
			$this->load->view('performer/history');
			$this->load->view('inc/footer');
		}
		public function pricing(){
			$templates['title'] = 'Performer Pricing';

			$this->load->view('inc/header', $templates);
			$this->load->view('performer/pricing');
			$this->load->view('inc/footer');
		}
		public function package(){
			$templates['title'] = 'Performer Package';

			$this->load->view('inc/header', $templates);
			$this->load->view('performer/package');
			$this->load->view('inc/footer');
		}
		public function chat(){
			$templates['title'] = 'Performer Chat';

			$this->load->view('inc/header', $templates);
			$this->load->view('performer/chat');
			$this->load->view('inc/footer');
		}
	}