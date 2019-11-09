<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function offense_count($id)
	{
		$this->load->model('model');
		$this->load->library('upload');
		if($this->input->post("offenseNo")=="1")
			{
				$date=date('y-m-d');
				$block_date	=date_create($date);
				date_add($block_date, date_interval_create_from_date_string("3 days"));
				echo date_format($block_date,"y-m-d");
				$status="block";
			}
		if($this->input->post("offenseNo")=="2")
		{
			$date=date('y-m-d');
			$block_date	=date_create($date);
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
					"offense" 	=> $this->input->post("offenseNo"),
					"block_end" => date_format($block_date,"y-m-d"),
					"status" 	=> $status
					);
				
					

		$this->model->update_offense_user($offense);
		$notif_insert = array(
			"user_id" 		=> $id,
			"notif_type" 	=> "user",
			"notif_status" 	=> $status,
			"status" 		=> "notified",
			"notif_name" 	=> $status
		
		);
		$this->model->insert_data_notifications($notif_insert);
		redirect(base_url() ."users");
	}
	public function changeoff()
	{
		$this->load->model('model');
		$this->load->library('upload');
		$block_date=date_create("0000-00-00");

			$offense= array(
					"block_end" => date_format($block_date,"y-m-d"),
					"status" 	=> "verified"
					);

		$this->model->update_offense_user1($offense);
		echo '<script> alert("Account can now be used please login again");</script>';
		echo '<script> window.location.replace("login")</script>';
		
	}
	public function ban($id)
	{
		$this->load->model('model');
		$this->load->library('upload');
		$status="banned";
		$ban= array("status" => $status);
		$this->model->update_ban_user($ban);
		$notif_insert = array(
			"user_id" 		=> $id,
			"notif_type" 	=> "user",
			"notif_status" 	=> $status,
			"status" 		=> "notified",
			"notif_name" 	=> $status
		
		);
		$this->model->insert_data_notifications($notif_insert);
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

	
	public function block_page()
	{
		
		$this->load->view('/admin/block_page');
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
		$password = md5($this->input->post("password"));

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
				"fname" 		=> $this->input->post("fname"),
				"lname" 		=> $this->input->post("lname"),
				"password" 		=> $password,
				"username" 		=> $this->input->post("username"),
				"telephone_1" 	=> $this->input->post("contact_number"),
				"telephone_2" 	=> $this->input->post("contact_number1"),
				"email" 		=> $this->input->post("email"),
				"user_type" 	=> $this->input->post("usertype"),
				"address" 		=> $this->input->post("address"),
				"status" 		=> $status,
				"created_at" 	=> date('y-m-d'),
				"photo" 		=> $this->input->post("pphoto"),
			);

			$this->model->insert_data_users($data_insert);
			if($status=="pending"){
			$notif_insert = array(
				"user_id" 		=> $this->db->insert_id(),
				"notif_type" 	=> "user",
				"notif_status" 	=> "pending",
				"status" 		=> "notified",
				"notif_name" 	=> $this->input->post("username")
			
			);
			$this->model->insert_data_notifications($notif_insert);
			}
			
			redirect(base_url() ."users");
		}else{
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
				"booking_id" 		=> $this->input->post("booking_id"),
				"report_from" 		=> $this->input->post("report_from"),
				"report_to" 		=> $this->input->post("violator"),
				"report_photo" 		=> $this->input->post("evidence"),
				"report_details" 	=> $this->input->post("report_info"),
			
			);

			$this->model->insert_data_report($data_insert);
				$notif_insert = array(
					"user_id" 		=> $this->input->post("report_from"),
					"notif_type" 	=> "report",
					"notif_status" 	=> "reporter",
					"status" 		=> "notified",
					"notif_name" 	=> "Report",
					"report_id"		=> $this->db->insert_id()
				);
				$notif_insert2 = array(
					"user_id" 		=> $this->input->post("violator"),
					"notif_type" 	=> "report",
					"notif_status" 	=> "reported",
					"status" 		=> "notified",
					"notif_name" 	=> "Report",
					"report_id"		=> $this->db->insert_id()
				);
				$this->model->insert_data_notifications($notif_insert);
				$this->model->insert_data_notifications2($notif_insert2);
			redirect(base_url() ."reports");
		
	}
	public function form_validation_event()
	{
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->form_validation->set_rules('event_name', '', 'required', array('required'=>'Please Input Event Name'));
		$this->form_validation->set_rules('event_date', '', 'required', array('required'=>'No Date Selected'));
		// $this->form_validation->set_rules('event_to', '', 'required', array('required'=>'No Time Selected'));
		// $this->form_validation->set_rules('duration', '', 'required', array('required'=>'No Time Selected'));
		// $this->form_validation->set_rules('full_payment', '', 'required|numeric', array('required'=>'Please Input Payment', 'numeric'=> 'Please Input a valid amount'));
		$this->form_validation->set_rules('down_payment', '', 'required|numeric', array('required'=>'Please Input Payment', 'numeric'=> 'Please Input a valid amount'));
		$this->form_validation->set_rules('location', '', 'required', array('required'=>'Location is required'));
		$this->form_validation->set_rules('notes', '', 'required', array('required'=>'Notes is required'));
		// date verfication
		$date=date('y-m-d');
		$set_date	=date_create($date);
		date_add($set_date, date_interval_create_from_date_string("3 days"));
		if(date_format($set_date,"y-m-d")<$this->input->post("date_event"))
		{
			if($this->form_validation->run())
			{
				$this->load->model("model");
				$status1 = "44";

				if($this->input->post("approve"))
				{
					$status = "approve";
				}else{
					$status ="pending";
				}

				$data_insert = array(
					"client_id" 	=> $this->input->post("client"),
					"performer_id" 	=> $status1,
					"full_amount" 	=> $status1,
					"package_id" 	=> $this->input->post("package"),
					"event_name" 	=> $this->input->post("event_name"),
					"down_payment" 	=> $this->input->post("dp"),
					"event_to" 		=> $this->input->post("time_event"),
					"event_date" 	=> $this->input->post("date_event"),
					"venue_name" 	=> $this->input->post("venue"),
					"notes" 		=> $this->input->post("publicinfo"),
					"status" 		=> $status,
					"date_booked" 	=> date('y-m-d')
				);
				$this->model->insert_data_bookings($data_insert);
				$data["insert_data_bookings"] 		= $this->model->insert_data_bookings();	
				$notif_insert = array(
					"user_id" 		=> $this->input->post("client"),
					"notif_type" 	=> "event",
					"notif_status" 	=> "booked",
					"status" 		=> "notified",
					"notif_name" 	=> $this->input->post("event_name"),
					"booking_id"	=> $data
				);
				$this->model->insert_data_notifications($notif_insert);
				echo $data;
			}else{
				echo '<script> alert("invalid inputs, Try again");</script>';
				$this->load->model('model');
				$data["fetch_data_client"] 		= $this->model->fetch_data_client();	
				$data["fetch_data_packages"] 	= $this->model->fetch_data_packages();
				$this->load->view('/admin/addevent',$data);
			}
		}else{
			echo '<script> alert("event must be 3 days before the event");</script>';
			$this->load->model('model');
			$data["fetch_data_client"] 		= $this->model->fetch_data_client();	
			$data["fetch_data_packages"] 	= $this->model->fetch_data_packages();
			// $this->load->view('/admin/addevent',$data);
			echo date_format($set_date,"Y-m-d"); 
			echo " ";
			echo $this->input->post("date_event");
		}
	
	}
	
	public function addevent()
	{
		$this->load->model('model');
		$data["fetch_data_client"] 	= $this->model->fetch_data_client();	
		$data["fetch_data_packages"] 	= $this->model->fetch_data_packages();
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
		$this->load->view('/admin/addevent',$data);
	}
	
	public function services()
	{
		$this->load->model('model');
		$data["fetch_data_packages"] = $this->model->fetch_data_packages();
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
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
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
		$this->load->view('/admin/histview',$data);
	}
	public function reports()
	{
		$this->load->model('model');
		$data["fetch_data_user"] 	= $this->model->fetch_data_user();
		$data["fetch_data_event"] 	= $this->model->fetch_data_event();
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
		$data["fetch_data_report"] 	= $this->model->fetch_data_report();
		$this->load->view('/admin/reports',$data);
	}
	public function notifications()
	{
		$this->load->model('model');
		$data["fetch_data_notifications"] = $this->model->fetch_data_notifications();
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
		$this->load->view('/admin/notifications', $data);
	}
	public function profile($id)
	{
		$this->load->model('model');
		$data["fetch_data_profile"] = $this->model->fetch_data_profile();
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
		$this->load->view('/admin/profile',$data);
	}
	public function eventview($id)
	{
		$this->load->model('model');
		$data["fetch_data_event_detail"] = $this->model->fetch_data_event_detail();
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
		$this->load->view('/admin/eventview',$data);
	}

	public function events()
	{
		$this->load->model('model');
		$data["fetch_data_event"] = $this->model->fetch_data_event();
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
		$this->load->view('/admin/events', $data);
	}
	public function users()
	{
		$this->load->model('model');
		$data["fetch_data_user"] = $this->model->fetch_data_user();
		$data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
		$this->load->view('/admin/users', $data);
	}
	public function logout()
	{
		$this->load->view('/admin/logout');
	}




}