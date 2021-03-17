<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Object_model extends CI_Model {

	public function createObject()
    {
        $queryTaxonomy = $this->db->query('select * from objecttaxonomies where objectTaxonomySlug like "'. $this->input->post('taxonomy') .'"');

        $data = array(
            'objectObject' => $this->input->post('slug'),
			'objectArea' => $queryTaxonomy->row('objectTaxonomyName'),
			'objectKnowlessTopic' => $this->input->post('knowless_topic'),
			'objectHosting' => $this->input->post('hosting'),
			'objectTitle' => $this->input->post('title'),
			'objectDescription' => $this->input->post('description'),
			'objectLanguage' => $this->input->post('language'),
			'objectKeyWords' => $this->input->post('keyWords'),
			'objectLink' => $this->input->post('link'),
			'objectYoutube' => $this->input->post('youtube'),
			'objectFormat' => $this->input->post('format'),
			'objectSize' => $this->input->post('size'),
			'objectRequirement' => $this->input->post('requirement'),
			'objectInstructions' => $this->input->post('instructions'),
			'objectVersion' => $this->input->post('version'),
			'objectContributors' => $this->input->post('contributors'),
			'objectEntities' => $this->input->post('entities'),
			'objectCreatedAt' => date('Y-m-d H:i:s'),
			'objectTopic' => $this->input->post('topic'),
			'objectInteractivity' => $this->input->post('interactivity'),
			'objectCost' => $this->input->post('cost'),
			'objectRights' => $this->input->post('rights'),
			'objectUse' => $this->input->post('use'),
			'objectClasification' => $this->input->post('clasification'),
			'objectTaxonomy' => $queryTaxonomy->row('_id'),
			'isObjectActive' => $this->input->post('is_active') || 1
		);

		$query = $this->db->insert('objects', $data);
		$this->output->set_output(json_encode(
            array(
                'status' => true,
                'msg' => 'Elemento creado.'
            )
        ));
    }

    public function get_objects($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

		$query = $this->db->query('select * from objects where isObjectActive = 1 order by objectTitle asc limit '. $_PAGE .','. $_LIMIT .'');
		return $query->result_array();
    }

    public function count_objects()
    {
        $query = $this->db->query('select * from objects where isObjectActive = 1');
		return $query->num_rows();
    }

    public function get_object($id = FALSE)
    {
        $query = $this->db->query('select * from objects where objectObject like "'.$id.'"');
		return $query->row();
    }

	public function get_object_id($id = NULL)
	{
		$query = $this->db->query('select * from objects where _id = '. $id .'');
		return $query->row();
	}

    public function update_object($id = FALSE)
    {
        echo 'updateObject';
    }

    public function remove_object($id = FALSE)
    {
        $query = $this->db->query('delete from objects where objectObject = "'. $id .'"');
		echo json_encode(
			array(
                'status' => true,
                'msg' => 'Elemento eliminado.'
            )
		);
    }

	public function get_taxonomy_object_id($id = FALSE)
    {
		$query = $this->db->query('select * from objecttaxonomies where _id = '. $id .'');
		return $query->row();
	}
}
