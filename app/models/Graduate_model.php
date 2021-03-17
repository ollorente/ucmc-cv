<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graduate_model extends CI_Model {

	public function get_graduates($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from graduates where isGraduateActive = 1 order by graduateName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_graduate($id = FALSE)
    {
        $query = $this->db->query('select * from graduates where graduateNameUrl like "'. $id .'"');
        return $query->row();
    }

	public function count_graduates()
    {
        $query = $this->db->query('select * from graduates where isGraduateActive = 1');
        return $query->num_rows();
    }

	public function get_graduate_id($id = NULL)
    {
        $query = $this->db->query('select * from graduates where _id = '. $id .'');
        return $query->row();
    }
}
