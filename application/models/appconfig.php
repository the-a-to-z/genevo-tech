<?php
class Appconfig extends CI_Model 
{
	
	function exists($key)
	{
		$this->db->from('tbl_settings');	
		$this->db->where('tbl_settings.set_name',$key);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function get_all()
	{
		$this->db->from('tbl_settings');
		$this->db->order_by("set_name", "asc");
		return $this->db->get();		
	}
	
	function get($key)
	{
		$query = $this->db->get_where('tbl_settings', array('set_name' => $key), 1);
		
		if($query->num_rows()==1)
		{
			return $query->row()->value;
		}
		
		return "";
		
	}
	
	function save($key,$value)
	{
		$config_data=array(
		'set_name'=>$key,
		'set_value'=>$value
		);
				
		if (!$this->exists($key))
		{
			return $this->db->insert('tbl_settings',$config_data);
		}
		
		$this->db->where('set_name', $key);
		return $this->db->update('tbl_settings',$config_data);		
	}
	
	function batch_save($data)
	{
		$success=true;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();
		foreach($data as $key=>$value)
		{
			if(!$this->save($key,$value))
			{
				$success=false;
				break;
			}
		}
		
		$this->db->trans_complete();		
		return $success;
		
	}
		
	function delete($key)
	{
		return $this->db->delete('tbl_settings', array('set_name' => $key)); 
	}
	
	function delete_all()
	{
		return $this->db->empty_table('tbl_settings'); 
	}
}

?>