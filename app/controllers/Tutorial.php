<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends MY_Controller {

	public function students()
	{
		$data['tutorials'] = $this->tutorial->get_student_tutorials();
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->tutorial->count_student_tutorials() / 12);
		$data['title'] = 'Tutoriales para estudiantes';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('tutoriales-para-estudiantes', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
    }

    public function getTutorialsStudents($id = NULL)
	{
		$totalPag = ceil($this->tutorial->count_student_tutorials() / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['tutorials'] = $this->tutorial->get_student_tutorials($pag);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Tutoriales para estudiantes';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('tutoriales-para-estudiantes', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
    }

	public function teachers()
	{
		$data['tutorials'] = $this->tutorial->get_teacher_tutorials();
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->tutorial->count_teacher_tutorials() / 12);
		$data['title'] = 'Tutoriales para docentes';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('tutoriales-para-docentes', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getTutorialsTeachers($id = NULL)
	{
		$totalPag = ceil($this->tutorial->count_teacher_tutorials() / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['tutorials'] = $this->tutorial->get_teacher_tutorials($pag);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Tutoriales para docentes';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('tutoriales-para-docentes', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
