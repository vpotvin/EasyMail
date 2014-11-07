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
		//$this->load->view('_header');
		//$this->load->view('listcontacts');
		//$this->load->view("_footer");

		// if(!$this->session->userdata('logged_in')) {
		// 	redirect('/login/displayform/', 'refresh');
		// }

		// print_r($this->session->userdata('logged_in'));


		//$data['flashMessage'] = $this->session->flashdata('flashMessage');
		//$this->load->view('_header', $data);

		$data = $this->contacts_model->get_all();
		echo $data[0]['addr'];
	}
}

?>