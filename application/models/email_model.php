<?php 
class email_model extends CI_Model {
    var $uid            = '';
    var $email_address  = '';
    var $title          = '';


    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();

    }
    
    function insert_email($address, $title) {
        $session_data = $this->session->userdata('logged_in');
        $this->uid = $session_data['uid'];
        $this->email_address = $address;
        $this->title   = $title;

        $this->db->insert('email_addr', $this);
    }
}

?>