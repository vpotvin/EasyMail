<?php
//session_start();
class Downloads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('email_model');
		$this->load->library('session');
		//$this->load->helper('url');
	}



	public function downloadById() {
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		} else {
			$data['logged_in'] = true;
		}

		//$randomize_file_name = rand();

		//$myfile = fopen("tempfile" . $randomize_file_name . ".txt", "w");


		$username = $this->session->userdata("logged_in")['username'];

		ob_start('ob_gzhandler');
		header('Content-type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'. $username . '_contacts.txt"');

		$arrds = $this->email_model->get_addr_for_user();
		foreach ($arrds as $a ) {
			//fwrite($myfile, $a['email_address'] . "\n");
			echo $a['email_address'] . "\n";
		}



		//fclose($myfile);



		// print_r($this->session->userdata('logged_in'));


		//$data['flashMessage'] = $this->session->flashdata('flashMessage');
		//$this->load->view('_header', $data);

		//$data = $this->contacts_model->get_all();
		//echo $data[0]['addr'];
	}
}

?>