<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "secure.php";
class Con_position extends Secure {
	function __construct() 
	 {
	  parent::__construct();
	  	$this->load->model('mod_globals');
	  	//$this->load->model('mod_categorie');
	 } 
	public function index()
	{
       	redirect('con_position/list_position');

	}
	function list_position() {
		$data['title'] = 'Manage Position';
		$data['get_position'] = $this->mod_globals->select_where('tbl_positions', array('pos_status' => 1));
		$this->load->view(B_MASTER, $data);
	}
	function add_position() {
		$data['title'] = 'Manage Position';
		
		$this->load->view(B_MASTER, $data);
	}
	function do_add_position() {
		$arr = array(
			'pos_name' => $this->input->post('txt_pos_name'),
			'pos_description' => $this->input->post('txt_pos_description'),
			'pos_date_created' => date('Y-m-d'),
			'pos_status' => 1,
		);
		$this->mod_globals->insert('tbl_positions', $arr);
		redirect('con_position/list_position');
	}
	function edit_position($pos_id) {
		$data['title'] = 'Manage Position';
		$data['get_position'] = $this->mod_globals->select_where('tbl_positions', array('pos_status' => 1, 'pos_id' => $pos_id));
		$this->load->view(B_MASTER, $data);
	}
	function do_edit_position($pos_id) {
		$arr = array(
			'pos_name' => $this->input->post('txt_pos_name'),
			'pos_description' => $this->input->post('txt_pos_description'),
			'pos_date_modified' => date('Y-m-d'),
			'pos_status' => 1,
		);
		$this->mod_globals->update('tbl_positions', $arr, array('pos_id' => $pos_id));
		redirect('con_position/list_position');
	}
	function delete_position($pos_id) {
		$this->mod_globals->delete('tbl_positions', array('pos_id' => $pos_id));
		redirect('con_position/list_position');
	}	
	
}
