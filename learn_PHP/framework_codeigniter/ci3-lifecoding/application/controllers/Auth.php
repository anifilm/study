<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('topic_model');
	}

	public function login() {
		$this->_header();
		$this->load->view('login');
		$this->load->view('main');
		$this->_footer();
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function signup() {
		$this->_header();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('username', '사용자명', 'required|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
		$this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->view('signup');
		}
		else {
			if(!function_exists('password_hash')){
				$this->load->helper('password');
			}
			$hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

			$this->load->model('user_model');
			$this->user_model->add(array(
				'email'=>$this->input->post('email'),
				'username'=>$this->input->post('username'),
				'password'=>$hash,
			));

			$this->session->set_flashdata('message', '회원가입에 성공했습니다.');
			redirect(base_url());
		}

		$this->load->view('main');
		$this->_footer();
	}

	public function authentication() {
		//$authentication = ($this->config->item('authentication'));

		//if ($this->input->post('email') == $authentication['email'] && $this->input->post('password') == $authentication['password']) {
		//	// 로그인시 로그인 상태 true, 사용자 이름을 추가
		//	$this->session->set_userdata('is_login', true);
		//	$this->session->set_userdata('username', $authentication['username']);
		//	redirect(base_url().'topic/add');
		//}
		//else {
		//	$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
		//	redirect(base_url());
		//}

		$this->load->model('user_model');
		$user = $this->user_model->getByEmail(array('email' => $this->input->post('email')));
		if (!function_exists('password_hash')) {
			$this->load->helper('password');
		}

		if ($this->input->post('email') == $user->email && password_verify($this->input->post('password'), $user->password)) {
			$this->session->set_userdata('is_login', true);
			$this->session->set_userdata('username', $user->username);
			redirect(base_url());
		} else {
			$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
			redirect(base_url().'auth/login');
		}
	}
}
