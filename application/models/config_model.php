<?php
/*
  * Config model stores the user email configuration. The controller can request the model to set the email configuration.
  */
class Config_model extends CI_Model {

    var $cid   				= '';
    var $uid				= '';
    var $smpt_addr			= '';
    var $email_username 	= '';
    var $email_password 	= '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->model('contacts_model');

    }

    //gets the current user email configuration
    function get_config(){
    	$this->uid = $this->session->userdata('logged_in')['uid'];
    	$this->db->select('smpt_addr');
    	$this->db->select('email_username');
    	$this->db->select('email_password');
    	$this->db->from('config');
    	$this->db->where('uid', $this->uid);
    	$query = $this->db->get();
    	return $query->result_array();
    }

    //sets the user's email configuration
    function set_config($server, $username, $password){
        $uid = $this->session->userdata('logged_in')['uid'];
        $data = array(
            'smpt_addr'         => $server,
            'email_username'    => $username,
            'email_password'    => $password
        );
        $this->db->where('uid', $uid);
        $this->db->update('config', $data);
    }

}