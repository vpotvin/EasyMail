<?php
require_once(APPPATH . '/controllers/test/Toast.php');

Class User_model_test extends Toast {

    public function __construct(){
        parent::Toast(__FILE__);
        $this->load->database();
    }

    public function test_login_success() {
        $username = 'setest';
        $password = 'seproject';

        $this -> db -> select('uid, username, password, admin');
        $this -> db -> from('users');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', MD5($password));

        $query = $this -> db -> get();

        $test_result = false;
        if($query -> num_rows() == 1)
        {
            $test_result = true;
        }

        $this->_assert_true($test_result);
    }

    public function test_login_failure()
    {
        $username = 'setest';
        $password = 'setest123';

        $this->db->select('uid, username, password, admin');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));

        $query = $this->db->get();

        $test_result = false;
        if ($query->num_rows() == 1) {
            $test_result = true;
        }

        $this->_assert_false($test_result);
    }
}