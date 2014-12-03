<?php
Class user_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();

    }

 //checks a user's login credentials
    function login($username, $password) {
    // Switch to Bycrypt to be realistic.
        $this -> db -> select('uid, username, password, admin');
        $this -> db -> from('users');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', MD5($password));

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    //creates a new user
    function create_user($username, $password, $admin){
        $data = array(
            'username' => $username,
            'password' => md5($password),
            'admin' => $admin
            );
        $this->db->insert('users', $data);
    }

}
?>