<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
	}

	//protected function _sidebar() {
	//	$topics = $this->topic_model->gets();
	//	$this->load->helper('korean'); // kdate 헬퍼 호출
	//	$this->load->view('topic_list', array('topics' => $topics));
	//}

	protected function _header() {
		// 로그인 사용자 정보 확인
		//echo '<pre>';
		//var_dump($this->session->all_userdata());
		//echo '</pre>';

		//$this->load->config('opentutorials');
		$this->load->view('templetes/header');

		// 사이드 바 항목
		$topics = $this->topic_model->gets();
		$this->load->helper('korean'); // kdate 헬퍼 호출
		$this->load->view('topic_list', array('topics' => $topics));
	}

	protected function _footer() {
		$this->load->view('templetes/footer');
	}
}
