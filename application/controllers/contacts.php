<?php
//session_start();
class Contacts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('contacts_model');
		$this->load->library('session');
		$this->load->helper('url');
	}



	public function listcontacts() {
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		} else {
			$data['logged_in'] = true;
		}


		$data['flashMessages'] = [];
		if($messages = $this->session->flashdata('flashMessages')){
			foreach ($messages as $message) {
				array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
			}
		}else {
			$data['flashMessages'] = null;
		}
		$this->load->view('_header', $data);
		$this->load->view('listcontacts');
		$this->load->view("_footer");



		// print_r($this->session->userdata('logged_in'));


		//$data['flashMessage'] = $this->session->flashdata('flashMessage');
		//$this->load->view('_header', $data);

		//$data = $this->contacts_model->get_all();
		//echo $data[0]['addr'];
	}
}

?>