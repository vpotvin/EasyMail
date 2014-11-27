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

        $array = array();
        foreach($query->result() as $row) {
            $array[] = $row->email_address;
        }
//        print_r($array);
        return $array;
    }
}

?>