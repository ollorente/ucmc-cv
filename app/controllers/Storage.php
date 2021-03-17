<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storage extends CI_Controller {

	public function index($id = FALSE)
	{
		$data['title'] = 'Storage';

		$this->load->view('storage', $data);
		/* $this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data); */
    }
}
