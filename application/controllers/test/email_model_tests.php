<?php

require_once(APPPATH . '/controllers/test/Toast.php');

Class Email_model_tests extends Toast
{

    public function __construct()
    {
        parent::Toast(__FILE__);
        $this->load->database();
        $this->load->model('email_model');
    }

    public function test_search(){
        $searchTerm = '.com';

        $this -> db -> select('email_address');
        $this -> db -> select('eaid');
        $this -> db -> from('email_addr');

        $this -> db -> like('email_address' ,$searchTerm);

        $this -> db -> where('email_addr.uid', 'setest');
        $query = $this -> db -> get();

        $this->_assert_not_empty($query);
    }
}