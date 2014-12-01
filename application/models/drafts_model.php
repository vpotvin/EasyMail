<?php 
class Drafts_model extends CI_Model {

    var $did   				= '';
    var $uid                = '';
    var $sendType           = '';
    var $sendTo             = '';
    var $subject            = '';
    var $message            = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function insert($sType, $sTo, $subject, $message){
    
        $data = array(
            'uid' => $this->session->userdata('logged_in')['uid'],
            'sendType' => $sType,
            'sendTo' => $sTo,
            'subject' => $subject,
            'message' => $message
            );

        $this->db->insert('drafts', $data);
    }

    public function get_drafts(){
        $uid = $this->session->userdata('logged_in')['uid'];
        $this->db->select('did');
        $this->db->select('sendType');
        $this->db->select('sendTo');
        $this->db->select('subject');
        $this->db->select('message');
        $this->db->from('drafts');
        $this->db->where('uid', $uid);
        $query = $this -> db -> get();
        return $query->result_array();
    }

    public function get_by_id($did){
        $uid = $this->session->userdata('logged_in')['uid'];
        $this->db->select('did');
        $this->db->select('sendType');
        $this->db->select('sendTo');
        $this->db->select('subject');
        $this->db->select('message');
        $this->db->from('drafts');
        $this->db->where('uid', $uid);
        $this->db->where('did', $did);
        $query = $this -> db -> get();
        return $query->result_array();
    }
}


?>