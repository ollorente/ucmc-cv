<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		if ( isset( $auth_user_id ) ) {
			header('Location:'.base_url('backoffice'));
		} else {
			
			$data['title'] = 'Login';
		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('backoffice/login', $data);
			$this->load->view('templates/foot', $data);
			$this->load->view('templates/footer', $data);
		}
    }

	public function home()
	{
		$this->is_logged_in();
		
		echo $this->load->view('templates/header', $data, TRUE);
		echo $this->load->view('templates/navbar', $data, TRUE);

		echo $this->load->view('home', $data, TRUE);

		echo $this->load->view('templates/foot', $data, TRUE);
		echo $this->load->view('templates/footer', $data, TRUE);
	}

	public function login()
	{
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'backoffice/login')
			show_404();

		if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
			$this->require_min_level(1);

		$this->setup_login_form();

		$data['title'] = 'Login';

		$html = $this->load->view('templates/header', $data, TRUE);
		$html .= $this->load->view('templates/navbar', $data, TRUE);
		$html .= $this->load->view('login', $data, TRUE);
		$html .= $this->load->view('templates/foot', $data, TRUE);
		$html .= $this->load->view('templates/footer', $data, TRUE);

		echo $html;
	}

	public function simple_verification()
	{
		$this->is_logged_in();

		$data['title'] = 'Verificación Simple';

		$this->load->view('login/page_header', $data);
		$this->load->view('login/simple_verification', $data);
		$this->load->view('login/page_footer', $data);
	}

	public function create_user()
	{
		$this->is_logged_in();

		$data['title'] = 'Crear Usuario';

		$this->load->view('login/page_header', $data);
		$this->load->view('login/create_user', $data);
		$this->load->view('login/page_footer', $data);
	}

	public function ajax_login()
	{
		$this->is_logged_in();

		$data['title'] = 'Login con Ajax';

		$this->load->view('login/page_header', $data);
		$this->load->view('login/ajax_login', $data);
		$this->load->view('login/page_footer', $data);
	}

	public function optional_login_test()
	{
		$this->is_logged_in();

		$data['title'] = 'Test de Login Opcional';

		$this->load->view('login/page_header', $data);
		$this->load->view('login/optional_login_test', $data);
		$this->load->view('login/page_footer', $data);
	}
}