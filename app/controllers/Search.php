<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index()
	{
		$data['title'] = 'Buscar';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('buscar', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
