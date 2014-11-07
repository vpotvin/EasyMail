<?php
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('session');
	}

	public function displayform() {
		$this->load->view('_header');
		$this->load->view('loginForm');
		$this->load->view("_footer");
	}

	public function processform(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$login_result = $this->user_model->login($username, $password);
		if($login_result){

			$sess_array = array(
         		'id' => $login_result[0]->uid,
         		'username' => $login_result[0]->username
       		);

       		$this->session->set_userdata('logged_in', $sess_array);
       		// SET FLASH
       		// REDIRECT TO WELCOME


		} else {
			// SET FLASH
			// REDIRECT BACK TO LOGIN
		}
	}


	public function logout() {
		$this->session->unset_userdata('logged_in');
		echo "Logged OUT";
		// SET FLASH
		// REDIRECT TO WELCOME
	}



}
?>