<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('topic_model');
	}

    public function index() {
		$topics = $this->topic_model->gets();

		$this->load->view('templetes/header');
		$this->load->view('topic_list', array('topics' => $topics));
		$this->load->view('main', array('topics' => $topics));
		$this->load->view('templetes/footer');
    }

    public function get($id) {
		$topics = $this->topic_model->gets();
        $topic = $this->topic_model->get($id);

		$this->load->view('templetes/header');
		$this->load->view('topic_list', array('topics' => $topics));
        $this->load->view('get', array('topic' => $topic));
		$this->load->view('templetes/footer');
    }
}
