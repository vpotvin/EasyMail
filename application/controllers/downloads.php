<?php
//session_start();
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

  //       public function index() {
  //           // MAKE SURE USER IS LOGGED IN ----------------------------------------
  //           // THIS SHOULD PROBABLY BE MOVED TO A HELPER CLASS
		// if(!$this->session->userdata('logged_in')) {
		// 	redirect('/login/displayform/', 'refresh');
		// } else{
		// 	$data["logged_in"] = true;
		// }
		// // --------------------------------------------------------------------
                
  //               // SET FLASH MESSAGES -------------------------------------------------
		// // THIS SHOULD PROBABLY BE MOVED TO A HELP CLASS
		// $data['flashMessages'] = [];
		// if($messages = $this->session->flashdata('flashMessages')){
		// 	foreach ($messages as $message) {
		// 		array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
		// 	}
		// }else {
		// 	$data['flashMessages'] = null;
		// }
		// // --------------------------------------------------------------------
                
  //       // LOAD VIEWS ---------------------------------------------------------
		// $this->load->view('_header', $data);
  //       $this->load->view('downloadForm');
  //       $this->load->view("_footer");
		// // --------------------------------------------------------------------
  //       }

	public function full() {
		// if(!$this->session->userdata('logged_in')) {
		// 	redirect('/login/displayform/', 'refresh');
		// } else {
		// 	$data['logged_in'] = true;
		// }
                
  //               // SET FLASH MESSAGES -------------------------------------------------
		// // THIS SHOULD PROBABLY BE MOVED TO A HELP CLASS
		// $data['flashMessages'] = [];
		// if($messages = $this->session->flashdata('flashMessages')){
		// 	foreach ($messages as $message) {
		// 		array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
		// 	}
		// }else {
		// 	$data['flashMessages'] = null;
		// }
		// // --------------------------------------------------------------------

		$randomize_file_name = rand();
        $fileName = "tempfile" . $randomize_file_name . ".txt";
 		//creates file for writing into
		$myfile = fopen($fileName, "w");

  //               //gets session informaion for the logged in user
		$username = $this->session->userdata("logged_in")['username'];
                
  //               //This function is identical to calling fopen(), fwrite() and fclose() successively to write data to a file.
  //               file_put_contents($fileName, group_model::get_addr_by_id($username), FILE_USE_INCLUDE_PATH);
//
		ob_start('ob_gzhandler');
		header('Content-type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'. $username . '_contacts.txt"');

		$arrds = $this->email_model->get_addr_for_user();
		foreach ($arrds as $a ) {
			fwrite($myfile, $a['email_address'] . "\n");
			echo $a['email_address'] . "\n";
		}



		fclose($myfile);



		// print_r($this->session->userdata('logged_in'));
                
                

		//$data['flashMessage'] = $this->session->flashdata('flashMessage');
                //
		// LOAD VIEWS ---------------------------------------------------------
		// $this->load->view('_header', $data);
  //               $this->load->view('downloadForm');
  //               $this->load->view("_footer");
		// // --------------------------------------------------------------------
                
  //               return $fileName;
		//$data = $this->contacts_model->get_all();
		//echo $data[0]['addr'];
	}
        
        public function processDownload() {
            // MAKE SURE USER IS LOGGED IN ----------------------------------------
		// THIS SHOULD PROBABLY BE MOVED TO A HELPER CLASS
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
		//
        }
}

?>