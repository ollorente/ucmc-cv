<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tool_model extends CI_Model {

	public function get_tools_student($id = 1)
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "estudiante" ');

        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from tools where toolRole like "'. $queryRole->row('_id') .'" and isToolActive = 1 order by toolName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_tools_student()
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "estudiante" ');

        $query = $this->db->query('select * from tools where toolRole like "'. $queryRole->row('_id') .'" and isToolActive = 1');
        return $query->num_rows();
    }

	public function get_tools_teacher($id = 1)
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "docente" ');

        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from tools where toolRole like "'. $queryRole->row('_id') .'" and isToolActive = 1 order by toolName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_tools_teacher()
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "docente" ');

        $query = $this->db->query('select * from tools where toolRole like "'. $queryRole->row('_id') .'" and isToolActive = 1');
        return $query->num_rows();
    }

	public function get_tools($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from tools where isToolActive = 1 order by toolName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_tools()
    {
        $query = $this->db->query('select * from tools where isToolActive = 1');
        return $query->num_rows();
    }

	public function get_tool_id($id = NULL)
    {
        $query = $this->db->query('select * from tools where _id = '. $id .'');
        return $query->row();
    }
}
