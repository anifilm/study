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

	public function write() {
		if ($_POST) {
			// 글쓰기 POST 전송시
			$content = $this->input->post('content', TRUE);
			$create_on = $this->input->post('created_on', TRUE);
			$due_date = $this->input->post('due_date', TRUE);

			$this->todo_model->insert_todo($content, $create_on, $due_date);
			redirect('/main/lists');
		}
		else {
			$this->_header();
			$data['label'] = '일정 추가';
			$data['button'] = '추가';
			// 쓰기 폼 view 호출
			$this->load->view('todo/write_view', $data);
			$this->_footer();
		}
	}

	public function update($id) {
		if ($_POST) {
			// 글쓰기 POST 전송시
			$content = $this->input->post('content', TRUE);
			$create_on = $this->input->post('created_on', TRUE);
			$due_date = $this->input->post('due_date', TRUE);

			$this->todo_model->update_todo($content, $create_on, $due_date, $id);
			redirect('/main/lists');
		}
		else {
			$this->_header();
			$data['views'] = $this->todo_model->get_view($id);
			$data['label'] = '일정 수정';
			$data['button'] = '수정';
			// 수정 폼 view 호출
			$this->load->view('todo/write_view', $data);
			$this->_footer();
		}
	}

	public function delete($id) {
		// 게시물 번호에 해당하는 게시물 삭제
		//$id = $this->url->segment(3);
		$this->todo_model->delete_todo($id);
		redirect('/main/lists');
	}
}
