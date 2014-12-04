<?php
/**
 * controls the display of the compose view and executes the sending of emails
 */

class Email extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('email_model');
        $this->load->model('drafts_model');
        //$this->load->model('group_model'); FOR SEND TO GROUP IF IMPLEMENTED
        $this->load->library('session');
        $this->load->model('config_model');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    //displays compose view
    public function displayform() {

        if(!$this->session->userdata('logged_in')) {
            redirect('/login/displayform/', 'location');
        } else{
            $data["logged_in"] = true;
            if($this->session->userdata('logged_in')['admin'] == 'Y'){
                $data['admin'] = true;
            } else{
                $data['admin'] = false;
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

        $this->load->view('compose', $data);
        
    }

    //displays displayDraft view
    public function displayDraft($did){

        if(!$this->session->userdata('logged_in')) {
            redirect('/login/displayform/', 'location');
        } else{
            $data["logged_in"] = true;
        }


        $data['flashMessages'] = [];
        if($messages = $this->session->flashdata('flashMessages')){
            foreach ($messages as $message) {
                array_push($data['flashMessages'], array('message' => $message[0], 'CSS'=>$message[1]));
            }
        }else {
            $data['flashMessages'] = null;
        }

        $data['draft'] = $this->drafts_model->get_by_id($did)[0];

        $this->load->view('displayDraft', $data);
    }


    //sends Email from user's email address, either individually or to all addresses
    public function send()
    {

        if(!$this->session->userdata('logged_in')) {
            redirect('/login/displayform/', 'location');
        } else{
            $data["logged_in"] = true;
        }

        if($this->input->post("sendType") == 'toAll'){
            $subject = $this->input->post("subject");
            $message = $this->input->post("Editor1");
            echo $this->batch_email_to_all($subject, $message);
        } else if($this->input->post("sendType") == 'toIndividual'){
            $subject = $this->input->post("subject");
            $message = $this->input->post("Editor1");
            $send_to = $this->input->post("to");
            $this->send_individual($subject, $message, $send_to);
        }
    }

    //This sends each email individually to every address on the list
    function batch_email_to_all($subject, $message)
    {
        if(!$this->session->userdata('logged_in')) {
            redirect('/login/displayform/', 'location');
        } else{
            $data["logged_in"] = true;
        }

         $configData = $result = $this->config_model->get_config();
         $send_array = $this->email_model->get_addr_for_user();

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => $configData[0]['smpt_addr'],
            'smtp_port' => 465,
            'smtp_user' => $configData[0]['email_username'],
            'smtp_pass' => $configData[0]['email_password'],
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1',
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        );

        $this->load->library('email', $config);




         foreach ($send_array as $k) {
            $this->email->to($k);
            $this->email->from($configData[0]['email_username']);
            $this->email->subject($subject);
            $this->email->message($message);

            $this->email->send();
         };
    }

    //sends an email to an individual
    public function send_individual($subject, $message, $send_to){
        if(!$this->session->userdata('logged_in')) {
            redirect('/login/displayform/', 'location');
        } else{
            $data["logged_in"] = true;
        }
        $configData = $result = $this->config_model->get_config();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => $configData[0]['smpt_addr'],
            'smtp_port' => 465,
            'smtp_user' => $configData[0]['email_username'],
            'smtp_pass' => $configData[0]['email_password'],
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1',
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        );


        $this->load->library('email', $config);
        $this->email->to($send_to);
        $this->email->from($configData[0]['email_username']);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        //NOTIFIY OF SUCCESS
        header("location: /");
    }
}