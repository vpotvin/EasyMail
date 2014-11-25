<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 11/24/2014
 * Time: 2:53 PM
 */

class Send_email extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('contacts_model');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('form');
    }

    public function displayform() {
        if(!$this->session->userdata('logged_in')) {
            $data['logged_in'] = false;
        } else {
            $data['logged_in'] = true;
        }

        $data['flashMessages'] = [];
        if($messages = $this->session->flashdata('flashMessages')){
            foreach ($messages as $message) {
                array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
            }
        }else {
            $data['flashMessages'] = null;
        }

        $this->load->view('_header', $data);
        $this->load->view('compose');
        $this->load->view("_footer");
    }

    function send()
    {
        //I figured there needs to be a check box that that says send to all
        //I though this functon could decide if the intention is to send to the whole list or to a couple addresses
        //depending on that box.
        //This function needs to take information from the form and feed it to the different sending functions depending
        //on the situation.

        $subject = $this->input->post("subject");
        $message = $this->input->post("message");
        $addtl_to = $this->input->post("to");
        $this->batch_email_to_all($subject, $message, $addtl_to);

        return TRUE;
    }

    //This should send email in bulk.
    function batch_email_to_all($subject, $message, $addtl_to)
    {
        $this->email->clear(TRUE);
        $this->email->from('seprojectfall2014@gmail.com', 'seproject');
        $this->email->to('seprojectfall2014@gmail.com');
        $this->email->bcc($this->contacts_model->get_all_addr(), $addtl_to);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();

        return TRUE;

    }
}