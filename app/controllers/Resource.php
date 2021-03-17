<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends MY_Controller {

    public function index()
	{
		$data['resources'] = $this->resource->get_resources();
		$data['currentpage'] = 1;
		$data['lastpage'] = ceil($this->resource->count_resources() / 12);
		$data['title'] = 'Banco de recursos';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('banco-de-recursos', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getResources($id = NULL)
	{
		$totalPag = ceil($this->resource->count_resources() / 12);
		$pag = $id >= $totalPag ? $totalPag : $id;

		$data['resources'] = $this->resource->get_resources($pag);
		$data['currentpage'] = $pag;
		$data['lastpage'] = $totalPag;
		$data['title'] = 'Banco de recursos';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('banco-de-recursos', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function getResource($id = FALSE)
	{
		$data['resource'] = $this->resource->get_resource($id);

		if (empty($data['resource'])) {
			show_404();
		}

		$data['random'] = $this->resource->get_random_resources();
		$data['taxonomy'] = $this->taxonomyresource->get_taxonomy_id($data['resource']->resourceTaxonomy);
		$data['title'] = 'Recurso';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('recurso', $data);
		$this->load->view('templates/foot', $data);
		$this->load->view('templates/footer', $data);
	}

	public function downloadResource($id = FALSE)
	{
		if( $this->require_group('employees') )
		{
			echo 'Downloading...';
		}
	}
}
