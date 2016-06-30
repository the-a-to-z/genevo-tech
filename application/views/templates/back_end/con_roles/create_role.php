<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>con_roles/create_role">
	<div class="row">
		<div class="col-sm-12">
			<?php
			//$this -> load -> view('notification/index.php');
			?>
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller"> Access Setup</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<div class="widget-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="widget-main no-padding">

										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="role_name"> Role Name :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="role_name" name="role_name" placeholder="Role Name" class="col-xs-10 col-sm-9"/>
												<?php echo form_error('role_name'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="role_desc"> Role Description</label>

											<div class="col-sm-8">
												<!-- <textarea name="role_desc" rows="4" class="col-xs-10 col-sm-10"></textarea> -->
												<input type="text"  name="role_desc" class="col-xs-10 col-sm-10">
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="status"> Status </label>

											<div class="col-sm-8">
												<select name="status" class="col-xs-10 col-sm-10">
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									
									<div class="control-group">
												<label class="control-label bolder blue">Access Permission</label>
												<?php
													foreach($permissions->result() as $row){
												?>
													<div class="checkbox">
														<label>
															<input name="permissions[]" type="checkbox" class="ace" value="<?php echo $row->mod_id;?>"/>
															<span class="lbl"> <?php echo $row->mod_name;?></span>
														</label>
													</div>
												<?php
													}
												?>

											</div>
										

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.col -->

	</div><!-- /.row -->
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix form-actions">
				<div class="col-md-offset-4 col-md-8">
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
		</div>
	</div>
</form>
