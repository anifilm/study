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
		// 페이지네이션 라이브러리 로딩
		$this->load->library('pagination');

		// 페이지네이션 설정
		$config['base_url'] = '/board/lists/page'; // 페이징 주소
		$config['total_rows'] = $this->board_model->get_list('ci_board', 'count'); // 게시물의 전체 개수
		$config['per_page'] = 5; // 한 페이지에 표시할 게시물 수
		$config['uri_segment'] = 0; // 페이지 번호가 위치한 세그먼트

		// Bootstrap 4, work very fine.
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		// 페이지네이션 초기화
		$this->pagination->initialize($config);
		// 페이징 링크를 생성하여 view에서 사용할 변수에 할당
		$data['pagination'] = $this->pagination->create_links();

		// 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
		$page = $this->uri->segment(4, 1);

		if ($page > 1) {
			$start = ($page / $config['per_page']) * $config['per_page'];
		} else {
			$start = ($page - 1) * $config['per_page'];
		}

		$limit = $config['per_page'];

		$data['list'] = $this->board_model->get_list('ci_board', '', $start, $limit);

		//$data['list'] = $this->board_model->get_list();
		$this->load->view('board/list_view', $data);
	}
}
