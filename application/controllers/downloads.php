<?php

/*
 * Controller controls display of download form view and downloads a txt file containing the full list to the
 * user's machine upon the user's request.
 */

class Downloads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('email_model');
		$this->load->library('session');
		$this->load->helper('url');
        $this->load->model('email_model');
        $this->load->model("group_model");
	}


    //Create and download text file containing the list of contacts
	public function full() {
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'location');
		} else{
			$data["logged_in"] = true;
		}
                


		$randomize_file_name = rand();
        $fileName = "tempfile" . $randomize_file_name . ".txt";
 		//creates file for writing into
		$myfile = fopen($fileName, "w");

        //gets session informaion for the logged in user
		$username = $this->session->userdata("logged_in")['username'];
                
        //This function is identical to calling fopen(), fwrite() and fclose() successively to write data to a file.
        //file_put_contents($fileName, group_model::get_addr_by_id($username), FILE_USE_INCLUDE_PATH);
		header('Content-type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'. $username . '_contacts.txt"');

		$arrds = $this->email_model->get_addr_for_user();
		foreach ($arrds as $a ) {
			fwrite($myfile, $a['email_address'] . "\n");
			echo $a['email_address'] . "\n";
		}



		fclose($myfile);

	}
        //Displays download view form
        public function processDownload() {
        // MAKE SURE USER IS LOGGED IN ----------------------------------------

		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		}else{
			$data['logged_in'] = true;
		}
		// --------------------------------------------------------------------
                
        // LOAD VIEWS ---------------------------------------------------------
		$this->load->view('_header', $data);
                $this->load->view('downloadForm');
                $this->load->view("_footer");
        }
}

?>