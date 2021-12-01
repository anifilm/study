<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {
	public function __construct() {
		parent::__construct();

		//$this->load->database();
		$this->load->model('board_model');
		$this->load->helper(array('url', 'date', 'form'));

		// 경고창 헬퍼 로딩
		$this->load->helper('alert');
	}

	/**
	 * 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
	 */
	public function index() {
		$this->lists();
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
	public function view() {
		// 게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
		$data['views'] = $this->board_model->get_view('ci_board', $this->uri->segment(3));

		// view 호출
		$this->load->view('board/view_view', $data);
	}

 	/**
	 * 게시물 쓰기
	 */
	public function write() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		// 폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		// 폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules(
			'subject',
			'제목',
			'required',
			array('required'  => '%s은 필수입력 항목입니다.'),
		);
		$this->form_validation->set_rules(
			'contents',
			'내용',
			'required',
			array('required'  => '%s은 필수입력 항목입니다.'),
		);

		if ($this->form_validation->run() == TRUE) {
			// 새로운 글 작성 POST 전송 시

			// 주소 중에서 page 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
			//$uri_array = $this->segment_explode($this->uri->uri_string());

			//if (in_array('page', $uri_array)) {
			//	$pages = urldecode($this->url_explode($uri_array, 'page'));
			//}
			//else {
			//	$pages = 1;
			//}

			// 폼 검증으로 변경
			//if (!$this->input->post('subject', TRUE) && !$this->input->post('contents', TRUE)) {
			//	// 글 내용이 없을 경우, 프로그램단에서 한번 더 체크
			//	alert('비정상적인 접근입니다.', '/board/lists/'.$this->uri->segment(3));
			//	exit;
			//}

			$write_data = array(
				'table' => 'ci_board',
				'subject' => $this->input->post('subject', TRUE),
				'contents' => $this->input->post('contents', TRUE),
			);

			$result = $this->board_model->insert_board($write_data);

			if ($result) {
				// 글 작성 성공시 게시판 목록으로
				alert('새로운 글이 등록되었습니다.', '/board/lists');
				exit;
			}
			else {
				// 글 작성 실패시 게시판 목록으로
				alert('새로운 글 작서에 실패하였습니다. 다시 입력해주세요.', '/board/write');
				exit;
			}
		}
		else {
			$data['label'] = '새로운 글 작성';
			$data['button'] = '작성 완료';
			// 쓰기 폼 view 호출
			$this->load->view('board/write_view', $data);
		}
	}

	/**
	 * 게시물 수정
	 */
	public function modify() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		// 폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		// 폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('subject', '제목', 'required');
		$this->form_validation->set_rules('contents', '내용', 'required');

		if ($this->form_validation->run() == TRUE) {
			// 게시글 수정 POST 전송 시

			// 주소 중에서 page 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
			//$uri_array = $this->segment_explode($this->uri->uri_string());

			//if (in_array('page', $uri_array)) {
			//	$pages = urldecode($this->url_explode($uri_array, 'page'));
			//}
			//else {
			//	$pages = 1;
			//}

			// 폼 검증으로 변경
			//if (!$this->input->post('subject', TRUE) && !$this->input->post('contents', TRUE)) {
			//	// 글 내용이 없을 경우, 프로그램단에서 한번 더 체크
			//	alert('비정상적인 접근입니다.', '/board/lists/'.$this->uri->segment(3));
			//	exit;
			//}

			$modify_data = array(
				'table' => 'ci_board', // 게시판 테이블 명
				'board_id' => $this->uri->segment(3), // 게시물 번호
				'subject' => $this->input->post('subject', TRUE),
				'contents' => $this->input->post('contents', TRUE),
			);

			$result = $this->board_model->modify_board($modify_data);

			if ($result) {
				// 글 수정 성공시 게시판 목록으로
				alert('글 수정을 완료하였습니다.', '/board/lists');
				exit;
			}
			else {
				// 글 수정 실패시 게시판 목록으로
				alert('글 수정에 실패하였습니다. 다시 수정해주세요.', '/board/write');
				exit;
			}
		}
		else {
			// 게시물 내용 가져오기
			$data['views'] = $this->board_model->get_view('ci_board', $this->uri->segment(3));

			$data['label'] = '게시글 수정';
			$data['button'] = '수정 완료';
			// 쓰기 폼 view 호출
			$this->load->view('board/write_view', $data);
		}
	}

	/**
	 * 게시물 삭제
	 */
	public function delete() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		//게시물 번호에 해당하는 게시물 삭제
		$return = $this->board_model->delete_content('ci_board', $this->uri->segment(3));

		//게시물 목록으로 돌아가기
		if ($return) {
			// 삭제 성공시
			alert('게시글이 삭제되었습니다.', '/board/lists/');
		}
		else {
			// 삭제 실패시
			alert('게시글 삭제에 실패하였습니다.', '/board/view/'.$this->uri->segment(3));
		}
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
