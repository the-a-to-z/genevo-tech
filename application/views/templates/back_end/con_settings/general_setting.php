<div class="row">
	<div class="col-xs-12">
	
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>con_settings/insert_setting" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="company"> Company Name <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" value="<?php echo $data_select->row()->set_company; ?>" id="company" name="company" placeholder="Company Name" class="col-xs-10 col-sm-5" required="required" />
					<?php echo form_error('company'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="email_show"> Email Show</label>

				<div class="col-sm-9">
					<input type="text" id="email_show" name="email_show" placeholder="Email show" class="col-xs-10 col-sm-5" value="<?php echo $data_select->row()->set_email_show; ?>"/>
					<?php echo form_error('email_show'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="email_send_from_user"> Email Send From User</label>

				<div class="col-sm-9">
					<input type="text" id="email_send_from_user" name="email_send_from_user" placeholder="Email setting for user sending " class="col-xs-10 col-sm-5" value="<?php echo $data_select->row()->set_email_recieved; ?>"/>
					<?php echo form_error('email_send_from_user'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="mobile"> Phone <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="phones" name="phones" placeholder="Phone" class="col-xs-10 col-sm-5" required="required" value="<?php echo $data_select->row()->set_phone; ?>"/>
					
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="mobile"> Mobile <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="mobile" name="mobile" placeholder="mobile" class="col-xs-10 col-sm-5" required="required" value="<?php echo $data_select->row()->set_mobile; ?>"/>
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="address"> Address</label>

				<div class="col-sm-9">
					<textarea name="address" rows="6" class="col-xs-10 col-sm-5"><?php echo $data_select->row()->set_address; ?></textarea>
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="website"> Website</label>

				<div class="col-sm-9">
					<input type="text" id="website" name="website" class="col-xs-10 col-sm-5" value="<?php echo $data_select->row()->set_website; ?>"/>
					<?php echo form_error('website'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="website"> Company Logo</label>

				<div class="col-sm-9">
					<input class="" type="file" name="image" title="Add logo">
					<?php echo form_error('logo'); ?>
				</div>
			</div>
			
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>

		</form>

	</div>
</div>