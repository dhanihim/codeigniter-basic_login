<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		$data['title'] = "JSTrans Logistik App";
		$this->load->view('auth/login', $data);
	}

	public function confirmation()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$is_available = $this->auth_model->is_available('user', $username, $password);

		//available
		if($is_available>0)
		{
			$session_data = array(
				'username' => $username
			);
			$this->session->set_userdata($session_data);

			redirect(base_url().'user');
		}
		else
		{
			$this->session->set_flashdata('error', 'Invalid username and password');
			redirect(base_url());
		}
	}
}
