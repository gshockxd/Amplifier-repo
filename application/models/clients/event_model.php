<?php
    class Event_Model extends CI_Model {
        public function index (){
            $data['bookings'] = $this->Event_model->get_bookings();
            $templates['title'] = 'Events';

            $this->load->view('inc/header-client', $templates);
            $this->load->view('client/events', $data);
            $this->load->view('inc/footer');
        }
        public function event_created(){
            $data['events'] = $this->Event_model->get_events();
            $templates['title'] = 'Created Events';
            
            $this->load->view('inc/header-client', $templates);
            $this->load->view('client/events_created', $data);
            $this->load->view('inc/footer');
        }
        public function event_info(){
            $id = $this->uri->segment(2);
            $data['event'] = $this->Event_model->get_event($id);

            if($data['event']){                
                $templates['title'] = 'Event '.$data['event']['event_name'];
                $this->load->view('inc/header-client', $templates);
                $this->load->view('client/event_info', $data);
                $this->load->view('inc/footer');
            }else{
                $this->session->set_flashdata('danger_message', 'The page your trying to access is not found!');
                redirect('c_events');
            }
        }
        public function print_pdf(){
            $event = $this->Event_model->get_event($this->uri->segment(2));

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
                redirect('c_events');
            }
        }
        public function get_bookings(){
            $query = $this->db->get_where('bookings', array('client_id'=> $this->session->userdata('user_id'), 'date_booked != '=> NULL));
            $data = $query->result_array();

            foreach($data as $d){
				$system_date_time = strtotime(date('Y-m-d H:i:s'));
				$sql_date_time = strtotime($d['event_date'].' '.$d['event_to']);
                if($system_date_time <= $sql_date_time){
                    $upcoming_events[] = $d;
                }
            }

            if(isset($upcoming_events)){
                return $upcoming_events;
            }else{
                return FALSE;
            }

        }
        public function get_event($id){
            $this->db->select('bookings.*, price');
            $this->db->join('packages', 'packages.package_id = bookings.package_id');
            $query = $this->db->get_where('bookings', array('booking_id'=> $id, 'client_id'=>$this->session->userdata('user_id')));
            $data = $query->row_array();
            if($data){
                return $data;
            }else{
                return FALSE;
            }
        }
        public function event_add (){
           $templates['title'] = 'Add Event';

           $this->load->view('inc/header-client', $templates);
           $this->load->view('client/event_add');
           $this->load->view('inc/footer');
        }
        public function event_add_attempt (){
            $this->form_validation->set_rules('event_name', 'Event Name', 'required', array('required'=>'Please input Event Name'));
            $this->form_validation->set_rules('event_date', 'Event Date', 'required', array('required'=>'Please input Event Date'));
            $this->form_validation->set_rules('from', 'From', 'required', array('required'=>'Please input From Time'));
            $this->form_validation->set_rules('to', 'To', 'required', array('required'=>'Please input To Time'));
            $this->form_validation->set_rules('down_payment', 'Full Payment', 'required|numeric', array('required'=>'Please input payment', 'numeric'=>'Please input a valid amount'));
            $this->form_validation->set_rules('location', 'Location', 'required', array('required'=>'Please input Location'));
            $this->form_validation->set_rules('notes', 'Notes', 'required', array('required'=>'Please input Description'));

            $data['event_name'] = $this->input->post('event_name');
            $data['event_date'] = $this->input->post('event_date');
            $data['from'] = $this->input->post('from');
            $data['to'] = $this->input->post('to');
            $data['down_payment'] = $this->input->post('down_payment');
            $data['location'] = $this->input->post('location');
            $data['notes'] = $this->input->post('notes');

            if($this->form_validation->run() === FALSE){
                $templates['title'] = 'Add Event';
                $this->load->view('inc/header-client', $templates);
                $this->load->view('client/event_add', $data);
                $this->load->view('inc/footer');
            }else{
                $id = $this->Event_model->event_insert();
                $this->session->set_flashdata('success_message', 'Event '.$data['event_name'].' successfully added');
                redirect('booking');
            }
        }
        public function delete_event(){
            $query = $this->db->get_where('bookings', array('booking_id'=>$this->uri->segment(2)));
            $data = $query->row_array();

            if($data){            
                $this->db->delete('bookings', array('booking_id'=>$this->uri->segment(2)));                
                $this->db->set('booked', 0);
                $this->db->where(array('package_id' => $data['package_id'], 'client_id'=>$this->session->userdata('user_id')));
                $this->db->update('packages');
    
                $this->session->set_flashdata('success_message', 'Event '.$data['event_name'].' has been successfully deleted!');    
                redirect('c_events');
                return;
            }else{
                $this->session->set_flashdata('danger_message', 'The page your trying to delete is not found');
                redirect('c_events');
            }
        }
        public function event_insert(){
            $date = date('Y-m-d');
            $timestamps = date('Y-m-d H:i:s');
            $data = array (
                'id' => null,
                'client_id' => $this->session->userdata('user_id'),
                'venue_name'=> $this->input->post('location'),
                'event_date'=>$this->input->post('event_date'),
                'event_from'=>$this->input->post('from'),
                'event_to'=>$this->input->post('to'),
                'down_payment' => $this->input->post('down_payment'),
                'notes' => $this->input->post('notes'),
                'status' => 'pending',
                'event_name' => $this->input->post('event_name'),
                'created_at' => $timestamps,
                'updated_at' => $timestamps
            );
            $this->db->insert('events', $data);
            $id = $this->db->insert_id();
            return $id;
        }
        public function get_events (){
            $query = $this->db->get_where('events', array('client_id'));
            return $query->result_array();
        }
        public function event_status_approve (){
            $query = $this->db->get_where('bookings', array('booking_id' => $this->uri->segment(2), 'performer_id'=>$this->session->userdata('user_id')));
            $data = $query->row_array();

            if($data){
                $this->db->set(array('status'=>'approve'));
                $this->db->where('booking_id', $this->uri->segment(2));
                $this->db->update('bookings');
                
                $notif['message'] = 'Your Event '.$data['event_name'].' has been approved by the artist';
                $notif['links'] = base_url().'events/'.$data['booking_id'];
                $notif['target_user_id'] = $data['client_id'];
                $this->notification_model->index($notif);
                
                $this->session->set_flashdata('success_message', 'Event '.$data['event_name'].' is successfully changed to Approved!');
                redirect('p_bookings');
            }else{
                $this->session->set_flashdata('danger_message', 'The event your trying to approve is not found!');
                redirect('p_bookings');
            }
        }
        public function event_status_decline (){            
            $query = $this->db->get_where('bookings', array('booking_id' => $this->uri->segment(2), 'performer_id'=>$this->session->userdata('user_id')));
            $data = $query->row_array();

            if($data){
                $this->db->set(array('status'=>'cancel'));
                $this->db->where('booking_id', $this->uri->segment(2));
                $this->db->update('bookings');

                $this->db->set(array('booked'=>0));
                $this->db->where(array('package_id'=>$data['package_id']));
                $this->db->update('packages');
                
                $this->session->set_flashdata('success_message', 'Event '.$data['event_name'].' is successfully changed to Decline!');
                redirect('p_bookings');
            }else{
                $this->session->set_flashdata('danger_message', 'The event your trying to decline is not found!');
                redirect('p_bookings');
            }
        }
    }