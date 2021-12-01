<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();

		//$this->load->database();
		$this->load->model('auth_model');
		$this->load->helper(array('form'));

		// 경고창 헬퍼 로딩
		$this->load->helper('alert');
	}

	/**
	 * 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
	 */
	public function index() {
		$this->login();
	}

	/**
	 * 사이트 헤더, 푸터를 자동으로 추가해준다.
	 */
	public function _remap($method) {
		// 헤더 include
		$this->load->view('templetes/header');

		if (method_exists($this, $method)) {
			$this->{"{$method}"}();
		}

		// 푸터 include
		$this->load->view('templetes/footer');
	}

	/**
	 * 로그인 처리
	 */
	public function login() {
		// 폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		// 폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules(
			'email',
			'이메일',
			'required|valid_email',
			array('required'  => '%s은 필수입력 항목입니다.'),
		);
		$this->form_validation->set_rules(
			'password',
			'비밀번호',
			'required',
			array('required'  => '%s는 필수입력 항목입니다.'),
		);

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if ($this->form_validation->run() == TRUE) {
			$auth_data = array(
				'email' => $this->input->post('email', TRUE),
				'password' => $this->input->post('password', TRUE),
			);

			$result = $this->auth_model->login($auth_data);

			if ($result) {
				// 세션 생성
				$newdata = array(
					'email' => $result->email,
					'username' => $result->username,
					'logged_in' => TRUE,
				);

				$this->session->set_userdata($newdata);

				alert('로그인 되었습니다.', '/board/lists');
				// TODO: 새글 작성하기로 로그인시, 로그인후 글 작성으로 바로 리다이렉션 하기
				exit;
			}
			else {
				// 실패 시
				alert('이메일 계정과 비밀번호를 확인해 주세요.', '/auth/login');
				exit;
			}
		}
		else {
			// 로그인 폼 view 호출
			$this->load->view('auth/login_view');
		}
	}

	public function logout() {
		$this->session->sess_destroy();

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		alert('로그아웃 되었습니다.', '/board/lists');
		exit;
	}
}
