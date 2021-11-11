<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {
    public function index() {
		$this->load->view('topic');
    }

    public function get($id=1) {
		$data = array('id' => $id);
        $this->load->view('topic_get', $data);
    }
}
