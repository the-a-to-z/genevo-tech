<div class="container">
        <div class="row center">
            <div class="col-md-8">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">English</a></li>
                    <li><a href="#profile" data-toggle="tab">Khmer</a></li>
                </ul>
                <?php
                	echo form_open('con_menus/do_add_menu');
                ?>
                <div class="tab-content">
                	
                    <div class="tab-pane active container" id="home">
                    	<div style="padding:8px;" class="form-horizontal">
						   	<div class="form-group">
							    <label for="inputEmail3" class="col-sm-3 control-label">Menu/submenu Name En<sup style="color:red; font-weight:bold;">*</sup></label>
							    <div class="col-sm-3">
							    	<input type="text" required class="form-control" id="menu_submenu_en" name="menu_submenu_en" placeholder="" />
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
								            echo '<option value="'.$row_menu->men_id.'">'.$row_menu->men_name.'</option>';
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
								      		<option value="1">UP</option>
								      		<option value="2">Bottom</option>
								      	</select>
								    </div>
							    </div>
						   	</div>
						   	<div class="form-group">
							    <label for="inputPassword3" class="col-sm-3 control-label">Description En</label>
							    <div class="col-sm-3">
								    <div class="checkbox">
								      	<input type="text" name="txt_description_en" class="form-control" />
								    </div>
							    </div>
						   	</div>
						</div>
                    </div>

	                    <div class="tab-pane container" id="profile">
	                    	<div style="padding:8px;" class="form-horizontal">
							   	<div class="form-group">
								    <label for="inputEmail3" class="col-sm-3 control-label">Menu/submenu Name Kh<sup style="color:red; font-weight:bold;">*</sup></label>
								    <div class="col-sm-3">
								    	<input type="text" required class="form-control" id="menu_submenu_kh" name="menu_submenu_kh" placeholder="ជាភាសាខ្មែរ" />
								    </div>
							   	</div>
							   
							   <div class="form-group">
								    <label for="inputPassword3" class="col-sm-3 control-label">Submenu Kh</label>
								    <div class="col-sm-3">
									    <div class="checkbox">
									     	<label><input type="checkbox" name="check_submenu_kh" id="check_submenu_kh" /> <small style="color:red;">(check if submenu or sub category)</small></label>
									    </div>
								    </div>
							   </div>
							   <div class="form-group" id="group_parent">
								    <label for="inputPassword3" class="col-sm-3 control-label">Parent Kh<sup style="color:red; font-weight:bold;">*</sup></label>
								    <div class="col-sm-3">
									     <select name="parent_kh" id="parent_kh" class="form-control" required>
									        <option value="">Parent menu</option>
									        <?php
									          foreach ($get_menu_kh->result() as $row_menu) {
									            echo '<option value="'.$row_menu->men_id.'">'.$row_menu->men_name.'</option>';
									          }
									        ?>
									     </select>
								    </div>
							   	</div>
							   	<div class="form-group">
								    <label for="inputPassword3" class="col-sm-3 control-label">Level Kh<sup style="color:red; font-weight:bold;">*</sup></label>
								    <div class="col-sm-3">
									    <div class="checkbox">
									      	<select name="txt_level_kh" class="form-control" required>
									      		<option value="">Select</option>
									      		<option value="1">UP</option>
									      		<option value="2">Bottom</option>
									      	</select>
									    </div>
								    </div>
							   	</div>
							   	<div class="form-group">
								    <label for="inputPassword3" class="col-sm-3 control-label">Description Kh</label>
								    <div class="col-sm-3">
									    <div class="checkbox">
									      	<input type="text" name="txt_description_kh" class="form-control" />
									    </div>
								    </div>
							   	</div>
							</div>
	                    </div>
	                    <div>
	                    	<button type="submit" class="btn btn-primary btn-sm">Save</button>
	                    </div>
                </div>
                <?php
                	echo form_close();
                ?>
            </div>
        </div>
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
>