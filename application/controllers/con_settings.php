<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'secure.php';
class Con_settings extends Secure {
	public function index(){
		redirect('con_settings/general_setting');
	}
	
	public function general_setting() {
		$this->load->model('mod_settings');
		$data['title']="General Setting";
		$data['data_select'] = $this->mod_settings->select_setting();
		$this->load->view(B_MASTER, $data);
		
	}
	function insert_setting() {
		$this->load->model('mod_settings');
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
				$arr_srt = array(
					'set_company' => $this->input->post('company'),
					'set_email_show' => $this->input->post('email_show'),
					'set_email_recieved' => $this->input->post('email_send_from_user'),
					'set_phone' => $this->input->post('phones'),
					'set_mobile' => $this->input->post('mobile'),
					'set_address' => $this->input->post('address'),
					'set_website' => $this->input->post('website'),
					'set_logo' => $imgs,
				);
				
			}else{
			  $this->session->set_flashdata("msg", "<div class='alert alert-danger'> Problem with uploading , check size and type</div>");
			}
		}else{
			$arr_srt = array(
				'set_company' => $this->input->post('company'),
				'set_email_show' => $this->input->post('email_show'),
				'set_email_recieved' => $this->input->post('email_send_from_user'),
				'set_phone' => $this->input->post('phones'),
				'set_mobile' => $this->input->post('mobile'),
				'set_address' => $this->input->post('address'),
				'set_website' => $this->input->post('website'),
				'set_logo' => $imgs,
			);
		}
		// $arr_srt = array(
			// 'set_company' => $this->input->post('company'),
			// 'set_email_show' => $this->input->post('email_show'),
			// 'set_email_recieved' => $this->input->post('email_send_from_user'),
			// 'set_phone' => $this->input->post('phones'),
			// 'set_mobile' => $this->input->post('mobile'),
			// 'set_address' => $this->input->post('address'),
			// 'set_website' => $this->input->post('website'),
			// 'set_logo' => $this->input->post('userfile'),
		// );
		$this->mod_settings->insert_setting($arr_srt);
		redirect('con_settings/general_setting');
	}


}
