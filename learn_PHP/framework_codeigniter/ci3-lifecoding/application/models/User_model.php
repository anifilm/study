<?php

class User_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	function gets() {
		return $this->db->query("SELECT * FROM user")->result();
	}

	function getByEmail($option) {
		$result = $this->db->get_where('user', array('email' => $option['email']))->row();

		//echo '<pre>';
		//var_dump($this->db->last_query());
		//echo '</pre>';

		return $result;
	}

	function add($option) {
		$this->db->set('email', $option['email']);
		$this->db->set('username', $option['username']);
		$this->db->set('password', $option['password']);
		$this->db->set('created', 'NOW()', false);
		$this->db->insert('user');

		$result = $this->db->insert_id();
		return $result;
	}
}
