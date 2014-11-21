<?php
//session_start();
class Info extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}



	public function info() {
		 echo phpinfo();
	}
}

?>