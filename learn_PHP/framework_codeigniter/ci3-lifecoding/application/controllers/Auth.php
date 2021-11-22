<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('topic_model');
	}

	private function _header() {
		$this->load->view('templetes/header');

		$topics = $this->topic_model->gets();
		$this->load->helper('korean'); // kdate 헬퍼 호출
		$this->load->view('topic_list', array('topics' => $topics));
	}

	private function _footer() {
		$this->load->view('templetes/footer');
	}

	public function login() {
		$this->_header();
		$this->load->view('login');
		$this->load->view('main');
		$this->_footer();
	}

	public function signup() {
		// TODO: 회원가입 관련 내용 추가
		$this->_header();
		$this->load->view('signup');
		$this->load->view('main');
		$this->_footer();
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function authentication() {
		$authentication = ($this->config->item('authentication'));

		if ($this->input->post('email') == $authentication['email'] && $this->input->post('password') == $authentication['password']) {
			// 로그인시 로그인 상태 true, 사용자 이름을 추가
			$this->session->set_userdata('is_login', true);
			$this->session->set_userdata('username', $authentication['username']);
			redirect(base_url().'topic/add');
		}
		else {
			$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
			redirect(base_url());
		}
	}
}
