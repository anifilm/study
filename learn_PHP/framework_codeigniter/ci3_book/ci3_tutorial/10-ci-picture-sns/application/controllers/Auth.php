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
	 * 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
	 */
	public function index() {
		$this->login();
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
			array(
				'required'    => '{field}은 필수입력 항목입니다.',
				'valid_email' => '사용자의 로그인 {field} 계정 정보가 정확하지 않습니다.',
			),
		);
		$this->form_validation->set_rules(
			'password',
			'비밀번호',
			'required',
			array('required' => '{field}는 필수입력 항목입니다.'),
		);

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if ($this->form_validation->run() == FALSE) {
			// 폼 검증 실패시, 로그인 폼 view 호출
			$this->load->view('auth/login_view');
		}
		else {
			// 폼 검증 성공시
			$user = $this->auth_model->getUser(array('email' => $this->input->post('email', TRUE)));

			$result_email = $this->input->post('email', TRUE) == $user->email;
			$result_password = password_verify($this->input->post('password', TRUE), $user->password);

			if ($result_email && $result_password) {
				// 세션 생성
				$newdata = array(
					'email' => $user->email,
					'username' => $user->username,
					'logged_in' => TRUE,
				);

				$this->session->set_userdata($newdata);

				alert('로그인 되었습니다.', '/sns/lists');
				// TODO: 새글 작성하기로 로그인시, 로그인후 글 작성으로 바로 리다이렉션 하기
				exit;
			}
			else {
				// 실패 시
				alert('이메일 계정과 비밀번호를 확인해 주세요.', '/auth/login');
				exit;
			}
		}
	}

	/**
	 * 로그아웃 처리
	 */
	public function logout() {
		$this->session->sess_destroy();

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		alert('로그아웃 되었습니다.', '/sns/lists');
		exit;
	}

	/**
	 * 계정생성 처리
	 */
	public function signup() {
		// 폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		// 폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules(
			'email',
			'이메일',
			'required|valid_email|is_unique[ci_board_users.email]',
			array(
				'required'  => '{field}는 필수입력 항목입니다.',
				'is_unique' => '{field}는 이미 사용중인 이메일입니다.'
			),
		);
		$this->form_validation->set_rules(
			'username',
			'사용자명',
			'trim|required|min_length[2]|max_length[20]|is_unique[ci_board_users.username]',
			array(
				'required'  => '{field}은 필수입력 항목입니다.',
				'is_unique' => '{field}는 이미 사용중인 사용자명입니다.'
			),
		);
		$this->form_validation->set_rules(
			'password',
			'비밀번호',
			'trim|required|min_length[6]|max_length[30]|matches[passconf]',
			array(
				'required' => '{field}는 필수입력 항목입니다.',
				'matches'  => '{field}가 일치하지 않습니다.',
				'min_length' => '{field}의 길이는 {param}자 이상이어야 합니다.',
				'max_length' => '{field}의 길이는 {param}자 이하여야 합니다.',
			),
		);
		$this->form_validation->set_rules(
			'passconf',
			'비밀번호 확인',
			'trim|required',
			array('required' => '{field}은 필수입력 항목입니다.'),
		);

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if ($this->form_validation->run() === FALSE) {
			// 폼 검증 실패시, 회원가입 폼 호출
			$this->load->view('/auth/signup_view');
		}
		else {
			// 폼 검증 성공시
			$hash = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT);

			$this->auth_model->addUser(
				array(
					'email' => $this->input->post('email', TRUE),
					'username' => $this->input->post('username', TRUE),
					'password' => $hash,
				),
			);

			alert('회원가입이 완료되었습니다.', '/sns/lists');
			exit;
		}
	}
}
