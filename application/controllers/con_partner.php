<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "secure.php";
class Con_partner extends Secure {
	function __construct() 
	 {
	  parent::__construct();
	  	$this->load->model('mod_globals');
	  	//$this->load->model('mod_categorie');
	 } 
	public function index()
	{
       	redirect('con_partner/list_partner');

	}
	function list_partner() {
		$data['title'] = 'Manage partner';
		$data['get_partner'] = $this->mod_globals->select_where('tbl_partner_ships', array('part_status' => 1 ));
		
		$this->load->view(B_MASTER, $data);
	}
	function add_partner() {
		$data['title'] = 'Manage partner';
		
		$this->load->view(B_MASTER, $data);
	}
	function do_add_partner() {
	
		if($_FILES["image"]['name'] != ""){
				$config['upload_path'] = "./uploads/logo/";
				$config['allowed_types'] = 'jpg|png|gif';
				$config['max_size'] = '7168'; //max size is 7MB
				$this->load->library('upload', $config);
			if($this->upload->do_upload("image")) {
			  $file_info = $this->upload->data();
			  $imgs = $file_info['file_name'];
			  
			  $config['source_image'] =  $config['upload_path'].$imgs;
			  $config['maintain_ratio'] = TRUE;
			  $config['width']     = 535;
			  $config['height']   = 647;
			 // $this->image_lib->resize();

			 // upload to database 
			$arr = array(
				'part_name' => $this->input->post('txt_part_name'),
				'part_image' => $imgs,
				'part_description' => $this->input->post('txt_part_des'),
				'part_date_create' => date('Y-m-d'),
				'part_status' => 1
			);
			$this->mod_globals->insert('tbl_partner_ships', $arr);

			}else{
			  $this->session->set_flashdata("msg", "<div class='alert alert-danger'> Problem with uploading , check size and type</div>");
			 
			}
		}
		
		redirect('con_partner/list_partner');
	}
	function edit_partner($partner_id) {
		$data['title'] = 'Manage partner';
		$data['get_partner'] = $this->mod_globals->select_where('tbl_partner_ships', array('part_status' => 1, 'part_id' => $partner_id ));
		$this->load->view(B_MASTER, $data);
	}
	function do_edit_partner($partner_id) {
		if($_FILES["image"]['name'] != ""){
				$config['upload_path'] = "./uploads/logo/";
				$config['allowed_types'] = 'jpg|png|gif';
				$config['max_size'] = '7168'; //max size is 7MB
				$this->load->library('upload', $config);
			if($this->upload->do_upload("image")) {
			  $file_info = $this->upload->data();
			  $imgs = $file_info['file_name'];
			  
			  $config['source_image'] =  $config['upload_path'].$imgs;
			  $config['maintain_ratio'] = TRUE;
			  $config['width']     = 535;
			  $config['height']   = 647;
			 // $this->image_lib->resize();
			$arr = array(
				'part_name' => $this->input->post('txt_part_name'),
				'part_image' => $imgs,
				'part_description' => $this->input->post('txt_part_des'),
				'part_date_modified' => date('Y-m-d'),
				'part_status' => 1
			);
			
			}else{
			  $this->session->set_flashdata("msg", "<div class='alert alert-danger'> Problem with uploading , check size and type</div>");
			}
		}else{
			$arr = array(
				'part_name' => $this->input->post('txt_part_name'),
				'part_description' => $this->input->post('txt_part_des'),
				'part_date_modified' => date('Y-m-d'),
				'part_status' => 1
			);
		}
		$this->mod_globals->update('tbl_partner_ships', $arr, array('part_id' => $partner_id) );
		redirect('con_partner/list_partner');
	}
	function delete_partner($partner_id) {
		$this->mod_globals->delete('tbl_partner_ships', array('part_id' => $partner_id) );
		redirect('con_partner/list_partner');
	}
	
}
