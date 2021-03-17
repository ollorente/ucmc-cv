<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function get_menus($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from menus where isMenuActive = 1 order by menuOrder asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_menus_admin($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from menus order by menuOrder asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_menuByRole($id = FALSE)
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "'.$id.'"');

        $query = $this->db->query('select * from menus where menuRole like "'. $queryRole->row('_id') .'" and isMenuActive = 1 order by menuOrder asc');
        return $query->result_array();
    }

	public function get_menu($id = FALSE)
    {
        $query = $this->db->query('select * from menus where _id like "'. $id .'"');
        return $query->row();
    }

	public function count_menus()
    {
        $query = $this->db->query('select * from menus where isMenuActive = 1');
        return $query->num_rows();
    }

	public function count_menus_admin()
    {
        $query = $this->db->query('select * from menus');
        return $query->num_rows();
    }
}
