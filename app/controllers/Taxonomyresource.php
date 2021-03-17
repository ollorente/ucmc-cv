<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaxonomyResource extends MY_Controller {

    public function index()
	{
		$data['resources'] = $this->taxonomyresource->get_taxonomy_resources();
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->taxonomyresource->count_taxonomy_resources() / 12);
		$data['title'] = 'Banco de recursos';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('banco-de-recursos-categorias', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getTaxonomyResources($id = NULL)
	{
		$totalPag = ceil($this->taxonomyresource->count_taxonomy_resources() / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['resources'] = $this->taxonomyresource->get_taxonomy_resources($pag);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Banco de recursos';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('banco-de-recursos-categorias', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

    public function getTaxonomyResource($slug = NULL)
	{
		$data['resources'] = $this->resource->get_taxonomy_resources($slug);
		$data['category'] = $this->taxonomyresource->get_taxonomy($slug);
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->resource->count_taxonomy_resources($slug) / 12);
		$data['title'] = 'Banco de recursos';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('banco-de-recursos-categoria', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getTaxonomyResourcePage($slug = NULL, $id = NULL)
	{
		$totalPag = ceil($this->resource->count_taxonomy_resources($slug) / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['resources'] = $this->resource->get_taxonomy_resources($slug, $pag);
		
		$data['category'] = $this->taxonomyresource->get_taxonomy($slug);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Banco de recursos';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('banco-de-recursos-categoria', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}
}
