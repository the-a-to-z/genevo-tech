<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include "secure.php";
class Adm_dashboard extends Secure {

	public function index()
	{
		$data['title'] = "Add customer";
		$this->load->view(B_MASTER, $data);
       	
	}
	function logout() {
		$this -> user -> logout();
		redirect('login');
	}
}
