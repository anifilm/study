<?php
class Errors extends CI_controller {
	public function notfound() {
		$this->load->view('templetes/header');
		$this->load->view('errors/404');
		$this->load->view('templetes/footer');
	}
}
