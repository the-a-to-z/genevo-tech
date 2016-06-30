<div class="row">
	<div class="col-xs-12">
		<?php
			echo anchor('con_position/add_position', '<span class="btn btn-primary btn-sm">Add New</span>');
		?>
		
		<div style="clear: both;margin-bottom: 5px;"></div>
		<table id="sample-table-6" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">No</th>
					<th>Position name</th>
					<th>Description</th>
					<th>Date Created</th>
					<th>Date Modified</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					$i = 1;
					foreach ($get_position->result() as $row) {
				?>
				<tr>
					<td class="center"><?php echo $i; ?></td>
					<td><?php echo $row->pos_name; ?></td>
					<td><?php echo $row->pos_description; ?></td>
					<td><?php echo substr($row->pos_date_created, 0, -9); ?></td>
					<td><?php echo substr($row->pos_date_modified, 0, -9); ?></td>
					<td>
						<div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="<?php echo site_url('con_position/edit_position').'/'.$row->pos_id ?>">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>

                        <a onclick="return confirm('Are you sure?')" class="red" href="<?php echo site_url('con_position/delete_position').'/'.$row->pos_id ?>">
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
                                    <a class="green" href="<?php echo site_url('con_position/edit_position').'/'.$row->pos_id ?>">
			                            <i class="ace-icon fa fa-pencil bigger-130"></i>
			                        </a>
                                </li>

                                <li>
                                    <a onclick="return confirm('Are you sure?')" class="red" href="<?php echo site_url('con_position/delete_position').'/'.$row->pos_id ?>">
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

