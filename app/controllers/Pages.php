<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    public function view($page = 'home')
    {
        $this->is_logged_in();
		
		if (!file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/foot', $data);
        $this->load->view('templates/footer', $data);
    }
}