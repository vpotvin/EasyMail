<?php 
class Contacts_model extends CI_Model {

    var $emailAddr   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();

    }
    
    function get_all_rows()
    {
        $query = $this->db->get('email_addr');
        return $query->result_array();
    }

    function get_all_addr(){
        $this -> db -> select('email_address');
        $this -> db -> from('email_addr');
        $query = $this -> db -> get();
        print_r($query->result_array());
        return $query->result_array();
    }
}

?>