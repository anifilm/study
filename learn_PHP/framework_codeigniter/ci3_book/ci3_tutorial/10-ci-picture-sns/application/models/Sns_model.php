<?php

class Sns_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * SNS 게시물 내용 가져오기
	 *
	 * @param string $id sns_files id
	 * @return array 글내용
	 */
	function get_sns($id) {
		$table = 'ci_sns_files';
		$query = $this->db->get_where($table, array('id' => $id));

		return $query->row_array();
	}

	/**
	 * SNS 게시물 리스트 가져오기
	 *
	 * @return array 리스트
	 */
	public function get_sns_list($type='', $offset='', $limit='', $search_word='') {
		$table='ci_sns_files';
		$s_word = '';

		if ($search_word != '') {
			// 검색어가 있을 경우의 처리
    		$s_word = " and (subject like '%$search_word%' or contents like '%$search_word%' or original_name like '%$search_word%')";
		}

		$limit_query = '';

		if ($limit != '' or $offset != '') {
			// 페이징이 있을 경우의 처리
			$limit_query = "LIMIT $offset, $limit";
		}

		$sql = "SELECT * FROM $table WHERE pid='0' $s_word ORDER BY id DESC $limit_query";
		$query = $this->db->query($sql);

		if ($type == 'count') {
			// 리스트를 반환하는 것이 아니라 전체 게시물의 개수를 반환
			$result = $query->num_rows();
		} else {
			// 게시물 리스트를 반환
			$result = $query->result();
		}

		return $result;
	}

	/**
	 * SNS 게시물 상세보기 가져오기
	 *
	 * @param string $id 게시물번호
	 * @return array
	 */
    public function get_view($id) {
		$table = 'ci_sns_files';
		// 조회수 증가 (TODO: refresh시 계속 증가되는 것을 해당 게시물 클릭시에만 증가하는 것으로 수정 필요)
		$sql_hits = "UPDATE $table SET hits=hits+1 WHERE board_id='$id'";
		$this->db->query($sql_hits);

		$sql = "SELECT * FROM $table WHERE id='$id'";
		$query = $this->db->query($sql);

		// 게시물 내용 반환
		$result = $query->row();

		return $result;
	}

	/**
	 * SNS 게시물 추가
	 *
	 * @param array $arrays 업로드 파일 정보 및 글내용
	 * @return string 글번호
	 */
	public function insert_sns($arrays) {
		$table = 'ci_sns_files';
		// 업로드 파일 기타 정보
		$detail = array(
			'file_size' => (int) $arrays['file_size'],
			'image_width' => $arrays['image_width'],
			'image_height' => $arrays['image_height'],
			'file_ext' => $arrays['file_ext'],
		);

		$insert_array = array(
			'username' => $arrays['username'],
			'subject' => $arrays['subject'],
			'contents' => $arrays['contents'],
			'file_path' => $arrays['file_path'],
			'file_name' => $arrays['file_name'],
			'original_name' => $arrays['orig_name'],
			'detail_info' => serialize($detail),
			'reg_date' => date("Y-m-d H:i:s"),
		);
		$this->db->insert($table, $insert_array);

		$result = $this->db->insert_id();

		// 결과 반환
		return $result;
	}

	/**
	 * 게시물 수정
	 * @param array $arrays 게시물번호, 게시물제목, 게시물내용 1차 배열
	 * @return boolean 입력 성공여부
	 */
	public function modify_sns($arrays) {
		$table = 'ci_sns_files';

		if ($arrays['file_name']) {
			// 업로드 파일 기타 정보
			$detail = array(
				'file_size'    => (int)$arrays['file_size'],
				'image_width'  => $arrays['image_width'],
				'image_height' => $arrays['image_height'],
				'file_ext' => $arrays['file_ext'],
			);

			$modify_array = array(
				'subject'   => $arrays['subject'],
				'contents'  => $arrays['contents'],
				'file_path' => $arrays['file_path'],
				'file_name' => $arrays['file_name'],
				'original_name' => $arrays['orig_name'],
				'detail_info'   => serialize($detail),
				'reg_date' => date("Y-m-d H:i:s"),
			);
		}
		else {
			$modify_array = array(
				'subject'  => $arrays['subject'],
				'contents' => $arrays['contents'],
			);
		}

		$where = array('id' => $arrays['id']);

		$result = $this->db->update($table, $modify_array, $where);

		//결과 반환
		return $result;
	}

	/**
	 * 게시물 삭제
	 *
	 * @param string $table 테이블명
	 * @param string $id 게시물 번호
	 * @return boolean 삭제 성공여부
	 */
	public function delete_content($id) {
		$table = 'ci_sns_files';
		$delete_array = array('id' => $id);
		$result = $this->db->delete($table, $delete_array);

		//결과 반환
		return $result;
	}

    /**
	 * 게시물 작성자 아이디 반환
	 *
	 * @param string $id 게시물 번호
	 * @return string 작성자명
	 */
	function writer_check($id) {
		$table = 'ci_sns_files';
		$sql = "SELECT username FROM $table WHERE id='$id'";
		$query = $this->db->query($sql);

		return $query->row();
	}

	/**
	 * 댓글 입력
	 *
	 * @param array $arrays 게시물 제목, 게시물 내용, 작성자명 1차 배열
	 * @return boolean 입력 성공여부
	 */
	function insert_comment($arrays) {
		$table = 'ci_sns_files';
		$insert_array = array(
			'pid' => $arrays['pid'], // 원글번호 입력
			'username' => $arrays['username'],
			'subject'  => $arrays['subject'],
			'contents' => $arrays['contents'],
			'reg_date' => date("Y-m-d H:i:s")
		);

		$this->db->insert($table, $insert_array);

		$id = $this->db->insert_id();

		//결과 반환
		return $id;
 	}

	/**
	 * 댓글 리스트 가져오기
	 *
	 * @param string $id 게시물 번호
	 * @return array
	 */
    function get_comment($id) {
		$table = 'ci_sns_files';
    	$sql = "SELECT * FROM $table WHERE pid='$id' ORDER BY id DESC";
   		$query = $this->db->query($sql);
	    $result = $query->result();

        // 댓글 리스트 반환
    	return $result;
    }
}
