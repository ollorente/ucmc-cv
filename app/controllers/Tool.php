<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tool extends MY_Controller {

	public function students()
	{
		$data['tools'] = $this->tools->get_tools_student();
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->tools->count_tools_student() / 12);
		$data['title'] = 'Herramientas para estudiantes';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('herramientas-para-estudiantes', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
    }

	public function teachers()
	{
		$data['tools'] = $this->tools->get_tools_teacher();
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->tools->count_tools_teacher() / 12);
		$data['title'] = 'Herramientas para docentes';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('herramientas-para-docentes', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function teachersPage($id = NULL)
	{
		$totalPag = ceil($this->tools->count_tools_teacher() / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['tools'] = $this->tools->get_tools_teacher($pag);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Herramientas para docentes';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('herramientas-para-docentes', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
