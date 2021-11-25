<?php

class Topic_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function gets() {
		//return $this->db->query('SELECT * FROM topic')->result();
		// 최근 등록 순으로 수정
		return $this->db->query('SELECT * FROM topic ORDER BY id DESC')->result();
	}

	public function get($topic_id) {
		//$this->db->select('id');
        //$this->db->select('title');
        //$this->db->select('description');
        //$this->db->select('UNIX_TIMESTAMP(created) AS created');

		//return $this->db->query('SELECT * FROM topic WHERE id='.$topic_id)->row();
		return $this->db->get_where('topic', array('id' => $topic_id))->row();
	}

	public function add($title, $description) {
		$this->db->set('created', 'now()', false);
		$this->db->insert('topic', array(
			'title' => $title,
			'description' => $description,
		));
		//echo $this->db->last_query();
		return $this->db->insert_id();
	}

	public function update($title, $description, $topic_id) {
		//$this->db->set('updated', 'now()', false);
		$this->db->update('topic', array(
			'title' => $title,
			'description' => $description,
		), array('id' => $topic_id));
		//echo $this->db->last_query();
	}

	public function delete($topic_id) {
		$this->db->delete('topic', array('id' => $topic_id));
	}
}
