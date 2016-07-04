<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'secure.php';
class Con_modules extends Secure {

	public function index()
	{
		redirect('con_modules/list_module');
	}
	
	public function create_role()
	{
		$data['title']="Create Role";
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('role_name', 'Role Name', 'required');
			
		if ($this -> form_validation -> run() === FALSE) {
			$data['permissions']=$this->mod_globals->select_all('tbl_modules');
			$this->load->view(B_MASTER, $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data=array(
				'mod_name'=>$this->input->post('role_name',TRUE),
				'mod_description'=>$this->input->post('role_desc',TRUE),
				'mod_status'=>$this->input->post('status',TRUE),
				'mod_date_created'=> date('Y-m-d')
			);
			$permissions=$this->input->post('permissions',TRUE);
			$is_inserted_last_id=$this->mod_globals->insert_get_last_id('pos_roles',$data);
			if($is_inserted_last_id){
					//$activation_key=random_string('alnum', 12);
					//$email=$this->input->post('email');
				foreach($permissions as $permission){
					$data=array(
					'per_use_role_id'=>$is_inserted_last_id,
					'per_use_module_id'=>$permission,
					'per_status'=>1,
					'per_created_date'=>null
					);
					$this->mod_globals->insert('pos_permissions',$data);
				}
				$this -> session -> set_flashdata('success', 'User access level  was created success !.');
				redirect('index.php/con_roles/create_role');
					
			}else{
				$this -> session -> set_flashdata('error', 'User access level  was created fail !.');
				redirect('index.php/con_roles/create_role');
			}
		}
	}
	public function home()
	{
		$data['title']="List Roles";
		$data['roles']=$this->mod_globals->select_all('pos_roles');
		$this->load->view(F_MASTER, $data);
	}
	public function update_role($role_id=0)
	{
		$data['title']="Update Role";
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('role_name', 'Role Name', 'required');
			
		if ($this -> form_validation -> run() === FALSE) {
			$data['permissions']=$this->mod_globals->select_all('pos_modules');
			$data['role_data']=$this->mod_globals->select_where('pos_roles',array('role_id'=>$role_id));
			$data['role_permissions']=$this->mod_globals->select_where('pos_permissions',array('per_use_role_id'=>$role_id));
			$this->load->view(F_MASTER, $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data=array(
				'rol_name'=>$this->input->post('role_name',TRUE),
				'rol_description'=>$this->input->post('role_desc',TRUE),
				'rol_status'=>$this->input->post('status',TRUE),
				'rol_created_date'=>null
			);
			$permissions=$this->input->post('permissions',TRUE);
			$is_updated=$this->mod_globals->update('pos_roles',$data,array('role_id'=>$role_id));
			if($is_updated){
					//$activation_key=random_string('alnum', 12);
					//$email=$this->input->post('email');
				$is_deleted=$this->mod_globals->delete('pos_permissions',array('per_use_role_id'=>$role_id));
				if($is_deleted){
					foreach($permissions as $permission){
						$data=array(
						'per_use_role_id'=>$role_id,
						'per_use_module_id'=>$permission,
						'per_status'=>1,
						'per_created_date'=>null
						);
						$this->mod_globals->insert('pos_permissions',$data);
					}
					$this -> session -> set_flashdata('success', 'User access level  was updated success !.');
					redirect('index.php/con_roles/update_role/'.$role_id);
				}else{
					$this -> session -> set_flashdata('error', 'There is something went wrong !');
					redirect('index.php/con_roles/update_role/'.$role_id);
				}
					
			}else{
				$this -> session -> set_flashdata('error', 'User access level  was updated fail !.');
				redirect('index.php/con_roles/update_role/'.$role_id);
			}
		}
	}
	public function delete_role($role_id=0)
	{
		$is_deleted=$this->mod_globals->delete('pos_roles',array('role_id'=>$role_id));
			if($is_deleted){
					//$activation_key=random_string('alnum', 12);
					//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'User access level  was deleted success !.');
				redirect('index.php/con_roles/home');
					
			}else{
				$this -> session -> set_flashdata('error', 'User access level  was deleted fail !.');
				redirect('index.php/con_roles/home');
			}
	}
	public function export_roles(){
		$query = $this->db->get('pos_roles');
 
        if(!$query)
            return false;
 
        // Starting the PHPExcel library
        $this->load->library('excel');
        //$this->load->library('PHPExcel/IOFactory');
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
       // $fieldsHeader = array('Code Number','Name English','Name Khmer','Email','Phone','Address','Location','Created Date');
		//$fields=array('code_number','name_en','name_kh','email','phone','address','name','created_date');
        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter =  PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Roles_'.date('dMy').'.xlsx"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
	}
}
