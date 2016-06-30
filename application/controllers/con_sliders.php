<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "secure.php";
class Con_sliders extends Secure {
	function __construct()
	 {
	  parent::__construct();
	  	$this->load->model('mod_globals');
		$this->load->library("form_validation");
	  	//$this->load->model('mod_categorie');
	 }
	public function index()
	{
			 redirect('con_sliders/list_slider');
	}
	function list_slider() {
		$data['title'] = 'Manage SlideShow';
		$data['get_sliders'] = $this->mod_globals->select_where('tbl_sliders', array('sli_status' => 1 ));
		$this->load->view(B_MASTER, $data);
	}

	function add_slider() {
		$data['title'] = 'Add Slie Show';
		$data["get_menu_kh"] = $this->mod_globals->select_where('tbl_menus', array('men_status' => 1,'men_parent'=>0,'men_lang'=>'kh'));
		$data["get_menu_en"] = $this->mod_globals->select_where('tbl_menus', array('men_status' => 1,'men_parent'=>0,'men_lang'=>'en'));
			if(!empty($_FILES['img_slider']['name'])){
				$config = array(
					'upload_path' => "./templates/front_end/img/slide/",
					'allowed_types' => "gif|jpg|png|jpeg|pdf",
					'remove_spaces'=>TRUE
				);
				$this->load->library('upload', $config);
				if($this->upload->do_upload("img_slider"))
				{
					$arr_menu = $this->input->post("menu_name");
					$dataImg =  $this->upload->data();
					$new_img_product = $dataImg['file_name'];
					$arr  = array(
						'sli_image'  => $new_img_product,
						'sli_status'=>1
						
					);
					
					$this->mod_globals->insert('tbl_sliders', $arr);
					$insert_id = $this->db->insert_id();
					foreach($arr_menu as $value_menu){
						$arr_b = array(
							"sli_id"=>$insert_id,
							"men_id"=>$value_menu
						);
						$this->mod_globals->insert('tbl_sliders_menu', $arr_b);
					}
					redirect('con_sliders/list_slider');
				}
				else
				{
					redirect('con_sliders/add_slider');
				}
			}else {
					$this->load->view(B_MASTER, $data);
			}
	}


	function edit_slider($sli_id){
		$data['title'] = 'Edit SlideShow';
		$data["get_menu_kh"] = $this->mod_globals->select_where('tbl_menus', array('men_status' => 1,'men_parent'=>0,'men_lang'=>'kh'));
		$data["get_menu_en"] = $this->mod_globals->select_where('tbl_menus', array('men_status' => 1,'men_parent'=>0,'men_lang'=>'en'));
		$data['get_slider'] = $this->mod_globals->select_where('tbl_sliders', array('sli_id' => $sli_id) )->row();
		$data['get_menu_checked'] = $this->mod_globals->select_where('tbl_sliders_menu', array('sli_id' => $sli_id) );
		$this->load->view(B_MASTER, $data);
	}
	function do_edit_slider($sli_id) {
		$menu_id = $this->input->post('menu_name');
		$old_img_product = $this->input->post('old_slider');
		
		if(!empty($_FILES['img_slider']['name'])){
			$config = array(
				'upload_path' => "./templates/front_end/img/slide/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'remove_spaces'=>TRUE
			);
			$this->load->library('upload', $config);
			if($this->upload->do_upload("img_slider"))
			{
				$dataImg =  $this->upload->data();
				$new_img_product = $dataImg['file_name'];
				$path = "./templates/front_end/img/slide/".$old_img_product;
				@unlink($path);
			}
			else
			{
			 $new_img_product = $old_img_product;
			}
		}else {
		 	$new_img_product = $old_img_product;
		}
		$arr_img  = array(
			'sli_image' => $new_img_product
		);
		$this->mod_globals->update('tbl_sliders', $arr_img, array('sli_id' => $sli_id));
		foreach($menu_id as $valueMenu){
			$arr_b = array(
				"sli_id"=>$sli_id,
				"men_id"=>$valueMenu
			);
			if(!$this->mod_globals->check_data_exist("tbl_sliders_menu",$arr_b)){
				$this->mod_globals->insert('tbl_sliders_menu', $arr_b);
			}
		}
		$this->mod_globals->delete_where_not_in("tbl_sliders_menu",array("men_id"=>$menu_id),array("sli_id"=>$sli_id));
		
		
		
		
		redirect('con_sliders/list_slider');
	}
	function delete_sliders($slid_id) {
		$this->mod_globals->delete('tbl_sliders', array('sli_id' => $slid_id));
		$this->mod_globals->delete('tbl_sliders_menu', array('sli_id' => $slid_id));
		redirect('con_sliders/list_slider');
	}
}
