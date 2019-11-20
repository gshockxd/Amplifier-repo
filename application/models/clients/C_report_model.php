<?php 
    class C_Report_model extends CI_Model {
        public function index(){
            $templates['title'] = 'Report Event';
            $data['report'] = $this->C_report_model->get_event();

            $this->load->view('inc/header-client', $templates);
            $this->load->view('client/report-event', $data);
            $this->load->view('inc/footer');
        }
        public function report_attempt(){
            $templates['title'] = 'Report Event';
            $data['report'] = $this->C_report_model->get_event();

            $this->form_validation->set_rules('desc', 'Description', 'required', array('required'=>'Please Input Description'));
            $this->form_validation->set_rules('userfile', 'Report Photo', 'callback_file_check');
            $this->form_validation->set_rules('uservideo', 'Report Video', 'callback_file_check_user_video');

            $data['desc'] = $this->input->post('desc');

            // echo '<pre>';
            // print_r($_FILES);
            // echo '</pre>';
            // die;

            if($this->form_validation->run() === FALSE){
                $this->load->view('inc/header-client', $templates);
                $this->load->view('client/report-event', $data);
                $this->load->view('inc/footer');
            }else{
                
            }
        }
        public function get_event(){
            $id = $this->uri->segment(2);
            $user_id = $this->session->userdata('user_id');
            $query = $this->db->query("SELECT * FROM bookings WHERE booking_id = $id AND client_id = $user_id ");
            return $data = $query->row_array();
            // die;
        }
    }