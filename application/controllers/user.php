<?php

class User extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        // $this->load->model('drafts_model');
        // //$this->load->model('group_model'); FOR SEND TO GROUP IF IMPLEMENTED
        $this->load->library('session');
        // $this->load->model('config_model');
        // $this->load->helper('form');
        // $this->load->helper('url');
    }

    //displays createUser view
    public function createUser(){
        if(!$this->session->userdata('logged_in')) {
            redirect('/login/displayform/', 'location');
        } else{
            $data["logged_in"] = true;
            if($this->session->userdata('logged_in')['admin'] == 'Y'){
                $data['admin'] = true;
            } else{
                $data['admin'] = false;
                redirect('/login/displayform/', 'location');
            }
        }

         $data['flashMessages'] = [];
        if($messages = $this->session->flashdata('flashMessages')){
            foreach ($messages as $message) {
                array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
            }
        }else {
            $data['flashMessages'] = null;
        }

        $this->load->view("_header", $data);
        $this->load->view("createUser", $data);
        $this->load->view("_footer", $data);
    }

    //creates new user
    public function createUserProc(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $admin    = $this->input->post("admin");

        if($admin != 'Y'){
            $admin = 'N';
        }

        $this->user_model->create_user($username, $password, $admin);
        header("location: /");
    }

}