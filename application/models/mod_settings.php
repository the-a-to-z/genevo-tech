<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_settings extends CI_Model {
	function insert_setting($arr_srt){
		$result = $this->db->query("SELECT * FROM tbl_settings");
		if ( $result->num_rows() > 0 ) {
			$this->db->update('tbl_settings', $arr_srt);
		}else{
			$this->db->insert('tbl_settings', $arr_srt);
		}
		
	}
	function select_setting() {
		$this->db->select('*')
				->from('tbl_settings')
				->limit(1);
		return $this->db->get();
	}
}
