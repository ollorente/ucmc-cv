<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taxonomyresource_model extends CI_Model {

	public function get_taxonomy($id = FALSE)
    {
        $query = $this->db->query('select * from resourcetaxonomies where resourceTaxonomySlug like "'. $id .'"');
        return $query->row();
    }

	public function get_taxonomy_id($id = FALSE)
    {
        $query = $this->db->query('select * from resourcetaxonomies where _id = '. $id .'');
        return $query->row();
    }

	public function get_taxonomy_resources($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from resourcetaxonomies where isResourceTaxonomyActive = 1 order by resourceTaxonomyName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_taxonomy_resources_admin($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from resourcetaxonomies order by resourceTaxonomyName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_taxonomy_resources()
    {
        $query = $this->db->query('select * from resourcetaxonomies where isResourceTaxonomyActive = 1');
        return $query->num_rows();
    }

	public function count_taxonomy_resources_admin()
    {
        $query = $this->db->query('select * from resourcetaxonomies');
        return $query->num_rows();
    }
}
