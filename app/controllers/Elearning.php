<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elearning extends MY_Controller {

	public function index()
	{
		$data['objects'] = $this->elearning->get_objects();
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->elearning->count_objects() / 12);
		$data['title'] = 'Objetos de aprendizaje';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('objetos-de-aprendizaje', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getObjects($id = NULL)
	{
		$totalPag = ceil($this->elearning->count_objects() / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['objects'] = $this->elearning->get_objects($pag);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Objetos de aprendizaje';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('objetos-de-aprendizaje', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
