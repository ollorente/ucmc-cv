<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$data['roles'] =  $this->roles->get_roles();
		$data['menu_aspire'] =  $this->menu->get_menuByRole('aspirante');
		$data['menu_student'] =  $this->menu->get_menuByRole('estudiante');
		$data['menu_teacher'] =  $this->menu->get_menuByRole('docente');
		$data['title'] = 'Home';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('home', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
