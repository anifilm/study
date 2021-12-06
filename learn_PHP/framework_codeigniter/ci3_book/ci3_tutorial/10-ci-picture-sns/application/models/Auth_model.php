<?php

class Auth_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	function getUser($option) {
		$result = $this->db->get_where('ci_board_users', array('email' => $option['email']))->row();

		return $result;
	}

	function addUser($option) {
		$this->db->set('email', $option['email']);
		$this->db->set('username', $option['username']);
		$this->db->set('password', $option['password']);
		$this->db->set('reg_date', 'NOW()', FALSE);
		$this->db->insert('ci_board_users');

		$this->db->insert_id();
	}
}
