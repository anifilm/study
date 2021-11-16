<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('todo_model');
		$this->load->helper(array('url', 'date'));
	}

	private function _header() {
		$this->load->view('templetes/header');
	}

	private function _footer() {
		$this->load->view('templetes/footer');
	}

	public function index() {
		$this->lists();
	}

	public function lists() {
		$this->_header();
		$data['list'] = $this->todo_model->get_list();
		$this->load->view('todo/list_view', $data);
		$this->_footer();
	}

	public function view($id) {
		$this->_header();
		// todo 번호에 해당하는 데이터 가져오기
		//$id = $this->uri->segment(3);
		$data['views'] = $this->todo_model->get_view($id);
		// view 호출
		$this->load->view('todo/view_view', $data);
		$this->_footer();
	}
}
