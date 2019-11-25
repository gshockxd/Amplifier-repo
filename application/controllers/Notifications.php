<?php
    class Notifications extends CI_Controller {
        public function index (){
            $templates['title'] = 'Notifications';
            $data['notifications'] = $this->notification_model->get_notifications ();

            $this->load->view('inc/header-client', $templates);
            $this->load->view('notifications', $data);
            $this->load->view('inc/footer');
        }
    }