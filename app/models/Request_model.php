<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model {

	public function get_requests($id = 1, $limit = 12)
    {
        $_LIMIT = $limit;
        $_PAGE = isset( $id ) ? ( $id - 1 ) * $_LIMIT : 0;
        if ($_PAGE < 0 ) {
            $_PAGE = 0;
        }

        $query = $this->db->query('select * from requests where isRequestLock = 0 order by requestData desc limit '. $_PAGE .','. $_LIMIT .'');
        return $query->result_array();
    }

	public function get_request_id($id = NULL)
	{
		$query = $this->db->query('update requests set isRequestActive = "0" where requests._id = '. $id .'');
		$query = $this->db->query('select * from requests where _id = '. $id .'');
		return $query->row();
	}

	public function count_requests()
    {
        $query = $this->db->query('select * from requests where isRequestLock = 0');
        return $query->num_rows();
    }

	public function get_request($id = FALSE)
    {
        $query = $this->db->query('select * from requests where _id like "'. $id .'"');
        return $query->row();
    }

	public function add_request()
    {
        $data = array(
			'requestName' => $this->input->post('name', TRUE),
			'requestEmail' => $this->input->post('email, TRUE'),
			'requestSubject' => $this->input->post('subject', TRUE),
			'requestMessage' => $this->input->post('information', TRUE),
			'requestIP' => get_client_ip(),
			'requestData' => date('Y-m-d H:i:s')
        );

        $query = $this->db->query('select * from requests where requestCode like "'. $id .'"');
        return $query->row();
    }
}
