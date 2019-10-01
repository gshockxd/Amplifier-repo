<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('/admin/index');
	}
	public function users()
	{
		$this->load->view('/admin/users');
	}
	public function profile()
	{
		$this->load->view('/admin/profile');
	}
	public function events()
	{
		$this->load->view('/admin/events');
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
		$this->load->view('/admin/services');
	}
	public function history()
	{
		$this->load->view('/admin/history');
	}
	public function histview()
	{
		$this->load->view('/admin/histview');
	}
	public function reports()
	{
		$this->load->view('/admin/reports');
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
