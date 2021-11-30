<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 주소에서 메소드가 생략되었을 때 실행되는 기본 메소드
	 */
	public function index() {
		$this->forms();
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
	 * 폼 검증 테스트
	 */
	public function forms() {
		//$this->output->enable_profiler(TRUE); // 오류 발생으로 주석처리

		// 폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		// 폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules(
			'email',
			'이메일',
			'required|valid_email|is_unique[ci_board_users.email]',
			array(
				'required'  => '%s는 필수입력 항목입니다.',
				'is_unique' => '%s는 이미 사용중인 이메일입니다.'
			)
		);
		$this->form_validation->set_rules(
			'username',
			'사용자명',
			'trim|required|min_length[2]|max_length[20]|is_unique[ci_board_users.username]',
			array(
				'required'  => '%s은 필수입력 항목입니다.',
				'is_unique' => '%s는 이미 사용중인 사용자명입니다.'
			)
		);
		$this->form_validation->set_rules(
			'password',
			'비밀번호',
			'trim|required|min_length[6]|max_length[30]|matches[passconf]',
			array(
				'required' => '%s는 필수입력 항목입니다.',
				'matches'  => '%s가 일치하지 않습니다.',
			)
		);
		$this->form_validation->set_rules(
			'passconf',
			'비밀번호 확인',
			'trim|required',
			array(
				'required' => '%s은 필수입력 항목입니다.'
			)
		);

		if ($this->form_validation->run() == FALSE) {
			// 폼 검증이 실패했을 경우 또는 일반 입력 페이지
			$this->load->view('test/forms_view');
		}
		else {
			// 폼 검증이 성공했을 때 보여줄 페이지
			$this->load->view('test/form_success_view');
		}
	}
}
