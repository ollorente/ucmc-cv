<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial_model extends CI_Model {

	public function get_student_tutorials($id = 1)
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "estudiante"');

        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from tutorials where tutorialRole like "'. $queryRole->row('_id') .'" and isTutorialActive = 1 and isTutorialLock = 0 order by tutorialTitle asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_student_tutorials()
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "estudiante"');

        $query = $this->db->query('select * from tutorials where tutorialRole like "'. $queryRole->row('_id') .'" and isTutorialActive = 1 and isTutorialLock = 0');
        return $query->num_rows();
    }

	public function get_teacher_tutorials($id = 1)
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "docente"');

        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from tutorials where tutorialRole like "'. $queryRole->row('_id') .'" and isTutorialActive = 1 and isTutorialLock = 0 order by tutorialTitle asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_teacher_tutorials()
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "docente"');

        $query = $this->db->query('select * from tutorials where tutorialRole like "'. $queryRole->row('_id') .'" and isTutorialActive = 1 and isTutorialLock = 0');
        return $query->num_rows();
    }

	public function get_tutorials($id = 1)
    {
        $_LIMIT = 12;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from tutorials where isTutorialActive = 1 and isTutorialLock = 0 order by tutorialTitle asc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function count_tutorials()
    {
        $queryRole = $this->db->query('select * from roles where roleNameUrl like "docente"');

        $query = $this->db->query('select * from tutorials where isTutorialActive = 1 and isTutorialLock = 0');
        return $query->num_rows();
    }

	public function get_tutorial_id($id = NULL)
    {
        $query = $this->db->query('select * from tutorials where _id = '. $id .'');
        return $query->row();
    }
}
