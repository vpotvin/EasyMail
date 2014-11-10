<?php
Class group_model extends CI_Model {
  var $uid          = "";
  var $group_name   = "";
  var $group_desc   = "";
  var $group_color  = "";

  function __construct() {
        parent::__construct();
        $this->load->database();

  }

  public function create($name, $color) {
    $this->uid = $this->session->userdata('logged_in')['uid'];
    $this->group_name = $name;
    $this->group_color = $color;
    $this->db->insert('user_groups', $this);
  }

  public function get_group_for_user(){
        $session_data = $this->session->userdata('logged_in');
        $this->uid = $session_data['uid'];
        $this -> db -> select('group_name', 'group_color');
        $this -> db -> from('user_groups');
        $this -> db -> where('uid', $this->uid);
        $query = $this -> db -> get();
        return $query->result_array();
    }
}
?>