<div class="container">
	<?php 
		foreach($get_position->result() as $row) {
			echo form_open('con_position/do_edit_position/'.$row->pos_id);
	?>	
	<div style="padding:8px;" class="form-horizontal">
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Partner name</label>
			<div class="col-sm-3">
				<input type="text" value="<?php echo $row->pos_name; ?>" name="txt_pos_name" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Description</label>
			<div class="col-sm-3">
				<textarea name="txt_pos_description"><?php echo $row->pos_description; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">&nbsp;</label>
			<div class="col-sm-3">
				<input type="submit" class="btn btn-sm btn-primary" value="Save" />
				<input type="reset" class="btn btn-sm btn-danger" value="Reset" />
			</div>
			
		</div>
	</div>
	<?php
			echo form_close();
		}
	?>
</div>