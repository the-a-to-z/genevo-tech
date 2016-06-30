<div class="container">
    <div class="page-header">
        <h1 style="font-size: 20px;">
            Create User
        </h1>
    </div>
    <?php 
        foreach ($get_user->result() as $value) {
        echo form_open('con_users/do_edit_user/'. $value->use_id , 'class="form-horizontal"'); 
    ?>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First name<sup style="color: red; font-weight: bold;">*</sup> </label>

        <div class="col-sm-9">
            <input value="<?php echo $value->use_first_name; ?>" type="text" id="form-field-1" name="use_first_name" placeholder="First name" class="col-xs-10 col-sm-5" required/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last name<sup style="color: red; font-weight: bold;">*</sup> </label>

        <div class="col-sm-9">
            <input value="<?php echo $value->use_last_name; ?>" type="text" id="form-field-1" name="use_last_name" placeholder="Last name" class="col-xs-10 col-sm-5" required/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Gender </label>

        <div class="col-sm-9">
            <select class="col-xs-10 col-sm-5" name="use_gender">
            	<option value="1">Male</option>
            	<option value="2">Female</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username<sup style="color: red; font-weight: bold;">*</sup> </label>

        <div class="col-sm-9">
            <input value="<?php echo $value->use_username; ?>" type="text" id="form-field-1" name="use_username" placeholder="Username" class="col-xs-10 col-sm-5" required/>
        </div>
    </div>
	<div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email<sup style="color: red; font-weight: bold;">*</sup> </label>
        <div class="col-sm-9">
            <input value="<?php echo $value->use_email; ?>" type="text" id="form-field-1" name="use_email" placeholder="Ex : admin@admin.com" class="col-xs-10 col-sm-5" required/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone </label>
        <div class="col-sm-9">
            <input value="<?php echo $value->use_phone; ?>" type="text" id="form-field-1" name="use_phone" placeholder="Ex : 098 12345678" class="col-xs-10 col-sm-5"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>
        <div class="col-sm-9">
        	<input value="<?php echo $value->use_address; ?>" type="text" name="use_address" class="col-xs-10 col-sm-5">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Role </label>
        <div class="col-sm-9">
            <select name="role"  class="col-xs-10 col-sm-5">
                <?php
                    $select = '';
                    foreach ($get_role->result() as $row) {
                        if($row->rol_id == $value->use_rol_id){
                            $select = 'selected';
                        }else{
                            $select = '';
                        }
                        echo '<option '. $select .' value="'. $row->rol_id .'">'. $row->rol_name .'</option>';
                    } 
                ?>
            </select>
        </div>
    </div>
     <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> &nbsp; </label>
        <div class="col-sm-9">
        	<button class="btn btn-primary btn-sm ">Save</button>
        </div>
    </div>
    <?php 
        echo form_close(); 
        }
    ?>
</form>
</div>