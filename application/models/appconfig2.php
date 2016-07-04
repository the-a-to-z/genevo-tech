<?php
class Appconfig extends CI_Model 
{
	
	function exists($key)
	{
		$this->db->from('pos_settings');	
		$this->db->where('pos_settings.set_key',$key);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function get_all()
	{
		$this->db->from('pos_settings');
		$this->db->order_by("set_key", "asc");
		return $this->db->get();		
	}
	
	function get($key)
	{
		$query = $this->db->get_where('pos_settings', array('set_key' => $key), 1);
		
		if($query->num_rows()==1)
		{
			return $query->row()->value;
		}
		
		return "";
		
	}
	
	function save($key,$value)
	{
		$config_data=array(
		'set_key'=>$key,
		'set_values'=>$value
		);
				
		if (!$this->exists($key))
		{
			return $this->db->insert('pos_settings',$config_data);
		}
		
		$this->db->where('set_key', $key);
		return $this->db->update('pos_settings',$config_data);		
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
		return $this->db->delete('pos_settings', array('set_key' => $key)); 
	}
	
	function delete_all()
	{
		return $this->db->empty_table('pos_settings'); 
	}
}

?>