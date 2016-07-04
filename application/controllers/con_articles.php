<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "secure.php";
class Con_articles extends Secure {
	function __construct() 
	 {
	  parent::__construct();
	  	$this->load->model('mod_globals');
	  	//$this->load->model('mod_categorie');
	 } 
	public function index()
	{
       	redirect('con_articles/list_article');

	}
	function list_article() {
		$data['title'] = 'Manage article';
		$data['get_article'] = $this->mod_globals->select_where('tbl_articals', array('art_status' => 1 ));
		
		$this->load->view(B_MASTER, $data);
	}

	function add_article() {
		$data['title'] = 'Manage article';
		$data['get_menu_en'] = $this->mod_globals->select_where('tbl_menus', array('men_status' => 1, 'men_lang' => 'en'));
		$data['get_menu_kh'] = $this->mod_globals->select_where('tbl_menus', array('men_status' => 1, 'men_lang' => 'kh'));
		
		$this->load->view(B_MASTER, $data);	
	}
	function do_add_article() {
		$txt_article_title_en = $this->input->post('txt_article_title_en');
		$info_title_en = $this->input->post('info_title_en');
		$txt_des_en    = $this->input->post('txt_des_en');

		$txt_article_title_kh = $this->input->post('txt_article_title_kh');
		$info_title_kh = $this->input->post('info_title_kh');
		$txt_des_kh    = $this->input->post('txt_des_kh');

		$arr_en  = array(
			'men_id' => $info_title_en,
			'art_title'  => $txt_article_title_en,
			'art_description'  => $txt_des_en,
			'art_lang'    => 'en',
			'art_date_created' => date('Y-m-d')
		);
		$arr_kh  = array(
			'men_id' => $info_title_kh,
			'art_title'  => $txt_article_title_kh,
			'art_description'  => $txt_des_kh,
			'art_lang'    => 'kh',
			'art_date_created' => date('Y-m-d')
		);

		$this->mod_globals->insert('tbl_articals', $arr_en);
		$this->mod_globals->insert('tbl_articals', $arr_kh);
		exit;
		redirect('con_articles/list_article');
	}

	function edit_article($art_id){
		$data['title'] = 'Manage article';
		$data['get_menu'] = $this->mod_globals->select_where('tbl_menus', array('men_status' => 1));
		$data['get_article'] = $this->mod_globals->select_where('tbl_articals', array('art_id' => $art_id) );
		
		$this->load->view(B_MASTER, $data);	
	}
	function do_edit_article($art_id, $lang) {
		$txt_article_title_en = $this->input->post('txt_article_title_en');
		$info_title_en = $this->input->post('info_title_en');
		$txt_des_en    = $this->input->post('txt_des_en');
		$arr_en  = array(
			'men_id' => $info_title_en,
			'art_title'  => $txt_article_title_en,
			'art_description'  => $txt_des_en,
			'art_lang'    => $lang,
			'art_date_created' => date('Y-m-d')
		);
		$this->mod_globals->update('tbl_articals', $arr_en, array('art_id' => $art_id));
		redirect('con_articles/list_article');
	}
	function delete_article($art_id) {
		$this->mod_globals->delete('tbl_articals', array('art_id' => $art_id));
		redirect('con_articles/list_article');
	}
}
