<div class="row">
	<div class="col-xs-12">
		<?php
			echo anchor('con_users/add_user', '<span class="btn btn-primary btn-sm">Add user</span>');
		?>
		
		<div style="clear: both;margin-bottom: 5px;"></div>
		<table id="sample-table-9" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">No</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>Username</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					$i = 1;
					foreach ($get_user->result() as $row) {
				?>
				<tr>
					<td class="center"><?php echo $i; ?></td>
					<td><?php echo $row->use_first_name; ?></td>
					<td><?php echo $row->use_last_name; ?></td>
					<td><?php echo ( $row->use_gender == 1 ) ? 'Male' : 'Female'; ?></td>
					<td><?php echo $row->use_username; ?></td>
					<td><?php echo $row->use_email; ?></td>
					<td><?php echo $row->use_phone; ?></td>
					<td><?php echo $row->use_address; ?></td>
					<td>
						<div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="<?php echo site_url('con_users/edit_user').'/'.$row->use_id ?>">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>

                        <a onclick="return confirm('Are you sure?')" class="red" href="<?php echo site_url('con_users/delete_user').'/'.$row->use_id ?>">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                

                                <li>
                                    <a class="green" href="<?php echo site_url('con_users/edit_user').'/'.$row->use_id ?>">
			                            <i class="ace-icon fa fa-pencil bigger-130"></i>
			                        </a>
                                </li>

                                <li>
                                    <a onclick="return confirm('Are you sure?')" class="red" href="<?php echo site_url('con_users/delete_user').'/'.$row->use_id ?>">
			                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
			                        </a>
                                </li>
                            </ul>
                        </div>
                    </div>
					</td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->

