<?php


class Drafts extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('drafts_model');
        $this->load->helper('url');
        //$this->load->model('group_model'); FOR SEND TO GROUP IF IMPLEMENTED
        $this->load->library('session');
        //$this->load->model('config_model');
        //$this->load->helper('form');
    }

    public function ajaxSave() {
        if(!$this->session->userdata('logged_in')) {
            redirect('/login/displayform/', 'location');
        } else{
            $data["logged_in"] = true;
        }

        $this->drafts_model->insert($_POST['sendTo'], $_POST['address'], $_POST['subject'], $_POST['message']);


    }

    public function display(){
        if(!$this->session->userdata('logged_in')) {
            redirect('/login/displayform/', 'refresh');
        } else{
            $data["logged_in"] = true;
        }
        // --------------------------------------------------------------------

        // SET FLASH MESSAGES -------------------------------------------------
        // THIS SHOULD PROBABLY BE MOVED TO A HELP CLASS
        $data['flashMessages'] = [];
        if($messages = $this->session->flashdata('flashMessages')){
            foreach ($messages as $message) {
                array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
            }
        }else {
            $data['flashMessages'] = null;
        }
        // --------------------------------------------------------------------


        $data['drafts'] = $this->drafts_model->get_drafts();
        $this->load->view('_header', $data);
        $this->load->view('displayDrafts', $data);
        $this->load->view('_footer');
    }
}