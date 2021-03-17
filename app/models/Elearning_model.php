<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elearning_model extends CI_Model {

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

	public function get_taxonomy_objects($slug = FALSE, $id = 1)
    {
        $queryObjectTaxonomy = $this->db->query('select * from objecttaxonomies where objectTaxonomySlug like "'. $slug .'"');

        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from objects where objectTaxonomy like "'. $queryObjectTaxonomy->row('_id') .'" and isObjectActive = 1 order by objectTitle asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_taxonomy_objects($slug = FALSE)
    {
        $queryObjectTaxonomy = $this->db->query('select * from objecttaxonomies where objectTaxonomySlug like "'. $slug .'"');

        $query = $this->db->query('select * from objects where objectTaxonomy like "'. $queryObjectTaxonomy->row('_id') .'" and isObjectActive = 1');
        return $query->num_rows();
    }
}
