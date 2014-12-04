<?php
/*
 * Controls the display of search information and executes search function in email_model.
 */
class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('email_model');
	}

    //searches for and displays email addresses matching the search term
	public function index($search_term){
		if(!$this->session->userdata('logged_in')) {
			redirect('/login/displayform/', 'location');
		} else{
			$data["logged_in"] = true;
		}

        $results = $this->email_model->search($search_term);
        foreach ($results as $r) {
            echo "<tr>";
            echo 	"<td>";
            echo 		$r['email_address'];
            echo 	"</td>";
            echo 	"<td>";
            echo 		"<a href='javascript:void(0)' onclick='addToGroup(this);' class='addToGroup'>Add To Group</a>";
            echo 	"</td>";
            echo "<tr>";
        }

	}
}
?>


