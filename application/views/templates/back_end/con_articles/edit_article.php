<div class="container">
	<?php
		foreach ($get_article->result() as $row) {
		echo form_open('con_articles/do_edit_article/'. $row->art_id.'/'.$row->art_lang);
	?>
	<div style="padding:8px;" class="form-horizontal">
		<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">Title</label>
		    <div class="col-sm-3">
			    <input type="text" value="<?php echo $row->art_title; ?>" name="txt_article_title_en" class="form-control" />
		    </div>
	   	</div>
	   	<div class="form-group">
		    <label for="inputEmail3" class="col-sm-3 control-label">Information Title</label>
		    <div class="col-sm-3">
		    	<select name="info_title_en" class="form-control" required>
		    		<option value="">select</option>
		    		<?php
		    			$select = '';
		    			foreach ($get_menu->result() as $list_en) {
		    				if($list_en->men_id == $row->men_id){
		    					$select = 'selected';
		    				}else{
		    					$select = '';
		    				}
		    				echo '<option '.$select.' value="'. $list_en->men_id .'">'. $list_en->men_name .'</option>';
		    			}
		    		?>
		    	</select>
		    </div>
	   	</div>
	  
	   	<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">Description</label>
		    <div class="col-sm-3">
			    <textarea class="form-control" name="txt_des_en"><?php echo $row->art_description; ?></textarea>
		    </div>
	   	</div>
	   	<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">&nbsp;</label>
		    <div class="col-sm-3">
			    <button type="submit" class="btn btn-primary btn-sm">Update</button>
		    </div>
	   	</div>
	</div>
	<?php
		echo form_close();
		}
	?>

</div>