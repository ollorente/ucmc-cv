<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Virtual_model extends CI_Model {

	public function get_courses()
    {
        $_LIMIT = 20;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from courses where isCourseActive = 1 order by courseName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_courses()
    {
        $query = $this->db->query('select * from courses where isCourseActive = 1');
        return $query->num_rows();
    }

	public function get_graduates()
    {
        $_LIMIT = 20;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from graduates where isGraduateActive = 1 order by graduateName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_graduates()
    {
        $query = $this->db->query('select * from graduates where isGraduateActive = 1');
        return $query->num_rows();
    }

	public function get_programs()
    {
        $_LIMIT = 20;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from programs where isProgramActive = 1 order by programName asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_programs()
    {
        $query = $this->db->query('select * from programs where isProgramActive = 1');
        return $query->num_rows();
    }
}
