<?php
	class Listmng extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->model('email_model');
		}

		public function index(){
			if(!$this->session->userdata('logged_in')) {
	            $data['logged_in'] = false;
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

	        $data['addr'] = $this->email_model->get_addr_for_user();

	        $this->load->view('_header', $data);
	        $this->load->view('listView', $data);
	        $this->load->view("_footer", $data);
		}

		public function liveSearch(){
		
			$results = $this->email_model->search($_POST['searchString']);
			foreach ($results as $r) {
				echo "<tr>";
				echo 	"<td>";
				echo 		$r['email_address'];
				echo 	"</td>";
				echo 	"<td>";
				echo 		"<a href='/listmng/remove/" . $r['eaid'] . "'>Remove Address</a>";
				echo 	"</td>";
				echo "</tr>"; 
			}
		}

		public function liveGetAllOrder(){
			$results = $this->email_model->get_all_order_by($_POST['orderType']);
			foreach ($results as $r) {
				echo "<tr>";
				echo 	"<td>";
				echo 		$r['email_address'];
				echo 	"</td>";
				echo 	"<td>";
				echo 		"<a href='/listmng/remove/" . $r['eaid'] . "'>Remove Address</a>";
				echo 	"</td>";
				echo "</tr>"; 
			}
		}

		public function remove($eaid){
			$this->email_model->remove($eaid);
			header("location: /listmng/index");
		}

	}
?>