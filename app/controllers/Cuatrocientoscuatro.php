<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuatrocientoscuatro extends MY_Controller {

	public function index()
	{
        $this->is_logged_in();
		
		$data['title'] = 'Página no encontrada';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('404', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
