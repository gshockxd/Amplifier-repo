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
        public function print_pdf(){
            $event = $this->event_model->get_event($this->uri->segment(2));

            if($event){
                $mpdf = new \Mpdf\Mpdf([
                    'mode' => 'utf-8',
                    // [width, height]
                    'format' => [150, 200],
                    'orientation' => 'P',
                    'img_dpi' => 300,
                ]);
                $mpdf->SetTitle($event['event_name']);
                $filename = $event['event_name'].'.pdf';
                $stylesheet = file_get_contents(base_url().'assets/css/pdf.css');
                $html = $this->load->view('client/event_pdf',[],true);
                $mpdf->writeHTML($stylesheet, 1);
                $mpdf->WriteHTML($html);
                $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE); // opens in browser
                //$mpdf->Output('test.pdf','D'); // it downloads the file into the user system.
            }else{
                $this->session->set_flashdata('danger_message', 'The event your trying to print is not found');
                redirect('events');
            }
        }
        public function get_bookings(){
            $query = $this->db->get_where('bookings', array('client_id'=> $this->session->userdata('user_id')));
            return $query->result_array();
        }
        public function get_event($id){
            $query = $this->db->get_where('bookings', array('booking_id'=> $id, 'client_id'=>$this->session->userdata('user_id')));
            $data = $query->row_array();
            if($data){
                return $data;
            }else{
                return FALSE;
            }
        }
    }