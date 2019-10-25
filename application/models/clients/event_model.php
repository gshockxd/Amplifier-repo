<?php
    class Event_Model extends CI_Model {
        public function index (){
            $data['bookings'] = $this->event_model->get_bookings();
            $templates['title'] = 'Events';

            $this->load->view('inc/header-client', $templates);
            $this->load->view('client/events', $data);
            $this->load->view('inc/footer');
        }
        public function event_info(){
            $id = $this->uri->segment(2);
            $data['event'] = $this->event_model->get_event($id);

            $templates['title'] = 'Event '.$data['event']['event_name'];
            $this->load->view('inc/header-client', $templates);
            $this->load->view('client/event_info', $data);
            $this->load->view('inc/footer');
        }
        public function get_bookings(){
            $query = $this->db->get_where('bookings', array('client_id'=> $this->session->userdata('user_id')));
            return $query->result_array();
        }
        public function get_event($id){
            $query = $this->db->get_where('bookings', array('booking_id'=> $id));
            return $query->row_array();
        }
    }