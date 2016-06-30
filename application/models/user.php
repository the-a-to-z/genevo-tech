<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	function login($username, $password) {
		
		$query = $this -> db -> get_where('tbl_users', array('use_username' => $username, 'use_password' => md5($password), 'use_status' => 1), 1);
		if ($query -> num_rows() == 1) {
			$row = $query -> row();

			$this->db->select("mod_name");
			$this->db->from("tbl_permissions");
			$this->db->join("tbl_modules","tbl_modules.mod_id=tbl_permissions.per_mod_id");
			$this->db->where("per_rol_id", $row->use_rol_id);
			$query_role=$this->db->get();
			foreach($query_role->result() as $row_r){
				$this -> session -> set_userdata($row_r->mod_name,1);
			}


			$this -> session -> set_userdata('user_access', $row -> use_id);
			$this -> session -> set_userdata('user_username', $row -> use_username);
			return true;
		}

		return false;
	}

	/*
	 Logs out a user by destorying all session data and redirect to login
	 */
	function logout() {
		$this -> session -> sess_destroy();
		redirect('login');
	}

	/*
	 Determins if a user is logged in
	 */
	function is_logged_in() {
		return $this -> session -> userdata('user_access') != false;
	}
}
