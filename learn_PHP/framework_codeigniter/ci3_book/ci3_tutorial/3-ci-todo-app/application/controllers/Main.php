<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('todo_model');
		$this->load->helper(array('url', 'date'));
	}

	public function index() {
		$this->lists();
	}

	public function lists() {
		$data['list'] = $this->todo_model->get_list();
		$this->load->view('todo/list_view', $data);
	}
}
