<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "secure.php";
class Con_menus extends Secure {
	function __construct() 
	 {
	  parent::__construct();
	  	$this->load->model('mod_globals');
	  	//$this->load->model('mod_categorie');
	 } 
	public function index()
	{
       	redirect('con_menus/list_menu');

	}
	function list_menu() {
		$data['title'] = 'Menu';
		$data['get_menu'] = $this->mod_globals->select_where('tbl_menus', array('men_parent' => 0 ));
		
		$this->load->view(B_MASTER, $data);
	}
	function add_menu() {
		$data['title'] = 'Menu';
		$data['get_menu_en'] = $this->mod_globals->select_where('tbl_menus', array('men_parent' => 0, 'men_status' => 1, 'men_lang' => 'en'));
		$data['get_menu_kh'] = $this->mod_globals->select_where('tbl_menus', array('men_parent' => 0, 'men_status' => 1, 'men_lang' => 'kh'));
		$this->load->view(B_MASTER, $data);
	}
	function do_add_menu() {
		/*** - post data for en - ***/
		$menu_submenu_en 	= $this->input->post('menu_submenu_en');
		$parent_en 			= $this->input->post('parent_en');
		$level_en 			= $this->input->post('txt_level_en');
		$description_en 	= $this->input->post('txt_description_en');
		/*** - post data for kh - ***/
		$menu_submenu_kh 	= $this->input->post('menu_submenu_kh');
		$parent_kh 			= $this->input->post('parent_kh');
		$level_kh 			= $this->input->post('txt_level_kh');
		$description_kh 	= $this->input->post('txt_description_kh');
		/*** - arr for en - ***/
		$arr_en 			= array(
			'men_name'		=> $menu_submenu_en,
			'men_level' 	=> $level_en,
			'men_parent' 	=> ( $parent_en ) ? $parent_en : 0,
			'men_description' => $description_en,
			'men_lang'		=> 'en',
			'men_date_created'=> date('Y-m-d')
		);
		/*** - arr for kh - ***/
		$arr_kh 			= array(
			'men_name'		=> $menu_submenu_kh,
			'men_level' 	=> $level_kh,
			'men_parent' 	=> ( $parent_kh ) ? $parent_kh : 0,
			'men_description' => $description_kh,
			'men_lang'		=> 'kh',
			'men_date_created'=> date('Y-m-d')
		);
		$this->mod_globals->insert('tbl_menus', $arr_en); //------------ Insert data for en
		$this->mod_globals->insert('tbl_menus', $arr_kh); //------------ Insert data for kh

		redirect('con_menus/list_menu');

	}
	
	function edit_menu($menu_id) {
		$data['title'] = 'Menu';
		$data['get_menu_en'] = $this->mod_globals->select_where('tbl_menus', array('men_parent' => 0, 'men_status' => 1, 'men_lang' => 'en'));
		$data['get_data_menu'] = $this->mod_globals->select_where('tbl_menus', array('men_id' => $menu_id));
		//$data['get_data_menu'] = $this->mod_globals->select_where('tbl_menus', array('men_parent' => 0, 'men_status' => 1, 'men_lang' => 'kh'));
		$this->load->view(B_MASTER, $data);
	}
	function do_edit_menu($menu_id,$lang) {
		$menu_submenu_en 	= $this->input->post('menu_submenu_en');
		$parent_en 			= $this->input->post('parent_en');
		$level_en 			= $this->input->post('txt_level_en');
		$description_en 	= $this->input->post('txt_description_en');
		$arr_en 			= array(
			'men_name'		=> $menu_submenu_en,
			'men_level' 	=> $level_en,
			'men_parent' 	=> ( $parent_en ) ? $parent_en : 0,
			'men_description' => $description_en,
			'men_lang'		=> $lang,
			'men_date_modified'=> date('Y-m-d')
		);
		$this->mod_globals->update('tbl_menus', $arr_en, array('men_id' => $menu_id) );
		redirect('con_menus/list_menu');
	}

	function delete_menu($menu_id, $status) {
		$sts = ( $status == 1 ) ? 0 : 1;
		$this->mod_globals->update('tbl_menus', array('men_status' => $sts) , array('men_id' => $menu_id) );
		redirect('con_menus/list_menu');
	}
}
