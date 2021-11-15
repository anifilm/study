<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('topic_model');
	}

	private function _header() {
		$topics = $this->topic_model->gets();
		$this->load->view('templetes/header');
		$this->load->view('topic_list', array('topics' => $topics));
	}

	private function _footer() {
		$this->load->view('templetes/footer');
	}

    public function index() {
		$this->_header();
		$this->load->view('main');
		$this->_footer();
    }

    public function get($id) {
		$this->_header();
        $topic = $this->topic_model->get($id);
		$this->load->helper(array('url', 'HTML', 'korean'));
        $this->load->view('get', array('topic' => $topic));
		$this->_footer();
    }

	public function add() {
		$this->_header();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', '제목', 'required');
		$this->form_validation->set_rules('description', '본문', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('add');
		} else {
			echo '성공';
			//$this->load->view('formsuccess');
		}

		$this->_footer();
	}
}
