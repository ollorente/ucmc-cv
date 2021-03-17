<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taxonomyelearning_model extends CI_Model {

	public function get_taxonomy_objects($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from objecttaxonomies where isObjectTaxonomyActive = 1 order by objectTaxonomyName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_taxonomy_objects_admin($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from objecttaxonomies order by objectTaxonomyName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_taxonomy($id = FALSE)
    {
        $query = $this->db->query('select * from objecttaxonomies where objectTaxonomySlug like "'. $id .'"');
        return $query->row();
    }

	public function count_taxonomy_objects()
    {
        $query = $this->db->query('select * from objecttaxonomies where isObjectTaxonomyActive = 1');
        return $query->num_rows();
    }

	public function count_taxonomy_objects_admin()
    {
        $query = $this->db->query('select * from objecttaxonomies');
        return $query->num_rows();
    }
}
