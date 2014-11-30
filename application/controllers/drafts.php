<?php


class Drafts extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('drafts_model');
        //$this->load->model('group_model'); FOR SEND TO GROUP IF IMPLEMENTED
        $this->load->library('session');
        //$this->load->model('config_model');
        //$this->load->helper('form');
    }

    public function ajaxSave() {
        if(!$this->session->userdata('logged_in')) {
            $data['logged_in'] = false;
        } else {
            $data['logged_in'] = true;
        }

        $this->drafts_model->insert($_POST['sendTo'], $_POST['address'], $_POST['subject'], $_POST['message']);


    }
}