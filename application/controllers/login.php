<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function displayform(){
		$this->load->view('_header');
		$this->load->view('loginForm');
		$this->load->view("_footer");
	}
}
?>