<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
        $this->is_logged_in();
		
		$data['title'] = 'Login';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('login', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function login_validate()
	{
        $data['title'] = 'Login';

		$this->load->view('login_validate', $data);
	}
}
