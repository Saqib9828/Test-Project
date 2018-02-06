<?php

class Mycntrl extends CI_Controller {
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('welcome_temp');

	}
	public function login_page()
	{
		$this->load->view('login');
	}
	public function register_user()
	{
		$data = array(
		'username' => $this->input->post('username'),
		'email' => $this->input->post('email'),
		'pass' => $this->input->post('pass')
			);

		$this->load->model('test_model');
		if($this->test_model->insert($data))
		{
			$this->load->view('after_reg');
		}
		else
		{
			$this->load->view('welcome_temp');	
		}
	}
	public function login_user()
	{
		$data = array(
		'username' => $this->input->post('username'),
		'pass' => $this->input->post('pass')
			);

		$this->load->model('test_model');
		$result=$this->test_model->check_login($data);
		if($result)
		{
			$session_data = array(
			'username' => $data['username']
			);
			$this->session->set_userdata('logged_in', $session_data);
			$this->load->view('after_login', $data);
		}
		else
		{
			$this->load->view('login');
		}
	}
}
