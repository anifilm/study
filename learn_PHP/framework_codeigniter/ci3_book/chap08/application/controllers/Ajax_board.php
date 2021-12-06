<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_board extends CI_Controller {
	public function __construct() {
		parent::__construct();

		//$this->load->database();
		$this->load->model('board_model');
		$this->load->helper(array('url', 'date', 'form'));
	}

	/**
	 * Ajax 테스트
	 */
	public function test() {
		$this->load->view('ajax/test_view');
	}

	public function ajax_action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$name = $this->input->post('name');
		echo $name.'님 반갑습니다.';
	}

	public function ajax_comment_add() {
		if ($this->session->userdata('logged_in') == TRUE) {
			//$this->load->model('board_model');

			$table = $this->input->post('table', TRUE);
			$board_id = $this->input->post('board_id', TRUE);
			$comment_contents = $this->input->post('comment_contents', TRUE);

			if ($comment_contents != '') {
				$write_data = array(
					'table'     => $table,    // 게시판 테이블명
					'board_pid' => $board_id, // 원글 번호
					'subject'   => '',
					'contents'  => $comment_contents,
					'username'  => $this->session->userdata('username'),
				);

				$result = $this->board_model->insert_comment($write_data);

				if ($result) {
					// 글 작성 성공시 댓글 목록을 만들어 화면에 출력
					$sql = "SELECT * FROM $table WHERE board_pid='$board_id' ORDER BY board_id DESC";
					$query = $this->db->query($sql);
?>
<table cellspacing="0" cellpadding="0" id="comment_table" class="table">
<?php foreach ($query->result() as $lt): ?>
	<tr>
		<td width="54%"><small><?= $lt->contents ?></small></td>
		<td width="26%"><small><?= $lt->username ?></small></td>
		<td>
			<small><time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->reg_date)) ?>"><?= date('Y-m-d H:i', human_to_unix($lt->reg_date)) ?></time></small>
		</td>
	</tr>
<?php endforeach ?>
</table>
<?php
				}
				else {
					// 글 작성 실패시
					echo '2000';
				}

			}
			else {
				// 글 내용이 없을 경우
				echo '1000';
			}
		}
		else {
			echo '9000'; // 로그인 필요 에러
		}
	}

	public function ajax_comment_delete() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$table = $this->input->post('table', TRUE);
			$board_id = $this->input->post('board_id', TRUE);

			// 글 작성자가 본인인지 검증
			$writer_id = $this->board_model->writer_check($table, $board_id);

			if ($writer_id->username != $this->session->userdata('username')) {
				echo '8000'; // 자신이 작성한 글이 아닙니다.
			}
			else {
				$result = $this->board_model->delete_content($table, $board_id);

				if ($result) {
					echo $board_id;
				}
				else {
					// 글 삭제 실패시
					echo '2000';
				}
			}
		}
		else {
			echo '9000'; // 로그인 필요 에러
		}
	}
}
