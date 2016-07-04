<div class="container">
	<div class="page-header">
        <h1 style="font-size: 20px;">
            Edit SlideShow
        </h1>
    </div>
	<div class="col-md-12">
	<?php
		echo form_open_multipart('con_sliders/do_edit_slider/'.$get_slider->sli_id,'class="form-horizontal"');
	?>        
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Image</label>
			<div class="col-sm-3">
			  <input type="file" value="" name="img_slider" class="form-control" />
			  <input type="hidden" value="<?php echo $get_slider->sli_image; ?>" name="old_slider" />
			</div>
			  <div class="col-sm-3">
              <img src="<?php echo base_url().'templates/front_end/img/slide/'.$get_slider->sli_image; ?>" class="img-reponsive" style="width:47px"/>
			</div>
		 </div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Menu</label>
			<div class="col-sm-2">
			  <?php
				
				foreach($get_menu_en->result() as $valueMenu){
					$checked = checExitkSlideShow($valueMenu->men_id,$get_slider->sli_id)?"checked":"";
					echo '<div class="checkbox"><label><input name="menu_name[]" '.$checked.' value="'.$valueMenu->men_id.'" type="checkbox" />&nbsp;'.$valueMenu->men_name.'</label></div>';
				}
			  ?>
			</div>
			<div class="col-sm-2">
			  <?php
				foreach($get_menu_kh->result() as $valueMenuKh){
					$checked = checExitkSlideShow($valueMenuKh->men_id,$get_slider->sli_id)?"checked":"";
					echo '<div class="checkbox"><label><input name="menu_name[]" '.$checked.' value="'.$valueMenuKh->men_id.'" type="checkbox" />&nbsp;'.$valueMenuKh->men_name.'</label></div>';
				}
			  ?>
			</div>
		</div> 
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<button type="submit" class="btn btn-primary btn-sm">Save</button>
			</div>
		</div>
		<br/>        
	<?php
		echo form_close();
	?>   
	</div>
</div>
