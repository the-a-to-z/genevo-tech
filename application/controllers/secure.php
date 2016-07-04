<?php
class Secure extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		if (!$this -> user -> is_logged_in()) {
			redirect('login');
		}
		
	}

}
