<div class="row">
	<div class="col-xs-12">
		<?php
				//$this->load->view('notification/index.php');
			?>
		 <a href="<?php echo base_url();?>con_roles/create_role"><input type="button" class="btn btn-primary btn-sm" value="Add New"/></a>
		 		
		<div style="clear: both;margin-bottom: 5px;"></div>
		<table id="sample-table-3" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center"><label class="position-relative">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span> </label></th>
					<th>Name</th>
					<th>Description</th>
					
					<th>Status</th>
					<th>Created Date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					foreach($roles->result() as $row){
						
						if($row->rol_status==1){
							$class="success";
							$status="Active";
						}else{
							$class="danger";
							$status="Inactive";
						}
				?>
						<tr>
							<td class="center"><label class="position-relative">
								<input type="checkbox" class="ace" value="<?php echo $row->rol_id;?>"/>
								<span class="lbl"></span> </label></td>
		
							<td><a href="<?php echo base_url();?>con_roles/update_role/<?php echo $row->rol_id;?>" ><?php echo $row->rol_name;?></a></td>
							<td><?php echo $row->rol_description;?></td>
							
							<td><span class="label label-sm label-<?php echo $class;?>"><?php echo $status;?></span></td>
		
							<td><?php echo $row->rol_date_created;?></span></td>
		
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
					
									<a class="green" href="<?php echo base_url();?>con_roles/update_role/<?php echo $row->rol_id;?>" title="Edit Role"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
					
									<a class="red" href="<?php echo base_url();?>con_roles/delete_role/<?php echo $row->rol_id;?>" title="Delete Role" onclick="return confirm('Are you sure want to delete this selected role ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
					
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											
					
											<li>
												<a href="<?php echo base_url();?>con_roles/update_role/<?php echo $row->rol_id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
					
											<li>
												<a href="<?php echo base_url();?>con_roles/delete_role/<?php echo $row->rol_id;?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
				<?php
					}
				?>
				
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->