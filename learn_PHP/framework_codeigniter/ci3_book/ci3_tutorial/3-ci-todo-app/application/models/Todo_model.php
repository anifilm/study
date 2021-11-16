<?php

class Todo_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_list() {
		$sql = 'SELECT * FROM items';
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	public function get_view($id) {
		$sql = 'SELECT * FROM items where id=\''.$id.'\'';
		$query = $this->db->query($sql);
		$result = $query->row();

		return $result;
	}
}
