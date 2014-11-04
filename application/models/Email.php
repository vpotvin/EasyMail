<?
class Email extends CI_Model {

    var $emailAddr   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();

    }
    
    function get_all()
    {
        $query = $this->db->get('Emails');
        return $query->result_array();
    }
}

?>