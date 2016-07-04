<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function index() {
		if ($this -> user -> is_logged_in()) {
			redirect('adm_dashboard');
		} else {
			$this -> form_validation -> set_rules('username', 'Username', 'callback_login_check');
			$this -> form_validation -> set_error_delimiters('<div class="alert alert-danger">', '</div>');

			if ($this -> form_validation -> run() == FALSE) {
				$this->load->view('login');
			} else {
				
				redirect('adm_dashboard');
			}
		}
	}

	function login_check($username) {
		$password = $this -> input -> post("password");

		if (!$this -> user -> login($username, $password)) {
			$this -> form_validation -> set_message('login_check', '<b>Username / Password is  incorrect !</b>');
			return false;
		}
		return true;
	}
	

}
