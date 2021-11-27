<?php

class Board_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 게시물 목록 가져오기
	 *
	 * @param string $table 게시판 테이블
	 * @param string $type 총 게시물 수 또는 게시물 배열을 반환할 지를 결정하는 구분자
	 * @param string $offset 게시물 가져올 순서
	 * @param string $limit 한 화면에 표시할 게시물 갯수
	 * @param string $search_word 검색어
	 * @return array
	 */
	public function get_list($table='ci_board', $type='', $offset='', $limit='', $search_word='') {
		$sword = '';

		if ($search_word != '') {
			// 검색어가 있을 경우의 처리
			$sword = "WHERE subject LIKE '%$search_word%' OR contents LIKE '%$search_word%'";
		}

		$limit_query = '';

		if ($limit != '' or $offset != '') {
			// 페이징이 있을 경우의 처리
			$limit_query = "LIMIT $offset, $limit";
		}

		$sql = "SELECT * FROM $table $sword ORDER BY board_id DESC $limit_query";
		$query = $this->db->query($sql);

		if ($type == 'count') {
			// 리스트를 반환하는 것이 아니라 전체 게시물의 개수를 반환
			$result = $query->num_rows();
			//$this->db->count_all($table);
		} else {
			// 게시물 리스트를 반환
			$result = $query->result();
			//$result = $query->result_array();
		}

		return $result;
	}

	/**
	 * 게시물 상세보기 가져오기
	 *
	 * @param string $table 게시판 테이블
	 * @param string $id 게시물번호
	 * @return array
	 */
    function get_view($table, $id) {
		//
	}

	/**
	 * 게시물 추가
	 *
	 * @param array $arrays 테이블명, 게시물 제목, 게시물 내용, 아이디 1차 배열
	 * @return boolean 입력 성공여부
	 */
	function insert_board($arrays) {
		//
	}

	/**
	 * 게시물 수정
	 *
	 * @param array $arrays 테이블명, 게시물번호, 게시물제목, 게시물내용 1차 배열
	 * @return boolean 입력 성공여부
	 */
	function modify_board($arrays) {
		//
	}

	/**
	 * 게시물 삭제
	 *
	 * @param string $table 테이블명
	 * @param string $no 게시물번호
	 * @return boolean 삭제 성공여부
	 */
	function delete_content($table, $no) {
		//
	}
}
