<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 11/24/2014
 * Time: 2:53 PM
 */

class Email extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('contacts_model');
        //$this->load->model('group_model'); FOR SEND TO GROUP IF IMPLEMENTED
        $this->load->library('session');
        //$this->load->library('email'); COMMENTED OUT FOR TEST LOAD CONFIG ARRAY HERE
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

        $this->load->view('compose');
        $this->load->view("_footer", $data);
    }

    public function send()
    {
        //I figured there needs to be a check box that that says send to all
        //I though this functon could decide if the intention is to send to the whole list or to a couple addresses
        //depending on that box.
        //This function needs to take information from the form and feed it to the different sending functions depending
        //on the situation.
        if($this->input->post("sendType") == 'toAll'){
            $subject = $this->input->post("subject");
            $message = $this->input->post("Editor1");
            echo $this->batch_email_to_all($subject, $message, $addtl_to);
        } else if($this->input->post("sendType") == 'toIndividual'){
            $subject = $this->input->post("subject");
            $message = $this->input->post("Editor1");
            $addtl_to = $this->input->post("to");
            $this->send_individual();
        }
    }

    //This should send email in bulk.
    function batch_email_to_all($subject, $message, $addtl_to)
    {
        // $send_array = $this->contacts_model->get_all_addr();
        // $send_array[]= $addtl_to;

        // $this->email->clear(TRUE);
        // //$this->email->from('seprojectfall2014@gmail.com', 'seproject');
        // $this->email->to('seprojectfall2014@gmail.com');
        // $this->email->bcc($send_array);
        // $this->email->subject($subject);
        // $this->email->message($message);

        // if(!$this->email->send()) {
        //     $this->email->print_debugger();
        // }
        // $this->load->helper('url');
        // redirect('main');


        return TRUE;
    }
    public function send_individual(){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'seprojectfall2014@gmail.com',
            'smtp_pass' => 'seproject',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->to('barnettlynn@gmail.com');
        $this->email->from("seprojectfall2014@gmail.com");
        $this->email->subject("TEST");
        $this->email->message("BODY TEST");
        $result = $this->email->send();
        print_r($result);
        echo "TEST";
    }
}