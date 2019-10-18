<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('/admin/index');
	}

	public function users()
	{
		$this->load->model('model');
		$data["fetch_data_user"] = $this->model->fetch_data_user();
		$this->load->view('/admin/users', $data);
	}
	public function offense_count($id)
	{
		$this->load->model('model');
		$this->load->library('upload');
		if($this->input->post("offenseNo")=="1")
			{
				$date=date('y-m-d');
				$block_date=date_create($date);
				date_add($block_date, date_interval_create_from_date_string("3 days"));
				echo date_format($block_date,"y-m-d");
				$status="block";
			}
		if($this->input->post("offenseNo")=="2")
		{
			$date=date('y-m-d');
			$block_date=date_create($date);
			date_add($block_date, date_interval_create_from_date_string("30 days"));
			echo date_format($block_date,"y-m-d");
			$status="block";
		}
		if($this->input->post("offenseNo")=="3")
		{
			$status="banned";
			$block_date=date_create("0000-00-00");
		}
		$this->form_validation->set_rules("offenseNo", "offense number", 'numeric');
			$offense= array(
					"offense" => $this->input->post("offenseNo"),
					"block_end" => date_format($block_date,"y-m-d"),
					"status" => $status
					);

		$this->model->update_offense_user($offense);
		redirect(base_url() ."users");
	}
	public function ban($id)
	{
		$this->load->model('model');
		$this->load->library('upload');
		$status="banned";
		$ban= array("status" => $status);
		$this->model->update_ban_user($ban);
		redirect(base_url() ."users");
	}
	public function delete_user($id)
	{
		$this->load->model('model');
		$data["fetch_delete_user"] = $this->model->fetch_delete_user();
		redirect(base_url() ."users");
	}
	public function delete_report($id)
	{
		$this->load->model('model');
		$data["fetch_delete_report"] = $this->model->fetch_delete_report();
		redirect(base_url() ."reports");
	}
	public function delete_history($id)
	{
		$this->load->model('model');
		$data["fetch_delete_history"] = $this->model->fetch_delete_history();
		redirect(base_url() ."history");
	}
	public function delete_event($id)
	{
		$this->load->model('model');
		$data["fetch_delete_event"] = $this->model->fetch_delete_event();
		redirect(base_url() ."events");
	}
	public function delete_package($id)
	{
		$this->load->model('model');
		$data["fetch_delete_package"] = $this->model->fetch_delete_package();
		redirect(base_url() ."services");
	}

	public function profile($id)
	{
		$this->load->model('model');
		$data["fetch_data_profile"] = $this->model->fetch_data_profile();
		$this->load->view('/admin/profile',$data);
	}
	public function eventview($id)
	{
		$this->load->model('model');
		$data["fetch_data_event_detail"] = $this->model->fetch_data_event_detail();
		$this->load->view('/admin/eventview',$data);
	}

	public function events()
	{
		$this->load->model('model');
		$data["fetch_data_event"] = $this->model->fetch_data_event();
		$this->load->view('/admin/events', $data);
	}
	public function form_validation()
	{
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->form_validation->set_rules("fname", "first name", 'required|alpha');
		$this->form_validation->set_rules("lname", "last name", 'required|alpha');
		$this->form_validation->set_rules("password", "password", 'required|min_length[6]');
		$this->form_validation->set_rules("username", "username", 'required|min_length[6]');
		$this->form_validation->set_rules("contact_number", "contact number", 'required|integer|max_length[13]');
		$this->form_validation->set_rules("contact_number1", "contact number 2", 'integer|max_length[13]');
		$this->form_validation->set_rules("email", "email", 'required|valid_email');
		$this->form_validation->set_rules("usertype", "usertype", 'required');
		$this->form_validation->set_rules("usertype", "usertype", 'required');
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('pphoto');
		$file_name=$this->upload->data();

		if($this->form_validation->run())
		{
			$this->load->model("model");
			if($this->input->post("verify"))
			{
				$status = "verified";
			}else{
				$status ="pending";
			}

			$data_insert = array(
				"fname" => $this->input->post("fname"),
				"lname" => $this->input->post("lname"),
				"password" => $this->input->post("password"),
				"username" => $this->input->post("username"),
				"telephone_1" => $this->input->post("contact_number"),
				"telephone_2" => $this->input->post("contact_number1"),
				"email" => $this->input->post("email"),
				"user_type" => $this->input->post("usertype"),
				"address" => $this->input->post("address"),
				"status" => $status,
				"date_registered" => date('y-m-d'),
				"photo" => $this->input->post("pphoto"),
			);

			$this->model->insert_data_users($data_insert);
			redirect(base_url() ."users");
		}
		else
		{
			echo '<script> alert("invalid inputs, Try again");</script>';
			$this->load->model('model');
			$data["fetch_data_user"] = $this->model->fetch_data_user();
			$this->load->view('/admin/users', $data);
		}
	}
	public function form_validation_report()
	{
		$this->load->library('upload');
		$this->load->model("model");
			$data_insert = array(
				"booking_id" => $this->input->post("booking_id"),
				"report_from" => $this->input->post("report_from"),
				"report_to" => $this->input->post("violator"),
				"report_photo" => $this->input->post("evidence"),
				"report_details" => $this->input->post("report_info"),
			);

			$this->model->insert_data_report($data_insert);
			redirect(base_url() ."reports");
		
	}
	public function form_validation_event()
	{
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->form_validation->set_rules("client", "client", 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules("performer", "performer", 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules("dp", "dp", 'required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules("payment", "payment", 'required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules("date_event", "date event", 'required');
		$this->form_validation->set_rules("venue", "venue", 'required');
		$this->form_validation->set_rules("event_name", "event name", 'required');
		$this->form_validation->set_rules("time_event", "duration", 'required|greater_than_equal_to[0]');
		
		if($this->form_validation->run())
		{
			$this->load->model("model");

			if($this->input->post("approve"))
			{
				$status = "approve";
			}else{
				$status ="pending";
			}

			$data_insert = array(
				"client_id" => $this->input->post("client"),
				"performer_id" => $this->input->post("performer"),
				"event_name" => $this->input->post("event_name"),
				"down_payment" => $this->input->post("dp"),
				"full_amount" => $this->input->post("payment"),
				"event_time" => $this->input->post("time_event"),
				"event_date" => $this->input->post("date_event"),
				"venue_name" => $this->input->post("venue"),
				"notes" => $this->input->post("publicinfo"),
				"status" => $status,
				"date_booked" => date('y-m-d')
			);

			$this->model->insert_data_bookings($data_insert);
			redirect(base_url() ."events");
		}
		else
		{
			echo '<script> alert("invalid inputs, Try again");</script>';
			$this->load->model('model');
			$data["fetch_data_client"] = $this->model->fetch_data_client();	
			$data["fetch_data_perf"] = $this->model->fetch_data_perf();
			$this->load->view('/admin/addevent',$data);
		}
	
	}
	
	public function addevent()
	{
		$this->load->model('model');
		$data["fetch_data_client"] = $this->model->fetch_data_client();	
		$data["fetch_data_perf"] = $this->model->fetch_data_perf();
		$this->load->view('/admin/addevent',$data);
	}
	public function editprofile()
	{
		$this->load->view('/admin/editprofile');
	}
	public function services()
	{
		$this->load->model('model');
		$data["fetch_data_packages"] = $this->model->fetch_data_packages();
		$this->load->view('/admin/services', $data);
	}
	public function history()
	{
		$this->load->model('model');
		$data["fetch_data_history"] = $this->model->fetch_data_history();
		$this->load->view('/admin/history',$data);
	}
	public function histview($id)
	{
		$this->load->model('model');
		$data["fetch_data_histview"] = $this->model->fetch_data_histview();
		$this->load->view('/admin/histview',$data);
	}
	public function reports()
	{
		$this->load->model('model');
		$data["fetch_data_user"] = $this->model->fetch_data_user();
		$data["fetch_data_event"] = $this->model->fetch_data_event();
		$data["fetch_data_report"] = $this->model->fetch_data_report();
		$this->load->view('/admin/reports',$data);
	}
	public function notifications()
	{
		$this->load->view('/admin/notifications');
	}
	public function messages()
	{
		$this->load->view('/client/chat');
	}
	public function logout()
	{
		$this->load->view('/admin/logout');
	}




}
