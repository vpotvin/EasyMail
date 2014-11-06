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

	public function processform(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		echo $password;
		echo md5($username);
	}

}
?>