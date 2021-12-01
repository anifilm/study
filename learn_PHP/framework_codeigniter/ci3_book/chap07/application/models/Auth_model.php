<?php

class Auth_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 이메일, 비밀번호 체크
	 *
	 * @param array $auth 폼전송 받은 이메일, 비밀번호
	 * @return array
	 */
    function login($auth) {
    	$sql = "SELECT username, email FROM ci_board_users WHERE email='".$auth['email']."' AND password='".$auth['password']."'";
   		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			// 일치하는 데이터가 있다면 해당 내용 반환
     		return $query->row();
     	}
     	else {
     		// 일치하는 데이터가 없을 경우
	    	return FALSE;
     	}
    }
}
