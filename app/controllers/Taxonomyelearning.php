<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaxonomyElearning extends MY_Controller {

	public function index()
	{
		$data['taxonomies'] = $this->taxonomyelearning->get_taxonomy_objects();
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->taxonomyelearning->count_taxonomy_objects() / 12);
		$data['title'] = 'Categorías objetos de aprendizaje';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('objetos-de-aprendizaje-categorias', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getTaxonomyObjects($id = NULL)
	{
		$totalPag = ceil($this->taxonomyelearning->count_taxonomy_objects() / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['taxonomies'] = $this->taxonomyelearning->get_taxonomy_objects($pag);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Categorías objetos de aprendizaje';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('objetos-de-aprendizaje-categorias', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

    public function getTaxonomyObject($slug = NULL)
	{
		$data['objects'] = $this->elearning->get_taxonomy_objects($slug);
		$data['category'] = $this->taxonomyelearning->get_taxonomy($slug);
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->elearning->count_taxonomy_objects($slug) / 12);
		$data['title'] = 'Categorías objetos de aprendizaje';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('objetos-de-aprendizaje-categoria', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getTaxonomyObjectPage($slug = NULL, $id = NULL)
	{
		$totalPag = ceil($this->elearning->count_taxonomy_objects($slug) / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['objects'] = $this->elearning->get_taxonomy_objects($slug, $pag);
		
		$data['category'] = $this->taxonomyelearning->get_taxonomy($slug);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Categorías objetos de aprendizaje';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('objetos-de-aprendizaje-categoria', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
