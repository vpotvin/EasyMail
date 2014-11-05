<?php
class Contacts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Email');
	}



	public function listcontacts()
	{
		echo "testint two";
		//$data = $this->Email->get_all();
		//echo $data[0]['addr'];
	}
}

?>