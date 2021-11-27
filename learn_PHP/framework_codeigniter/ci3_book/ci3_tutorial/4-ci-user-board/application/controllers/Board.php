<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('board_model');
		$this->load->helper(array('url', 'date'));
	}

	/**
	 * 주소에서 메소드가 생략되었을 때 실행되는 기본 메소드
	 */
	public function index() {
		$this->lists();
	}

	/**
	 * 사이트 헤더, 푸터를 자동으로 추가해준다.
	 *
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
	 * 목록 불러오기
	 */
	public function lists() {
		//$this->output->enable_profiler(TRUE); // 오류 발생으로 주석처리

		// 검색어 초기화
		$search_word = $page_url = '';
		$uri_segment = 4;

		// 주소 중에서 q(검색어) 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
		$uri_array = $this->segment_explode($this->uri->uri_string());

		if (in_array('q', $uri_array)) {
			// 주소에 검색어가 있을 경우의 처리
			$search_word = urldecode($this->url_explode($uri_array, 'q'));

			// 페이지네이션용 주소
			$page_url = '/q/'.$search_word;
			$uri_segment = 6;
		}

		// 페이지네이션 라이브러리 로딩
		$this->load->library('pagination');

		// 페이지네이션 설정
		$config['base_url'] = '/board/lists/'.$page_url.'/page/'; // 페이징 주소
		$config['total_rows'] = $this->board_model->get_list('ci_board', 'count', '', '', $search_word); // 게시물의 전체 개수
		$config['per_page'] = 5; // 한 페이지에 표시할 게시물 수
		$config['uri_segment'] = $uri_segment; // 페이지 번호가 위치한 세그먼트

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
		$page = $this->uri->segment($uri_segment, 1);

		if ($page > 1) {
			$start = ($page / $config['per_page']) * $config['per_page'];
		} else {
			$start = ($page - 1) * $config['per_page'];
		}

		$limit = $config['per_page'];

		$data['list'] = $this->board_model->get_list('ci_board', '', $start, $limit, $search_word);

		//$data['list'] = $this->board_model->get_list();
		$this->load->view('board/list_view', $data);
	}

	/**
	 * 게시물 보기
	 */
	function view() {
		//
	}

 	/**
	 * 게시물 쓰기
	 */
	function write() {
		//
	}

	/**
	 * 게시물 수정
	 */
	function modify() {
		//
	}

	/**
	 * 게시물 삭제
	 */
	function delete() {
		//
	}

	/**
	 * url 중 키값을 구분하여 값을 가져오도록
	 *
	 * @param array $url segment_explode한 url 값
	 * @param string $key 가져오려는 값의 key
	 * @return string $url[$k]
	 */
	public function url_explode($url, $key) {
		$cnt = count($url);
		for ($i = 0; $cnt > $i; $i++) {
			if ($url[$i] == $key) {
				$k = $i + 1;
				return $url[$k];
			}
		}
	}

	/**
	 * HTTP의 URL을 '/'를 Delimiter로 사용하여 배열로 바꿔 리턴한다.
	 *
	 * @param string 대상이 되는 문자열
	 * @return string[]
	 */
	public function segment_explode($seg) {
		// 세그먼트 앞뒤 '/' 제거 후 uri를 배열로 반환
		$len = strlen($seg);
		if (substr($seg, 0, 1) == '/') {
			$seg = substr($seg, 1, $len);
		}

		$len = strlen($seg);
		if (substr($seg, -1) == '/') {
			$seg = substr($seg, 0, $len - 1);
		}

		$seg_exp = explode('/', $seg);

		return $seg_exp;
	}
}
