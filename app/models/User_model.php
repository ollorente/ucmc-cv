<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get_users($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from users where auth_level < '. $this->auth_level .' order by username asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_user($id = FALSE)
    {
        $query = $this->db->query('select * from users where username like "'.$id.'"');
        return $query->row();
    }

	public function count_users()
    {
        $query = $this->db->query('select * from users');
        return $query->num_rows();
    }

	public function get_user_id($id = FALSE)
    {
        $query = $this->db->query('select * from users where user_id = '. $id .'');
        return $query->row();
    }

	public function get_rand_uid($length = 28)
    {
        $possible = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($possible);
        $randomNumber = '';
        for ($i = 0; $i < $length; $i++) {
            $randomNumber .= $possible[rand(0, $charactersLength - 1)];
        }
        
        $query = $this->db->query('select * from users where userUID like "'. $randomNumber .'"');

        if ($query->num_rows() > 0) {
            get_rand_uid(28);
        } else {
            return $randomNumber;
        }
    }
}
