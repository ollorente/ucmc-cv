<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Obtiene la IP del cliente
function get_client_ip() {
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if (getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if (getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if (getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if (getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if (getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

class Request extends MY_Controller {

	public function index()
	{
		$this->is_logged_in();
		
		$data['title'] = 'Solicitar información';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);

		$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => '* El %s es requerido.'));
		$this->form_validation->set_rules('email', 'Correo electrónico', 'required', array('required' => '* El %s es requerido.'));
		$this->form_validation->set_rules('subject', 'Asunto', 'required', array('required' => '* El %s es requerido.'));
		$this->form_validation->set_rules('information', 'Información', 'required', array('required' => '* La %s es requerida.'));

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('solicitar-informacion', $data);
		} else {
			$data = array(
				'requestName' => $this->input->post('name', TRUE),
				'requestEmail' => $this->input->post('email', TRUE),
				'requestSubject' => $this->input->post('subject', TRUE),
				'requestMessage' => $this->input->post('information', TRUE),
				'requestIP' => get_client_ip(),
				'requestData' => date('Y-m-d H:i:s')
			);
			$query = $this->db->insert('requests', $data);

			$this->load->view('formsuccess');
		}
		
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
