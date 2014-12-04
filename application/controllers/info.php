<?php
/*
 * This class exists for debugging purposes.
 */
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