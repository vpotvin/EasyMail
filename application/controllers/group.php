<?php
class Group extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('group_model');
	}

	public function create(){
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
		$this->load->view('createGroup');
		$this->load->view("_footer");
		// --------------------------------------------------------------------
	}

	public function procCreate() {
		// MAKE SURE USER IS LOGGED IN ----------------------------------------
		// THIS SHOULD PROBABLY BE MOVED TO A HELPER CLASS
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		} else{
			$data["logged_in"] = true;
		}
		// --------------------------------------------------------------------

		$this->group_model->create($this->input->post("groupName"), $this->input->post('groupColor'));

       	$fMessages = array(
			array('Group Created', 'success')
		);

		$this->session->set_flashdata('flashMessages', $fMessages);

		redirect("/", 'refresh');
	}

	public function display($groupID){
		// MAKE SURE USER IS LOGGED IN ----------------------------------------
		// THIS SHOULD PROBABLY BE MOVED TO A HELPER CLASS
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'refresh');
		} else{
			$data["logged_in"] = true;
		}

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
		$data['groupID'] = $groupID;
		$data['addrs'] = $result = $this->group_model->get_addr_by_id($groupID);
		$this->load->view('_header', $data);
		$this->load->view('displayGroup', $data);
		$this->load->view("_footer");
	}
}
?>
