<div class="container">
	<?php
		foreach ($get_data_menu->result() as $list) {
		
		echo form_open('con_menus/do_edit_menu/'. $list->men_id.'/'.$list->men_lang );
	?>	
	<div style="padding:8px;" class="form-horizontal">
	   	<div class="form-group">
		    <label for="inputEmail3" class="col-sm-3 control-label">Menu/submenu Name En<sup style="color:red; font-weight:bold;">*</sup></label>
		    <div class="col-sm-3">
		    	<input type="text" value="<?php echo $list->men_name; ?>" required class="form-control" id="menu_submenu_en" name="menu_submenu_en" placeholder="" />
		    </div>
	   	</div>
	   
	   <div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">Submenu En</label>
		    <div class="col-sm-3">
			    <div class="checkbox">
			     	<label><input type="checkbox" name="check_submenu_en" id="check_submenu_en" /> <small style="color:red;">(check if submenu or sub category)</small></label>
			    </div>
		    </div>
	   </div>
	   <div class="form-group" id="group_parent">
		    <label for="inputPassword3" class="col-sm-3 control-label">Parent En<sup style="color:red; font-weight:bold;">*</sup></label>
		    <div class="col-sm-3">
			     <select name="parent_en" id="parent_en" class="form-control" required>
			        <option value="">Parent menu</option>
			        <?php
			          foreach ($get_menu_en->result() as $row_menu) {
			            echo '<option '. ($row_menu->men_id == $list->men_id ) ? 'selected' : '' .' value="'.$row_menu->men_id.'">'.$row_menu->men_name.'</option>';
			          }
			        ?>
			     </select>
		    </div>
	   	</div>
	   	<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">Level En<sup style="color:red; font-weight:bold;">*</sup></label>
		    <div class="col-sm-3">
			    <div class="checkbox">
			      	<select name="txt_level_en" class="form-control" required>
			      		<option value="">Select</option>
			      		<option value="1" <?php echo ( $list->men_level == 1) ? 'selected' : ''; ?> >UP</option>
			      		<option value="2" <?php echo ( $list->men_level == 2) ? 'selected' : ''; ?>>Bottom</option>
			      	</select>
			    </div>
		    </div>
	   	</div>
	   	<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">Description En</label>
		    <div class="col-sm-3">
			    <div class="checkbox">
			      	<input type="text" value="<?php echo $list->men_description; ?>" name="txt_description_en" class="form-control" />
			    </div>
		    </div>
	   	</div>
	   	<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">&nbsp;</label>
		    <div class="col-sm-3">
			    <div class="checkbox">
			    	<button class="btn btn-primary btn-sm">Update</button>
				</div>
		    </div>
	   	</div>
	</div>
	<?php
			echo form_close();
		}
	?>
</div>

<script type="text/javascript">
    $(document).ready(function(){

      $('#parent_en').prop( "disabled", true );
        $('#check_submenu_en').click(function(){
            if($(this).is(":checked")){
                $('#parent_en').prop( "disabled", false );
            }
            else if($(this).is(":not(:checked)")){
                $('#parent_en').prop( "disabled", true );
            }
        });
        /*** - For kh - ***/
        
        $('#parent_kh').prop( "disabled", true );
        $('#check_submenu_kh').click(function(){
            if($(this).is(":checked")){
                $('#parent_kh').prop( "disabled", false );
            }
            else if($(this).is(":not(:checked)")){
                $('#parent_kh').prop( "disabled", true );
            }
        });

    });
</script>
