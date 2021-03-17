<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {

	public function get_courses($id = 1)
	{
		$_LIMIT = 12;
		$_PAGE = isset($id) ? ($id-1) * $_LIMIT : 0;
		if ($_PAGE < 0) {
			$_PAGE = 0;
		}

		$query = $this->db->query('select * from courses where isCourseActive = 1 order by courseName asc limit '. $_PAGE .','. $_LIMIT .'');
		return $query->result_array();
	}

	public function get_course($id = FALSE)
	{
		$query = $this->db->query('select * from courses where courseNameUrl like "'. $id .'"');
		return $query->row();
	}

	public function count_courses()
	{
		$query = $this->db->query('select * from courses where isCourseActive = 1');
		return $query->num_rows();
	}

	public function get_course_id($id = NULL)
	{
		$query = $this->db->query('select * from courses where _id = '. $id .'');
		return $query->row();
	}
}
