<?php

class Board_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_list($table='ci_board') {
		$sql = "SELECT * FROM $table ORDER BY board_id DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		//$result = $query->result_array();

		return $result;
	}
}
