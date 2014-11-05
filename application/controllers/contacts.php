<?php
class Contacts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('contacts_model');
	}



	public function listcontacts()
	{
		//$this->load->view('_header');
		//$this->load->view('listcontacts');
		//$this->load->view("_footer");
		$data = $this->contacts_model->get_all();
		echo $data[0]['addr'];
	}
}

?>