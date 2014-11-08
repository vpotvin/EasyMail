<?php
class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		//$this->load->helper('url');
		$this->load->model('email_model');
	}

	public function index(){
		// MAKE SURE USER IS LOGGED IN ----------------------------------------
		// THIS SHOULD PROBABLY BE MOVED TO A HELPER CLASS
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		} else{
			$data["logged_in"] = true;
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


		$arrds = $this->email_model->get_addr_for_user();
		$data['emails'] = $arrds;



		// LOAD VIEWS ---------------------------------------------------------
		$this->load->view('_header', $data);
		$this->load->view('main', $data);
		$this->load->view("_footer");
		// --------------------------------------------------------------------
	}
}
?>