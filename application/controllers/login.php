<?php
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function displayform() {
		$data['flashMessage'] = $this->session->flashdata('flashMessage');
		$this->load->view('_header', $data);
		$this->load->view('loginForm');
		$this->load->view("_footer");
	}

	public function processLogin(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$login_result = $this->user_model->login($username, $password);
		if($login_result){

			$sess_array = array(
         		'id' => $login_result[0]->uid,
         		'username' => $login_result[0]->username
       		);

       		$this->session->set_userdata('logged_in', $sess_array);
       		$this->session->set_flashdata('flashMessage', 'Successful Login');
       		// CHANGE TO REDIRECT TO HOME, THEN PREVIEOUS PAGE
       		redirect('/contacts/listcontacts/', 'refresh');


		} else {
			// FLASH HASH SHOULD BE AN ARRAY OF MESSAGES, THAT CONTAIN CSS CLASS FOR STYEL
			$this->session->set_flashdata('flashMessage', 'Incorrect Credentials');
			redirect('/login/displayform/', 'refresh');
		}
	}


	public function logout() {
		$this->session->unset_userdata('logged_in');
       	$this->session->set_flashdata('flashMessage', 'Successful Logout');
		redirect('/contacts/listcontacts/', 'refresh');
	}



}
?>