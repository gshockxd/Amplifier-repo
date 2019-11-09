<?php
    class Admin extends CI_Controller {
		public function chat(){
			$this->session_model->session_check();		
            $this->session_model->user_type_check_admin();

			$this->a_chat_model->index();
		}
		public function chat_message(){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_admin();

			$this->a_chat_model->chat_message();
		}
		public function send_search_message (){
			$this->session_model->session_check();		
			$this->session_model->user_type_check_admin();

			$this->a_chat_model->send_search_message();			
		}
    }