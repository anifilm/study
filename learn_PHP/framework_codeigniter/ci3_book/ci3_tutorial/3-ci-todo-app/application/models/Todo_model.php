<?php

class Todo_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_list() {
		$sql = "SELECT * FROM todo_items";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	public function get_view($id) {
		$sql = "SELECT * FROM todo_items WHERE id='$id'";
		$query = $this->db->query($sql);
		$result = $query->row();

		return $result;
	}

	public function insert_todo($content, $created_on, $due_date) {
		$sql = "INSERT INTO todo_items (content, created_on, due_date) VALUES ('$content', '$created_on', '$due_date')";
		$this->db->query($sql);
	}

	public function update_todo($content, $created_on, $due_date, $id) {
		$sql = "UPDATE todo_items SET content='$content', created_on='$created_on', due_date='$due_date' WHERE id='$id'";
		$this->db->query($sql);
	}

	public function delete_todo($id) {
		$sql = "DELETE FROM todo_items WHERE id='$id'";
		$this->db->query($sql);
	}
}
