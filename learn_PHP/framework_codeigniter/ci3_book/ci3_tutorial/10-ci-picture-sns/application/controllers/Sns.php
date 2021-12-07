<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sns extends CI_Controller {
	public function __construct() {
		parent::__construct();

		//$this->load->database();
		$this->load->model('sns_model');
		$this->load->helper(array('url', 'date', 'form'));

		//$this->load->library('session');

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
		$this->lists();
	}

	/**
	 * 사진 게시물 목록 보기
	 */
	public function lists() {
		// 검색어 초기화
		$search_word = '';

		// 주소 중에서 q(검색어) 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
		$uri_array = array_values($this->uri->segment_array());

		if (in_array('q', $uri_array)) {
			// 주소에 검색어가 있을 경우의 처리
			$search_word = urldecode($this->url_explode($uri_array, 'q'));
		}

		$data['list'] = $this->sns_model->get_sns_list('', 0, 6, $search_word);

		$this->load->view('sns/list_view', $data);
	}

	/**
	 * 사진 게시물 상세 보기
	 */
	public function view() {
		$id = $this->uri->segment(3);

 		//게시물 가져오기
 		$data['views'] = $this->sns_model->get_view($id);
		//댓글 리스트 가져오기
 		$data['comment_list'] = $this->sns_model->get_comment($id);
		// 작성자 검증용
		$data['writer'] = FALSE;

		// 게시물 수정/삭제 버튼 표시에 대한 사용자 확인
		if ($this->session->userdata('logged_in') == TRUE) {
			// 해당 글의 작성자가 본인인지 검증
			$writer_id = $this->sns_model->writer_check($id);

			if ($writer_id->username == $this->session->userdata('username')) {
				$data['writer'] = TRUE;
			}
		}

		// view 호출
		$this->load->view('sns/view_view', $data);
	}

 	/**
	 * 사진 게시물 올리기
	 */
	public function upload_photo() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if ($this->session->userdata('logged_in') == TRUE) {
			// 폼 검증 라이브러리 로드
			$this->load->library('form_validation');

			// 폼 검증할 필드와 규칙 사전 정의
			$this->form_validation->set_rules(
				'subject',
				'제목',
				'required',
				array('required'  => '{field}은 필수입력 항목입니다.'),
			);
			$this->form_validation->set_rules(
				'contents',
				'내용',
				'required',
				array('required'  => '{field}은 필수입력 항목입니다.'),
			);

			if ($this->form_validation->run() == TRUE) {
				// upload 설정
				$config = array(
					'upload_path' => 'uploads/',
					'allowed_types' => 'gif|jpg|png',
					'encrypt_name' => TRUE,
					'max_size' => '1000',
				);

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()) {
					$data['error'] = $this->upload->display_errors();
					$this->load->view('sns/upload_photo_view', $data);
				}
				else {
					$upload_data = $this->upload->data();

					if ($upload_data['image_width'] > 300) {
						// 이미지 리사이즈. 파일명_thumb.확장자 형태로 썸네일 생성
						$config['image_library'] = 'gd2';
						$config['source_image'] = $upload_data['full_path'];
						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width'] = 300;
						$config['height'] = 300;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
					}
				}

				$upload_data['subject'] = $this->input->post('subject', true);
				$upload_data['content'] = $this->input->post('content', true);
				$upload_data['username'] = $this->session->userdata('username');

				$result = $this->sns_model->insert_sns($upload_data);

				// TODO: exit 다음 페이스북 전송 가능? (체크해볼것)
				redirect('/sns/lists'); exit;

				// 페이스북 전송
				if ($result) {
					// sns 라이브러리 로드
					$this->load->library('sns');
					$this->facebook = $this->sns->facebook();
					$this->facebook->setCallback(site_url('upload_photo/facebook_upload/'.$result));

					if (!$this->facebook->isLoggedIn()) {
						$this->facebook->login();
					}
				}
				else {
					alert('입력에 실패 했습니다.', '/sns/upload_photo');
				}
			}
			else {
				// 사진 게시물 올리기 폼 view 호출
				$this->load->view('sns/upload_photo_view');
			}
		}
		else {
			alert('로그인 후 작성하세요.', '/auth/login');
			exit;
		}
	}

	public function facebook_upload() {
		// 글 정보 가져오기
		$id = $this->uri->segment(3);
		$result = $this->sns_model->get_sns($id);

		// 앨범 업로드
		$this->facebook->upload_photo($result['contents'], $result['file_path'].$result['file_name'], '');
		redirect('/sns/lists');
	}

	/**
	 * 사진 게시물 수정
	 */
	public function modify_photo() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		// 주소 중에서 page 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
		//$uri_array = $this->segment_explode($this->uri->uri_string());

		//if (in_array('page', $uri_array)) {
		//	$pages = urldecode($this->url_explode($uri_array, 'page'));
		//}
		//else {
		//	$pages = 1;
		//}

		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(3);
			// 수정하려는 글의 작성자가 본인인지 검증
			$writer_id = $this->sns_model->writer_check($id);

			if ($writer_id->username != $this->session->userdata('username')) {
				alert('본인이 작성한 글이 아닙니다.', '/sns/view/'.$id);
				exit;
			}

			// 폼 검증 라이브러리 로드
			$this->load->library('form_validation');

			// 폼 검증할 필드와 규칙 사전 정의
			$this->form_validation->set_rules('subject', '제목', 'required');
			$this->form_validation->set_rules('contents', '내용', 'required');

			if ($this->form_validation->run() == TRUE) {
				if (!$this->input->post('subject', TRUE) && !$this->input->post('contents', TRUE)) {
					// 글 내용이 없을 경우, 프로그램단에서 한번 더 체크
					alert('비정상적인 접근입니다.', '/sns/lists');
					exit;
				}

				if ($_FILES) { // 수정할 파일이 있다면
					// upload 설정
					$config = array(
						'upload_path' => 'uploads/',
						'allowed_types' => 'gif|jpg|png',
						'encrypt_name' => TRUE,
						'max_size' => '1000',
					);

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload()) {
						$data['error'] = $this->upload->display_errors();
						$this->load->view('sns/modify_photo_view', $data);
					}
					else {
						$upload_data = $this->upload->data();

						if($upload_data['image_width'] > 300) {
							// 이미지 리사이즈. 파일명_thumb.확장자 형태로 썸네일 생성
							$config['image_library'] = 'gd2';
							$config['source_image'] = $upload_data['full_path'];
							$config['create_thumb'] = TRUE;
							$config['maintain_ratio'] = TRUE;
							$config['width'] = 300;
							$config['height'] = 300;

							$this->load->library('image_lib', $config);
							$this->image_lib->resize();
						}
					}
				}
				else {
					$upload_data = array();
				}

				// 수정할 데이터 정리
				$upload_data['subject'] = $this->input->post('subject', true);
				$upload_data['contents'] = $this->input->post('contents', true);
				$upload_data['username'] = $this->session->userdata('username');
				$upload_data['id'] = $id;

				$result = $this->sns_model->update_sns($upload_data);

				// TODO: exit 다음 페이스북 전송 가능? (체크해볼것)
				redirect('/sns/lists'); exit;

				// 페이스북 전송
				if ($result) {
					// sns 라이브러리 로드
					$this->load->library('sns');
					$this->facebook = $this->sns->facebook();
					$this->facebook->setCallback(site_url('upload_photo/facebook_upload/'.$result));

					if (!$this->facebook->isLoggedIn()) {
						$this->facebook->login();
					}
				}
				else {
					alert('입력에 실패 했습니다.', '/sns/upload_photo');
				}

				if ($result) {
					// 글 수정 성공시 게시판 목록으로
					alert('글 수정을 완료하였습니다.', '/sns/lists');
					exit;
				}
				else {
					// 글 수정 실패시 해당 게시물 상세보기로
					alert('글 수정에 실패하였습니다. 다시 수정해주세요.', '/sns/view/'.$id);
					exit;
				}
			}
			else {
				// 게시물 내용 가져오기
				$data['views'] = $this->sns_model->get_view($id);
				// 쓰기 폼 view 호출
				$this->load->view('sns/modify_photo_view', $data);
			}
		}
		else {
			alert('로그인 후 수정하세요.', '/auth/login');
			exit;
		}
	}

	/**
	 * 게시물 삭제
	 */
	public function delete() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if ($this->session->userdata('logged_in') == TRUE) {
			// 수정하려는 글의 작성자가 본인인지 검증
			$id = $this->uri->segment(3);
			$writer_id = $this->sns_model->writer_check($id);

			if ($writer_id->username != $this->session->userdata('username')) {
				alert('본인이 작성한 글이 아닙니다.', '/sns/view/'.$id);
				exit;
			}

			//게시물 번호에 해당하는 게시물 삭제
			$return = $this->sns_model->delete_content($id);

			//게시물 목록으로 돌아가기
			if ($return) {
				// 삭제 성공시
				alert('게시물이 삭제되었습니다.', '/sns/lists/');
			}
			else {
				// 삭제 실패시
				alert('게시물 삭제에 실패하였습니다.', '/sns/view/'.$id);
			}
		}
		else {
			alert('로그인 후 삭제하세요.', '/auth/login');
			exit;
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
}
