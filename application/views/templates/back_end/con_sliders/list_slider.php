
<div class="row">
	<div class="col-xs-12">
		<?php
			echo anchor('con_sliders/add_slider', '<span class="btn btn-primary btn-sm">Add New</span>');
		?>

		<div style="clear: both;margin-bottom: 5px;"></div>
		<table  class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">No</th>
					<th width="600">Image</th>
					<th>Active</th>
					<th>Action</th>
				</tr>
			</thead>
      <tbody>
        <?php
          $i = 1;
          foreach ($get_sliders->result() as $row) {
        ?>
        <tr>
          <td class="center"><?php echo $i; ?></td>
          <td><img src="<?php echo base_url().'templates/front_end/img/slide/'.$row->sli_img; ?>" class="img-responsive" alt="img"/></td>
          <td><?php echo ( $row->sli_status ) ? '<span class="label label-primary" >Active</span>' : '<span class="label label-warning	">Disactive</span>' ; ?></td>
          <td>
						<div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="<?php echo site_url('con_sliders/edit_slider').'/'.$row->sli_id ?>">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>

                        <a onclick="return confirm('Are you sure?')" class="red" href="<?php echo site_url('con_sliders/delete_sliders').'/'.$row->sli_id; ?>">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div>


					</td>
        </tr>
        <?php
          $i++;
          } ?>
      </tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->
