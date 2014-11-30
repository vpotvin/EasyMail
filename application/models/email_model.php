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

        if(!$this->db->insert('email_addr', $this)){
            return false;
        }
    }

    public function get_addr_for_user(){
        $session_data = $this->session->userdata('logged_in');
        $this->uid = $session_data['uid'];
        $this -> db -> select('email_address');
        $this -> db -> select('eaid');
        $this -> db -> from('email_addr');
        $this -> db -> where('uid', $this->uid);
        $query = $this -> db -> get();
        return $query->result_array();
    }

    public function get_all_order_by($order){
        $session_data = $this->session->userdata('logged_in');
        $this->uid = $session_data['uid'];
        $this -> db -> select('email_address');
        $this -> db -> select('eaid');
        $this -> db -> from('email_addr');
        $this-> db -> order_by("email_address", $order);
        $this -> db -> where('uid', $this->uid);
        $query = $this -> db -> get();
        return $query->result_array();
    }

    public function search($searchTerm){
        $session_data = $this->session->userdata('logged_in');
        $this->uid = $session_data['uid'];

        $this -> db -> select('email_address');
        $this -> db -> select('eaid');
        $this -> db -> from('email_addr');

        $this -> db -> like('email_address' ,$searchTerm);

        $this -> db -> where('email_addr.uid', $this->uid);
        $query = $this -> db -> get();
        return $query->result_array();

    }

    public function remove($eaid){
        $this->db->where('eaid', $eaid);
        $this->db->delete('email_addr_groups');

        $this->db->where('eaid', $eaid);
        $this->db->delete('email_addr');
    }
}

?>