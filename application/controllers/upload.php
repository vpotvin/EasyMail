<?php
class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('email_model');
		$this->load->model("group_model");
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
		}else{
			$data['logged_in'] = true;
		}
		// --------------------------------------------------------------------
		$EmailFile = fopen($_FILES['emailFile']['tmp_name'], "r") or die("Unable to open file!");
		$badAddr = "";
		$dupes = "";
		while(!feof($EmailFile)) {
			$addr = fgets($EmailFile);
			$addr = trim($addr);

			if($addr != ""){
				if (filter_var($addr, FILTER_VALIDATE_EMAIL)) {
					if(!$this->email_model->insert_email($addr, null)){
						 $dupes[] = $addr;
					}
				} else{
					$badAddr[] = $addr;
					//print_r($addr);
					//print_r($badAddr);
				}
			}
		}
		fclose($EmailFile);

		if (count($badAddr) > 1) {

			$data['flashMessages'] = [];

			if($messages = $this->session->flashdata('flashMessages')){
				foreach ($messages as $message) {
					array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
				}
			}else {
				$data['flashMessages'] = null;
			}

			$data['badAddr'] = $badAddr;
			$this->load->view('_header', $data);
			$this->load->view('confirmbademails', $data);
			$this->load->view("_footer");
		} else{
			$fMessages = array(
				array('All Emails Address Uploaded Successfully', 'success')
			);

			$this->session->set_flashdata('flashMessages', $fMessages);

			header("location: /listmng/index");
		}
	}

	public function procConfirm() {
	// MAKE SURE USER IS LOGGED IN ----------------------------------------
	// THIS SHOULD PROBABLY BE MOVED TO A HELPER CLASS
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		}else{
			$data['logged_in'] = true;
		}

		$eaddr = $this->input->post()['formConfirm'];
		if($eaddr){
			foreach( $eaddr as $a){
				$this->email_model->insert_email($a, null);
			}
		}
		$fMessages = array(
			array('All Emails Address Uploaded Successfully', 'success')
		);

		$this->session->set_flashdata('flashMessages', $fMessages);

		redirect("/listmng/index", 'refresh');
	}

	public function ajaxInsert(){
		$gid = $this->input->post()['gid'];
		$addr = $this->input->post()['addr'];
		$this->group_model->insert($gid, $addr);
		echo true;
	}




}
?>