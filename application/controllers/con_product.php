<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "secure.php";
class Con_product extends Secure {
	function __construct()
	 {
	  parent::__construct();
	  	$this->load->model('mod_globals');
			$this->load->library("form_validation");
	  	//$this->load->model('mod_categorie');
	 }
	public function index()
	{
			 redirect('con_product/list_product');
	}
	function list_product() {
		$data['title'] = 'Manage Product';
		$data['get_product'] = $this->mod_globals->select_where('tbl_products', array('pro_status' => 1 ));
		$this->load->view(B_MASTER, $data);
	}

	function add_product() {
		$data['title'] = 'Add Product';
			if(!empty($_FILES['img_product']['name'])){
				$config = array(
					'upload_path' => "./templates/front_end/img/body/",
					'allowed_types' => "gif|jpg|png|jpeg|pdf",
					'remove_spaces'=>TRUE
				);
				$this->load->library('upload', $config);
				if($this->upload->do_upload("img_product"))
				{
					$dataImg =  $this->upload->data();
					$new_img_product = $dataImg['file_name'];
					$arr_en  = array(
						'pro_name' => $this->input->post('pro_name_en'),
						'pro_image'  => $new_img_product,
						'pro_detail'  => $this->input->post('txt_des_en'),
						'pro_lang'    => 'en',
						'pro_status'=>1,
						'pro_date_created' => date('Y-m-d')
					);
					$arr_kh  = array(
						'pro_name' => $this->input->post('pro_name_kh'),
						'pro_image'  => $new_img_product,
						'pro_detail'  => $this->input->post('txt_des_kh'),
						'pro_lang'    => 'kh',
						'pro_status'=>1,
						'pro_date_created' => date('Y-m-d')
					);

					$this->mod_globals->insert('tbl_products', $arr_en);
					$this->mod_globals->insert('tbl_products', $arr_kh);
					redirect('con_product/list_product');
				}
				else
				{
						redirect('con_product/add_product');
				}
			}else {
					$this->load->view(B_MASTER, $data);
			}
	}


	function edit_product($pro_id){
		$data['title'] = 'Manage Product';
		$data['get_article'] = $this->mod_globals->select_where('tbl_products', array('pro_id' => $pro_id) );
		$this->load->view(B_MASTER, $data);
	}
	function do_edit_product($pro_id, $lang) {
		$name = $this->input->post('pro_name');
		$old_img_product = $this->input->post('old_img_product');
		$txt_des_en    = $this->input->post('txt_des_en');
   if(!empty($_FILES['img_product']['name'])){
			$config = array(
				'upload_path' => "./templates/front_end/img/body/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'remove_spaces'=>TRUE
			);
			$this->load->library('upload', $config);
			if($this->upload->do_upload("img_product"))
			{
				$dataImg =  $this->upload->data();
				$new_img_product = $dataImg['file_name'];
				$path = "./templates/front_end/img/body/".$old_img_product;
				@unlink($path);
			}
			else
			{
			 $new_img_product = $old_img_product;
			}
		}else {
		 	$new_img_product = $old_img_product;
		}
		$arr_en  = array(
			'pro_name' => $name,
			'pro_detail'  => $txt_des_en,
			'pro_image'=> $new_img_product,
			'pro_lang'    => $lang,
			'pro_date_created'=> date('Y-m-d')
		);
		$this->mod_globals->update('tbl_products', $arr_en, array('pro_id' => $pro_id));
		redirect('con_product/list_product');
	}
	function delete_product($pro_id) {
		$this->mod_globals->delete('tbl_products', array('pro_id' => $pro_id));
		redirect('con_product/list_product');
	}
}
