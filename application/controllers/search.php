<?php
class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('email_model');
	}

	public function index($search_term){
				//echo "SEARCH TERM: " . $search_term . "<br />";
				$results = $this->email_model->search($search_term);
				foreach ($results as $r) {
					echo "<tr>";
					echo 	"<td draggable='true'>";
					echo 		$r['email_address'];
					echo 	"</td>";
					echo "<tr>";
				}
				//echo $uid;
				//echo $search_term;
	}
}
?>