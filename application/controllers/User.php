<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		if($this->session->userdata('username') != '')
		{
			$data['username'] = $this->session->userdata('username');
			$this->load->view('user/index', $data);
		}
		else
		{
			redirect(base_url());
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');

		redirect(base_url());
	}
}
