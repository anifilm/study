<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('board_model');
		$this->load->helper(array('url', 'date'));
	}

	public function index() {
		$this->lists();
	}

	public function _remap($method) {
		// 헤더 include
		$this->load->view('templetes/header');

		if (method_exists($this, $method)) {
			$this->{"{$method}"}();
		}

		// 푸터 include
		$this->load->view('templetes/footer');
	}

	public function lists() {
		$data['list'] = $this->board_model->get_list();
		$this->load->view('board/list_view', $data);
	}
}
