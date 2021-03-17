<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Virtual extends MY_Controller {

	public function index()
	{
		$data['courses_count'] = $this->virtuals->count_courses();
		$data['courses'] = $this->virtuals->get_courses();
		$data['graduates_count'] = $this->virtuals->count_graduates();
		$data['graduates'] = $this->virtuals->get_graduates();
		$data['programs_count'] = $this->virtuals->count_programs();
		$data['programs'] = $this->virtuals->get_programs();
		$data['title'] = 'Formación virtual';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('formacion-virtual', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
