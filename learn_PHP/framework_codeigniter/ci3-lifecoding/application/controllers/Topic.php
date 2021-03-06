<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends MY_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('topic_model');
	}

    public function index() {
		$this->_header();
		$this->load->view('main');
		$this->_footer();
    }

    public function get($id) {
		$this->_header();
        $topic = $this->topic_model->get($id);
		$this->load->helper(array('HTML', 'korean'));
        $this->load->view('get', array('topic' => $topic));
		$this->_footer();
    }

	public function add() {
		// 로그인 필요

		// 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
		if (!$this->session->userdata('is_login')) {
			redirect(base_url().'auth/login');
		}

		$this->_header();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', '제목', 'required');
		$this->form_validation->set_rules('description', '본문', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('add');
		}
		else {
			$topic_id = $this->topic_model->add(
				$this->input->post('title'),
				$this->input->post('description'),
			);

			// 새글 작성시 메일 전송 기능 추가
			$this->load->library('email');
			// 전송할 데이터가 html 문서임을 옵션으로 설정
			$this->email->initialize(array('mailtype' => 'html'));

			$this->email->from('anifilm02@gmail.com', 'anifilm');
			$this->email->to('richdad02@naver.com');
			$this->email->subject('새로운 글이 등록 되었습니다.');
			$this->email->message('<a href="'.base_url().'topic/get/'.$topic_id.'">'.$this->input->post('title').'</a>');

			$result = $this->email->send();

			if (!$result) { // 에러가 날 경우 디버그 설정을 해두면 에러 내용이 자세히 나온다.
				echo $this->email->print_debugger();
			}

			// 등록된 사용자 모두에게 메일 전송하는 로직
			//$this->load->model('user_model');
			//$users = $this->user_model->gets();

			//foreach ($users as $user) {
            //    $this->email->from('test@test.com', 'test');
            //    $this->email->to($user->email);
            //    $this->email->subject('새로운 글이 등록 되었습니다.');
            //    $this->email->message('<a href="'.site_url('/topic/get/'.$topic_id).'">'.$this->input->post('title').'</a>');
            //    $this->email->send();
            //}

			redirect(base_url().'topic/get/'.$topic_id);
			//echo '성공';
			//$this->load->view('formsuccess');
		}

		$this->_footer();
	}

	public function update($id) {
		// 로그인 필요

		// 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
		if (!$this->session->userdata('is_login')) {
			redirect(base_url().'auth/login');
		}

		$this->_header();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', '제목', 'required');
		$this->form_validation->set_rules('description', '본문', 'required');

		if ($this->form_validation->run() == FALSE) {
			$topic = $this->topic_model->get($id);
			$this->load->view('update', array('topic' => $topic));
		}
		else {
			$this->topic_model->update(
				$this->input->post('title'),
				$this->input->post('description'),
				$id,
			);

			redirect(base_url().'topic/get/'.$id);
			//echo '성공';
			//$this->load->view('formsuccess');
		}

		$this->_footer();
	}

	public function delete($id) {
		// 로그인 필요

		// 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
		if (!$this->session->userdata('is_login')) {
			redirect(base_url().'auth/login');
		}

		$this->topic_model->delete($id);

		redirect(base_url());
	}

	public function upload_receive() {
		// 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
		$config['upload_path'] = './static/user';
		// git,jpg,png 파일만 업로드를 허용한다.
		$config['allowed_types'] = 'gif|jpg|png';
		// 허용되는 파일의 최대 사이즈 (KB)
		$config['max_size'] = '100';
		// 이미지인 경우 허용되는 최대 폭
		$config['max_width']  = '1024';
		// 이미지인 경우 허용되는 최대 높이
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('user_upload_file')) {
            //$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
			echo '파일 업로드 실패';
 			echo $this->upload->display_errors();
        }
        else {
            $data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_success', $data);
			echo '파일 업로드 성공';
			echo '<pre>';
			var_dump($data);
			echo '</pre>';
        }
	}

	public function upload_receive_from_ck() {
		// 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
		$config['upload_path'] = './static/user';
		// git,jpg,png 파일만 업로드를 허용한다.
		$config['allowed_types'] = 'gif|jpg|png';
		// 허용되는 파일의 최대 사이즈 (KB)
		$config['max_size'] = '100';
		// 이미지인 경우 허용되는 최대 폭
		$config['max_width']  = '1024';
		// 이미지인 경우 허용되는 최대 높이
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('upload')) {
            //$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);

			echo '<script>alert("업로드에 실패 했습니다.\n'.$this->upload->display_errors('', '').'")</script>';
        }
        else {
            //$data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_success', $data);

			$CKEditorFuncNum = $this->input->get('CKEditorFuncNum');

			$data = $this->upload->data();
			$filename = $data['file_name'];
			$url = '/static/user/'.$filename;

			echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$CKEditorFuncNum.'", "'.$url.'", "전송에 성공했습니다.")</script>';
        }
	}

	public function upload_form() {
		$this->_header();
		$this->load->view('upload_form');
		$this->_footer();
	}
}
