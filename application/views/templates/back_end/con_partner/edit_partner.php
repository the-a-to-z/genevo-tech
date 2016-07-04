<div class="container">
	<?php 
		foreach($get_partner->result() as $row) {
			echo form_open_multipart('con_partner/do_edit_partner/'.$row->part_id);
	?>	
	<div style="padding:8px;" class="form-horizontal">
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Partner name</label>
			<div class="col-sm-3">
				<input type="text" value="<?php echo $row->part_name; ?>" name="txt_part_name" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Partner Logo</label>
			<div class="col-sm-3">
				<input class="form-control" type="file" name="image" title="Add logo">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Description</label>
			<div class="col-sm-3">
				<textarea name="txt_part_des"><?php echo $row->part_description; ?></textarea>
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