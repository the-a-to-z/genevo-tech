<?php

class Mod_pages extends  CI_Model{

	function get_submenu_by_id($id){
		$query = $this->db->query('SELECT * FROM tbl_menus WHERE men_parent='.$id.' AND men_status=1 ORDER BY men_order ASC ');
	    if( $query->num_rows() > 0 ){
	        return $query->result();
	    }else{
	    	return false;
	    }
	}
	function getDataPostion($positionId,$type,$menu_id){
      $lang = $this->session->userdata("site_lang");
			$query = $this->db->query('SELECT * FROM tbl_articals WHERE  art_pos_id='.$positionId.' AND art_lang="'.$lang.'" AND art_status=1');
			if(!is_null($menu_id)){
				$this->db->where("men_id",$menu_id);
			}
			$this->db->where("types",$type);
			if($query->num_rows() > 0 ){
					return $query->result();
			}else{
				return false;
			}
	}
	function getDataPartnerShip(){
		$query = $this->db->query('SELECT * FROM  tbl_partner_ships WHERE  part_status=1');
		if($query->num_rows() > 0 ){
				return $query->result();
		}else{
			return false;
		}
	}

	public function getContentPage($url){
		$lang = $this->session->userdata("site_lang");
		$menu_id = $this->getMenuId($url);
		$query = $this->db->query('SELECT * FROM tbl_articals WHERE  men_id='.$menu_id.' AND art_lang="'.$lang.'"  AND art_status=1');
		if($query->num_rows() > 0 ){
				return $query->result();
		}else{
			return false;
		}
	}
	public function getDataSiting($type,$limit)
	{
		$query = $this->db->query('SELECT * FROM tbl_settings where set_key="'.$type.'"');
		if($limit !=NULL){
			$this->db->where("limit",$limit);
		}
		if($query->num_rows() > 0 ){
				return $query->result();
		}else{
			return false;
		}
	}

	public function getProduct(){
    	$lang = $this->session->userdata("site_lang");
		$query = $this->db->query('SELECT * FROM  tbl_products WHERE pro_status=1 AND pro_lang="'.$lang.'"');
		if($query->num_rows() > 0 ){
				return $query->result();
		}else{
			return false;
		}
	}
	function getSlider($menu){
		$menu_id = $this->getMenuId($menu);
		$query = $this->db->query('SELECT * FROM tbl_sliders_menu JOIN tbl_sliders ON tbl_sliders_menu.sli_id = tbl_sliders.sli_id  WHERE  tbl_sliders_menu.men_id='.$menu_id.'  AND tbl_sliders.sli_status=1');
		if($query->num_rows() > 0 ){
				return $query->result();
		}else{
			return false;
		}
	}
	function getMenuId($menu_name){
		$query = $this->db->query('SELECT * FROM tbl_menus WHERE men_url="'.$menu_name.'"AND men_status=1 limit 1');
		if($query->num_rows() > 0 ){
	        return $query->row()->men_id;
	    }else{
	    	return false;
	    }

	}
	function get_mainMenu($id){

		$query = $this->db->query('SELECT * FROM tbl_menus WHERE men_id='.$id.' AND men_id=(SELECT men_parent FROM tbl_menus WHERE men_parent='.$id.'  AND men_status=1 LIMIT 1) AND men_status=1 ORDER BY men_order ASC');
	    if($query->num_rows() > 0 ){
	    }else{
	    	return false;
	    }
	}

	 function getMenu($level)
	{
        $lang = $this->session->userdata("site_lang");
		$query = $this->db->query('SELECT * FROM tbl_menus WHERE men_parent IS NOT NULL AND men_level="'.$level.'" AND men_lang="'.$lang.'" AND men_status=1 ORDER BY men_order ASC');
			if($query->num_rows() > 0 ){
					return $query->result();
			}else{
				return false;
			}
	}

	function get_submenu(){
		$query = $this->db->query('SELECT * FROM tbl_menus WHERE men_parent IS NOT NULL AND men_status=1 ORDER BY men_order ASC');
	    if($query->num_rows() > 0 ){
	        return $query->result();
	    }else{
	    	return false;
	    }
	}

    function get_porfolio(){
        $query = $this->db->query('SELECT * FROM tbl_portfolios WHERE por_status=1 ORDER BY RAND() LIMIT 6');
        if($query->num_rows() > 0 ){
            return $query->result();
        }else{
            return false;
        }
    }

	public function count_product() {
        $this->db->where('pro_status','1');
        return $this->db->count_all("tbl_products");
    }
  
}
