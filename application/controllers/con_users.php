<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "secure.php";
class Con_users extends Secure {
	function __construct() 
	 {
	  parent::__construct();
	  	$this->load->model('mod_globals');
	  	$this->load->model('mod_pages');
	 } 
	public function index()
	{
       	redirect('con_users/list_user');

	}

	function list_user() {
		$data['title'] = 'Manage users';
		$data['get_user'] = $this->mod_globals->select_where('tbl_users', array('use_status' => 1));
		$this->load->view(B_MASTER, $data);
	}

	function add_user(){
		$data['title'] = 'Manage users';
		$data['get_role'] = $this->mod_globals->select_where('tbl_roles', array('rol_status' => 1) );
		$this->load->view(B_MASTER, $data);
	}

	function do_add_user() {
		$arr_str = array(
			'use_first_name' => $this->input->post('use_first_name'),
			'use_last_name' => $this->input->post('use_last_name'),
			'use_gender' => $this->input->post('use_gender'),
			'use_username' => $this->input->post('use_username'),
			'use_password' => md5($this->input->post('use_password')),
			'use_email' => $this->input->post('use_email'),
			'use_phone' => $this->input->post('use_phone'),
			'use_address' => $this->input->post('use_address'),
			'use_status' => 1,
			'use_rol_id' => $this->input->post('role')
		);
		$this->mod_globals->insert('tbl_users', $arr_str);
		redirect('con_users/list_user');
	}
	function edit_user($user_id) {
		$data['title'] = 'Manage users';
		$data['get_user'] = $this->mod_globals->select_where('tbl_users', array('use_status' => 1, 'use_id' => $user_id));
		$data['get_role'] = $this->mod_globals->select_where('tbl_roles', array('rol_status' => 1) );
		$this->load->view(B_MASTER, $data);
	}
	function do_edit_user($user_id) {
		$arr_str = array(
			'use_first_name' => $this->input->post('use_first_name'),
			'use_last_name' => $this->input->post('use_last_name'),
			'use_gender' => $this->input->post('use_gender'),
			'use_username' => $this->input->post('use_username'),
			'use_email' => $this->input->post('use_email'),
			'use_phone' => $this->input->post('use_phone'),
			'use_address' => $this->input->post('use_address'),
			'use_rol_id' => $this->input->post('role')
		);
		$this->mod_globals->update('tbl_users', $arr_str, array('use_id' => $user_id));
		redirect('con_users/list_user');
	}
	function delete_user($user_id) {
		$this->mod_globals->delete('tbl_users', array('use_id' => $user_id));
		redirect('con_users/list_user');
	}
}