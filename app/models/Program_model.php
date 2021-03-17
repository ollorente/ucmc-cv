<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_model extends CI_Model {

	public function get_programs($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from programs where isProgramActive = 1 order by programName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_program($id = FALSE)
    {
        $query = $this->db->query('select * from programs where programNameUrl like "'.$id.'"');
        return $query->row();
    }

	public function count_programs()
    {
        $query = $this->db->query('select * from programs where isProgramActive = 1');
        return $query->num_rows();
    }

	public function get_program_id($id = NULL)
    {
        $query = $this->db->query('select * from programs where _id = '. $id .'');
        return $query->row();
    }
}
