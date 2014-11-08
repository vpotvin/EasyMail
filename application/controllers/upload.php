<?php
class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('email_model');
	}

	public function index(){
		// MAKE SURE USER IS LOGGED IN ----------------------------------------
		// THIS SHOULD PROBABLY BE MOVED TO A HELPER CLASS
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		}
		// --------------------------------------------------------------------

		// SET FLASH MESSAGES -------------------------------------------------
		// THIS SHOULD PROBABLY BE MOVED TO A HELP CLASS
		$data['flashMessages'] = [];
		if($messages = $this->session->flashdata('flashMessages')){
			foreach ($messages as $message) {
				array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
			}
		}else {
			$data['flashMessages'] = null;
		}
		// --------------------------------------------------------------------

		// LOAD VIEWS ---------------------------------------------------------
		$this->load->view('_header', $data);
		$this->load->view('uploadForm');
		$this->load->view("_footer");
		// --------------------------------------------------------------------
	}

	public function processUpload() {
		// MAKE SURE USER IS LOGGED IN ----------------------------------------
		// THIS SHOULD PROBABLY BE MOVED TO A HELPER CLASS
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		}
		// --------------------------------------------------------------------
		$EmailFile = fopen($_FILES['emailFile']['tmp_name'], "r") or die("Unable to open file!");

		while(!feof($EmailFile)) {
			$addr = fgets($EmailFile);
			$addr = trim($addr);
			$this->email_model->insert_email($addr, null);
		}
		fclose($EmailFile);
	}



}
?>