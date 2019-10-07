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

	public function profile($id)
	{
		$this->load->model('model');
		$data["fetch_data_profile"] = $this->model->fetch_data_profile();
		$this->load->view('/admin/profile',$data);
	}

	public function events()
	{
		$this->load->model('model');
		$data["fetch_data_event"] = $this->model->fetch_data_event();
		$this->load->view('/admin/events', $data);
	}

	public function addevent()
	{
		$this->load->view('/admin/addevent');
	}

	public function eventview()
	{
		$this->load->view('/admin/eventview');
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
