<?php 
    class P_Package_Model extends CI_Model {
        public function index (){
            $templates['title'] = 'Package';
            
            $data['packages'] = $this->p_package_model->select_packages();

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/package', $data);
            $this->load->view('inc/footer');
        }
        public function select_packages(){
            $this->db->order_by('updated_at', 'DESC');
            $query = $this->db->get_where('packages', array('owner'=>$this->session->userdata('user_id'), 'booked'=> 0));
            return $query->result_array();
        }
        public function package_edit_page(){
            $id = $this->uri->segment(2);

            $query = $this->db->get_where('packages', array('package_id' => $id));
            $data = $query->row_array();
            
            if($data){            
                $templates['title'] = 'Edit Package '.$data['package_name'];
    
                $this->load->view('inc/header-performer', $templates);
                $this->load->view('performer/package-edit', $data);
                $this->load->view('inc/footer');
            }else{
                $this->session->set_flashdata('danger_message', 'The package your trying to edit is not found');
                redirect('p_package');
            }
        }
        public function package_update(){
			$this->form_validation->set_rules('package_name', 'Package Name', 'required' , array('required'=> 'Please Input Package Name'));
			$this->form_validation->set_rules('price', 'Package Price', 'required|numeric' , array('required'=> 'Please Input Package Price', 'numeric'=> 'Price contains only numbers'));
			$this->form_validation->set_rules('details', 'Package Description', 'required' , array('required'=> 'Please Input Package Description'));

			$data['package_name'] = $this->input->post('package_name');
			$data['price'] = $this->input->post('price');
            $data['details'] = $this->input->post('details');
            
            // print_r($this->input->post());
            // die;

			if($this->form_validation->run() === FALSE){
				$templates['title'] = 'Edit Package '.$this->input->post('name');
				$this->load->view('inc/header-performer', $templates);
				$this->load->view('performer/package-edit', $data);
				$this->load->view('inc/footer');
			}else{
                $id = $this->input->post('id');
                $timestamps = date('Y-m-d H:i:s');
				$data = array(
					'package_name' => $data['package_name'],
					'price' => $data['price'],
                    'details' => $data['details'],
                    'updated_at'=> $timestamps
                );
                $this->db->set($data);
                $this->db->where(array('owner'=> $this->session->userdata('user_id'), 'package_id'=>$id));
                $this->db->update('packages');
                // echo $this->db->last_query();
                // die();

				$this->session->set_flashdata('success_message', 'Package Name: '.$data['package_name'].' has been updated!');
				redirect('p_package');
            }
        }
        public function p_package_delete(){
            $id= $this->uri->segment(2);
            $this->db->where(array('package_id'=>$id, 'owner'=>$this->session->userdata('user_id')));
            $query = $this->db->get('packages');
            $data = $query->row_array();
            
            if(!$data){
                $this->session->set_flashdata('danger_message', 'The package your trying to delete is not found');
                redirect('p_package');
            }else{
                $this->db->where(array('package_id'=>$id, 'owner'=>$this->session->userdata('user_id')));
                $this->db->delete('packages');
                
                $this->session->set_flashdata('success_message', 'Package has been successfully Deleted!');
                redirect('p_package');
            }
        }
    }