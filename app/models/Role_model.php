<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

	public function get_roles($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from roles where isRoleActive = 1 order by roleOrder asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_roles_admin($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from roles order by roleOrder asc  limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_role($id = FALSE)
    {
        $query = $this->db->query('select * from roles where roleNameUrl like "'.$id.'"');
        return $query->row();
    }

	public function count_roles()
    {
        $query = $this->db->query('select * from roles where isRoleActive = 1');
        return $query->num_rows();
    }

	public function count_roles_admin()
    {
        $query = $this->db->query('select * from roles');
        return $query->num_rows();
    }

	public function get_role_id($id = FALSE)
    {
        $query = $this->db->query('select * from roles where _id = '. $id .'');
        return $query->row();
    }
}
