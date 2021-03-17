<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource_model extends CI_Model {

	public function get_resources($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from resources where isResourceActive = 1 order by resourceCode asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_resources()
    {
        $query = $this->db->query('select * from resources where isResourceActive = 1');
        return $query->num_rows();
    }

	public function get_resource($id = NULL)
	{
		$query = $this->db->query('select * from resources where resourceCode like "'. $id .'"');
		return $query->row();
	}

	public function get_resource_id($id = NULL)
	{
		$query = $this->db->query('select * from resources where resourceCode like "'. $id .'"');
		return $query->row();
	}

	public function get_random_resources($id = 1)
    {
        $_LIMIT = 6;

        $query = $this->db->query('select * from resources where isResourceActive = 1 order by rand() limit 0,'. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_taxonomy_resources($slug = FALSE, $id = 1)
    {
        $queryResourceTaxonomy = $this->db->query('select * from resourcetaxonomies where resourceTaxonomySlug like "'. $slug .'"');

        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from resources where resourceTaxonomy like "'. $queryResourceTaxonomy->row('_id') .'" and isResourceActive = 1 order by resourceCode asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_taxonomy_resource_id($id = FALSE)
    {
		$query = $this->db->query('select * from resourcetaxonomies where _id = '. $id .'');
		return $query->row();
	}

	public function count_taxonomy_resources($slug = FALSE)
    {
        $queryResourceTaxonomy = $this->db->query('select * from resourcetaxonomies where resourceTaxonomySlug like "'. $slug .'"');

        $query = $this->db->query('select * from resources where resourceTaxonomy like "'. $queryResourceTaxonomy->row('_id') .'" and isResourceActive = 1');
        return $query->num_rows();
    }
}
