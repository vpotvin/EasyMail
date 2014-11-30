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
}


?>