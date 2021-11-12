<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {
    public function index() {
		$this->load->database();
		$this->load->model('topic_model');
		$data = $this->topic_model->gets();

		$this->load->view('templetes/header');
		$this->load->view('main', array('topics' => $data));
		$this->load->view('templetes/footer');
    }

    public function get($id=1) {
		$data['id'] = $id;

		$this->load->view('templetes/header');
        $this->load->view('get', $data);
		$this->load->view('templetes/footer');
    }
}
