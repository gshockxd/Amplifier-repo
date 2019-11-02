<?php
    class P_Pricing_Model extends CI_Model {
        public function index(){
			$templates['title'] = 'Pricing';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/pricing');
			$this->load->view('inc/footer');            
        }
        public function pricing_validate(){
            $this->form_validation->set_rules('name', 'Package Name', 'required', array('required'=>'Please Input Package Name'));
            $this->form_validation->set_rules('price', 'Price Offer', 'required|numeric|greater_than[4]', array('required'=>'Please Input Price', 'numeric'=>'Please input a valid Price', 'greater_than'=>'Price is greater or equal to 5'));
            $this->form_validation->set_rules('desc', 'Description', 'required', array('required'=>'Please Input Description'));

            $data['name'] = $this->input->post('name');
            $data['price'] = $this->input->post('price');
            $data['desc'] = $this->input->post('desc');

            if($this->form_validation->run() === FALSE){
                $templates['title'] = 'Pricing';

                $this->load->view('inc/header-performer', $templates);
                $this->load->view('performer/pricing', $data);
                $this->load->view('inc/footer');
            }else{
                $id = $this->p_pricing_model->pricing_insert();
                
                $this->session->set_flashdata('success_message', 'Package Name: '.$this->input->post('name').' has been successfully added!');
                redirect('p_pricing');
            }
        }
        public function pricing_insert(){
            $timestamp = date('Y-m-d H:i:s');
            $data = array(
                'package_id' => null,
                'package_name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'details' => $this->input->post('desc'),
                'owner' => $this->session->userdata('user_id'),
                'booked' => 0,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
            $this->db->insert('packages', $data);
            return $this->db->insert_id();
        }
    }